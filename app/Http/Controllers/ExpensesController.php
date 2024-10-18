<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExpensesTransaction;
use App\Models\Transaction;

use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    public function index()
    {
        $expenses = ExpensesTransaction::selectRaw('DATE(created_at) as date, SUM(amount) as amount')
                                    ->groupBy('date')
                                    ->orderBy('date', 'desc')
                                    ->get();

        return view('expenses.index',compact('expenses'));
    }

    public function details($date)
    {
        $expenses = ExpensesTransaction::whereDate('created_at',$date)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('expenses.details',compact('expenses','date'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expense_name' => 'required|array|min:1',
            'expense_name.*' => 'required|string|max:255',
            'amount' => 'required|array|min:1',
            'amount.*' => 'required|numeric|min:1',
            'remarks' => 'nullable|array',
            'remarks.*' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach($request->expense_name as $key => $value){
            $expenses = new ExpensesTransaction();
            $expenses->expenses_name = $request->expense_name[$key];
            $expenses->amount = $request->amount[$key];
            $expenses->remarks = $request->remarks[$key];
            $res = $expenses->save();

            Transaction::create([
                'transaction_table_name' => 'expenses_transactions',
                'table_id' => $expenses->id,
                'amount' => $expenses->amount,
                'remarks' => $expenses->remarks,
                'status' => 'credit'
            ]);
        }

        if($res){
            return redirect()->back()->with('success', 'Expenses Added Successfully.');
        }else{
            return redirect()->back()->withError(['error'=>'Expenses Not Added.']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $expense = ExpensesTransaction::find($id);
        if($expense){
            return view('expenses.edit',compact('expense'));
        }else{
            return redirect()->back()->withError(['error'=>'Expenses Not Found.']);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'expense_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'remarks' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $expenses = ExpensesTransaction::find($id);
        $expenses->expenses_name = $request->expense_name;
        $expenses->amount = $request->amount;
        $expenses->remarks = $request->remarks;
        $res = $expenses->update();
        if($res){
            $transaction = Transaction::where('transaction_table_name','expenses_transactions')->where('table_id',$expenses->id)->first();
            $transaction->amount = $expenses->amount;
            $transaction->remarks = $expenses->remarks;
            $res = $transaction->update();

            if($res){
                return redirect()->back()->with('success', 'Expenses Transaction Updated Successfully.');
            }else{
                return redirect()->back()->withError(['error'=>'Expenses Transaction Not Updated.']);
            }
        }else{
            return redirect()->back()->withError(['error'=>'Expenses Not Updated.']);
        }
    }

    public function destroy(string $id)
    {
        $expenses = ExpensesTransaction::find($id);
        if($expenses){
            Transaction::where('transaction_table_name','expenses_transactions')->where('table_id',$expenses->id)->delete();
            $res = $expenses->delete();
            if($res){
                return redirect()->back()->with('success', 'Expenses Deleted Successfully.');
            }else{
                return redirect()->back()->withError(['error'=>'Expenses Not Deleted.']);
            }
        }else{
            return redirect()->back()->withError(['error'=>'Expenses Not Found.']);
        }
    }
}
