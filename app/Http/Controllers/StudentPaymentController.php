<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Categories;
use App\Models\Student;
use App\Models\StudentTransaction;
use App\Models\Transaction;

class StudentPaymentController extends Controller
{
    public function index()
    {
        $students = Student::whereHas('student_transactions') // Only get students with transactions
                        ->with('student_transactions') // Eager load the transactions
                        ->get()
                        ->map(function ($student) {
                            $student->total_transaction_amount = $student->student_transactions->sum('amount');
                            $last_payment = $student->student_transactions()
                                                    ->where('category_id', $student->category_id) // Assuming this is available in your scope
                                                    ->where('which_for', 'monthly_fees')
                                                    ->orderBy('date', 'desc')
                                                    ->first();

                            $due_amount = 0;

                            if ($last_payment) {
                                // Get the last payment date
                                $last_payment_date = Carbon::parse($last_payment->date);
                                if ($last_payment_date->isFuture()) {
                                    $due_amount = 0;
                                }else{
                                    // Calculate the number of months since the last payment
                                    $months_since_last_payment = Carbon::now()->diffInMonths($last_payment_date);
                                    $months_since_last_payment = (int) abs($months_since_last_payment);
                                    // echo $months_since_last_payment;die;
                                    // Calculate the total expected amount for these months
                                    $due_amount = $months_since_last_payment * $student->monthly_fees;
                                }
                            }
                    
                            // Add calculated values to the student object
                            $student->due_amount = max($due_amount, 0); // Ensure no negative due amounts
                            
                            return $student;
                        });

        // d($students);
        return view('student_payments.index',compact('students'));
    }

    public function create()
    {
        $categories = Categories::where('is_visible',1)->get();
        return view('student_payments.create',compact('categories'));
    }

