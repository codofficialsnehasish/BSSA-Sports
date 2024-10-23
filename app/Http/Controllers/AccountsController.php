<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function showProfitLossReport()
    {
        // Fetch receipts (credit) and group by transaction name and category
        $receipts = Transaction::select('transaction_name', 'transaction_category_name', DB::raw('SUM(amount) as total_amount'))
                    ->where('transaction_type', 'credit')
                    ->groupBy('transaction_name', 'transaction_category_name')
                    ->get();

        // Fetch payments (debit) and group by transaction name and category
        $payments = Transaction::select('transaction_name', 'transaction_category_name', DB::raw('SUM(amount) as total_amount'))
                    ->where('transaction_type', 'debit')
                    ->groupBy('transaction_name', 'transaction_category_name')
                    ->get();

        // Group receipts by transaction name
        $groupedReceipts = $receipts->groupBy('transaction_name')->map(function ($group) {
            return [
                'transaction_name' => $group->first()->transaction_name,
                'transaction_category_name' => $group->pluck('transaction_category_name')->filter()->unique()->implode(', '),
                'amounts' => $group->pluck('total_amount')->filter()->implode(', '),
                'total_amount' => $group->sum('total_amount'),
            ];
        });

        // Group payments by transaction name
        $groupedPayments = $payments->groupBy('transaction_name')->map(function ($group) {
            return [
                'transaction_name' => $group->first()->transaction_name,
                'transaction_category_name' => $group->pluck('transaction_category_name')->filter()->unique()->implode(', '),
                'total_amount' => $group->sum('total_amount'),
            ];
        });

        // Calculate totals for receipts and payments
        $totalReceipts = $groupedReceipts->sum('total_amount');
        $totalPayments = $groupedPayments->sum('total_amount');

        return view('accounts.profit_loss_report', compact('groupedReceipts', 'groupedPayments', 'totalReceipts', 'totalPayments'));
    }


}
