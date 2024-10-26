<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\User; 
use App\Models\Student;
use App\Models\Comity;
use App\Models\Transaction;

class Dashboard extends Controller
{
    public function dashboard(){
        $total_members = Members::all()->count();
        $total_students = Student::all()->count();
        $total_employees = User::all()->count();
        $total_comity = Comity::all()->count();

        $income_of_this_month = Transaction::where('transaction_type', 'credit')->sum('amount');
        $expenses_of_this_month = Transaction::where('transaction_type', 'debit')->sum('amount');
        return view('dashboard',compact('total_members','total_students','total_employees','total_comity','income_of_this_month','expenses_of_this_month'));
    }
}