    public function get_students_by_category(Request $request){
        $students = Student::where('category_id',$request->category_id)->get();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        if(StudentTransaction::where('students_id',$request->student_id)->where('category_id',$request->category_id)->where('which_for','admission_fees')->exists()){
            // student already paid admission fees
            $student = Student::find($request->student_id);
            // print_r($student);die;
            if($student){
                $total_amount = $request->amount;
                $remaining_amount = $total_amount;
                $monthly_fees = $student->monthly_fees; // Fixed monthly fee

                if($student->monthly_fees > $request->amount){
                    return redirect()->back()->withErrors(['error'=>'Monthly fee amount is '.$student->monthly_fees]);
                }
                // Retrieve the last paid monthly fee date
                $last_payment = StudentTransaction::where('students_id', $request->student_id)
                                                ->where('category_id', $request->category_id)
                                                ->where('which_for', 'monthly_fees')
                                                ->orderBy('date', 'desc')
                                                ->first();
                
                // If there's no last payment, assume the first month is due
                $last_payment_date = $last_payment ? Carbon::parse($last_payment->date) : Carbon::now()->subMonth();
                // Calculate the next payment date
                $next_payment_date = $last_payment_date->copy()->addMonth();
                // echo $next_payment_date;die;

                // Pay due months first
                $current_date = Carbon::now();
                $has_due = $next_payment_date->lessThanOrEqualTo($current_date);
                
                while ($has_due && $next_payment_date->lessThanOrEqualTo($current_date) && $remaining_amount >= $monthly_fees) {
                    // Create a transaction for the due month
                    $student_transaction = new StudentTransaction();
                    $student_transaction->students_id = $request->student_id;
                    $student_transaction->category_id = $request->category_id;
                    $student_transaction->amount = $monthly_fees;
                    $student_transaction->which_for = "monthly_fees";
                    $student_transaction->date = $next_payment_date;
                    $student_transaction->remarks = $request->remarks;
                    $student_transaction->save();

                    // Deduct from the remaining amount
                    $remaining_amount -= $monthly_fees;

                    // Move to the next month's due date
                    $next_payment_date = $next_payment_date->addMonth();

                    $has_due = $next_payment_date->lessThanOrEqualTo($current_date);
                }
                // echo $monthly_fees;die;
                // After paying due months, pay in advance with the remaining amount
                while ($remaining_amount >= $monthly_fees) {
                    $student_transaction = new StudentTransaction();
                    $student_transaction->students_id = $request->student_id;
                    $student_transaction->category_id = $request->category_id;
                    $student_transaction->amount = $monthly_fees;
                    $student_transaction->which_for = "monthly_fees";
                    $student_transaction->date = $next_payment_date;
                    $student_transaction->remarks = $request->remarks;
                    $student_transaction->save();

                    // Deduct from the remaining amount
                    $remaining_amount -= $monthly_fees;

                    // Move to the next month's date
                    $next_payment_date = $next_payment_date->addMonth();
                }

                // // If there's any leftover amount that isn't enough for a full month's fee
                // if ($remaining_amount > 0) {
                //     // Handle the case (you can save it as a partial payment or keep it as balance)
                // }

                Transaction::create([
                    'transaction_table_name' => 'student_transactions',
                    'table_id' => $student_transaction->id,
                    'amount' => $request->amount,
                    'remarks' => 'Monthly Fees Payment',
                ]);

                return redirect()->route('admin.student.payment.transaction-invoice',[format_date_for_db($student_transaction->created_at),$student->id ]);
            }
        }else{
            $student = Student::find($request->student_id);
            if($student){
                // print_r($student);die;
                $total_amount = $request->amount;
                $admission_fees = $student->admission_fees;
                $monthly_fees = $student->monthly_fees;
                // echo $admission_fees;die;

                if($student->admission_fees > $request->amount){
                    return redirect()->back()->withErrors(['error' => 'Admission fee amount is ' . $student->monthly_fees]);
                }

                $three_month_fees = $monthly_fees * 3;

                $admission_money = $admission_fees - $three_month_fees;

                // Save admission fees transaction
                $student_transaction = new StudentTransaction();
                $student_transaction->students_id = $request->student_id;
                $student_transaction->category_id = $request->category_id;
                $student_transaction->amount = $admission_money;
                $student_transaction->which_for = "admission_fees";
                $student_transaction->date = date('Y-m-d');
                $student_transaction->remarks = $request->remarks;
                $student_transaction->save();

                Transaction::create([
                    'transaction_table_name' => 'student_transactions',
                    'table_id' => $student_transaction->id,
                    'amount' => $request->amount,
                    'remarks' => $student_transaction->remarks,
                ]);

                

                // Calculate remaining amount after deducting admission money from the total amount
                $remaining_amount = $total_amount - $admission_money;
                // echo $admission_money;die;
                // Calculate how many months can be covered with the remaining amount
                $months = floor($remaining_amount / $monthly_fees);

                $next_payment_date = date('Y-m-d');  // First monthly payment date

                // Loop to save monthly fee transactions
                for ($i = 1; $i <= $months; $i++) {
                    $student_transaction = new StudentTransaction();
                    $student_transaction->students_id = $request->student_id;
                    $student_transaction->category_id = $request->category_id;
                    $student_transaction->amount = $monthly_fees;
                    $student_transaction->which_for = "monthly_fees";
                    $student_transaction->date = $next_payment_date;
                    $student_transaction->remarks = $request->remarks;
                    $student_transaction->save();

                    $remaining_amount -= $monthly_fees;

                    // Update the payment date for the next month
                    $next_payment_date = date('Y-m-d', strtotime($next_payment_date . ' +1 month'));
                }

                // if ($remaining_amount > 0) {
                //     // Handle the case (you can save it as a partial payment or keep it as balance)
                // }

                return redirect()->route('admin.student.payment.transaction-invoice',[format_date_for_db($student_transaction->created_at),$student->id ]);
            }
        }
    }

