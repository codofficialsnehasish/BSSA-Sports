<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function showProfitLossReport()
    {
        // Fetch receipts (credit) and group by transaction name
        $receipts = Transaction::select('transaction_name', DB::raw('SUM(amount) as total_amount'))
                    ->where('transaction_type', 'credit')
                    ->groupBy('transaction_name')
                    ->get();

        // Fetch payments (debit) and group by transaction name
        $payments = Transaction::select('transaction_name', DB::raw('SUM(amount) as total_amount'))
                    ->where('transaction_type', 'debit')
                    ->groupBy('transaction_name')
                    ->get();

        // Calculate totals
        $totalReceipts = $receipts->sum('total_amount');
        $totalPayments = $payments->sum('total_amount');

        return view('accounts.profit_loss_report', compact('receipts', 'payments', 'totalReceipts', 'totalPayments'));
    }

}