    public function show(string $id)
    {
        $student = Student::find($id);
        if($student){
            $registrationDate = StudentTransaction::where('students_id',$student->id)->where('which_for','admission_fees')->value('date');
            $registrationDate = Carbon::parse($registrationDate); // Get registration date
            $currentDate = Carbon::now(); // Get current date
    
            // Get the transactions for the student
            $transactions = StudentTransaction::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(amount) as total_amount, GROUP_CONCAT(which_for) as which_for')
                ->where('students_id', $id)
                ->groupBy('year', 'month') // Group by year and month
                ->orderBy('date', 'asc')
                ->get();
    
            // Determine the last payment date or use the current date if no payments exist
            $lastPaymentDate = $transactions->isNotEmpty() ? Carbon::parse($transactions->last()->year . '-' . $transactions->last()->month . '-01') : $currentDate;
    
            // Set the end date to the greater of the current date or last payment date
            $endDate = $currentDate->greaterThan($lastPaymentDate) ? $currentDate : $lastPaymentDate;
    
            // Prepare the result
            $result = [];
            // echo $registrationDate; die;
            // Loop through from the registration date until the end date
            for ($year = $registrationDate->year; $year <= $endDate->year; $year++) {
                for ($month = 1; $month <= 12; $month++) {
                    // Skip months before the registration date
                    if ($year == $registrationDate->year && $month < $registrationDate->month) {
                        $result[$year][$month] = [
                            'month' => $month,
                            'year' => $year,
                            'paid' => null,  // Null for months before admission
                            'status' => '',  // No status
                            'which_for' => null
                        ];
                        continue;
                    }
    
                    // Stop loop if the current year and month is beyond the end date
                    if ($year == $endDate->year && $month > $endDate->month) {
                        break;
                    }
    
                    // Find transaction for the current year and month
                    $foundTransaction = $transactions->firstWhere(function ($transaction) use ($year, $month) {
                        return $transaction->year == $year && $transaction->month == $month;
                    });
    
                    // If found, display the transaction details; otherwise, mark it as due
                    $result[$year][$month] = [
                        'month' => $month,
                        'year' => $year,
                        'paid' => $foundTransaction ? $foundTransaction->total_amount : 0,
                        'status' => $foundTransaction ? 'Paid' : 'Due', // Mark as due if no transaction found
                        'which_for' => $foundTransaction ? $foundTransaction->which_for : null
                    ];
                }
            }
    
            return view('student_payments.show', compact('result'));
        }
    }

    public function show_transactions(string $id){
        $transaction = Transaction::leftJoin('student_transactions','transactions.table_id','student_transactions.id')
                    ->where('transactions.transaction_table_name','student_transactions')
                    ->where('student_transactions.students_id',$id)
                    ->orderBy('transactions.created_at','desc')
                    ->get(['transactions.amount','transactions.created_at']);

        return view('student_payments.transaction',compact('transaction'));
    }

    public function student_transaction_invoice(string $date,string $id){
        // return $date;
        // return $id;
        $transaction = Transaction::leftJoin('student_transactions','transactions.table_id','student_transactions.id')
                    ->where('transactions.transaction_table_name','student_transactions')
                    ->where('student_transactions.students_id',$id)
                    ->orderBy('transactions.created_at','desc')
                    ->get(['transactions.amount','transactions.created_at']);
        $student = Student::find($id);
        $items = StudentTransaction::where('students_id',$id)->whereDate('created_at',$date)->get();

        $last_payment = $student->student_transactions()
                                ->where('category_id', $student->category_id) // Assuming this is available in your scope
                                ->where('which_for', 'monthly_fees')
                                ->orderBy('date', 'desc')
                                ->first();

        $due_amount = 0;

        if ($last_payment) {
            // Get the last payment date
            $last_payment_date = Carbon::parse($last_payment->date);
            if ($last_payment_date->isFuture()) {
                $due_amount = 0;
            }else{
                // Calculate the number of months since the last payment
                $months_since_last_payment = Carbon::now()->diffInMonths($last_payment_date);
                $months_since_last_payment = (int) abs($months_since_last_payment);
                // echo $months_since_last_payment;die;
                // Calculate the total expected amount for these months
                $due_amount = $months_since_last_payment * $student->monthly_fees;
            }
        }

        // Add calculated values to the student object
        $student->due_amount = max($due_amount, 0);

        return view('student_payments.payment_invoice',compact('student','items','date'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}