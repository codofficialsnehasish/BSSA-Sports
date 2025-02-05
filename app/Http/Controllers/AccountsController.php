<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\Transaction;
use App\Models\Asset;
use App\Models\AssetsCategory;
use App\Models\ExpenseCategory;
use App\Models\ExpensesTransaction;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Balance Sheet', only: ['showProfitLossReport']),
        ];
    }

    /*public function showProfitLossReport()
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
    }*/

    public function showProfitLossReport(Request $request)
    {
        if($request->isMethod('post')){
            // Initialize base query for receipts (credit)
            $receiptsQuery = Transaction::select('transaction_name', 'transaction_category_name', DB::raw('SUM(amount) as total_amount'))
                            ->where('transaction_type', 'credit')
                            ->groupBy('transaction_name', 'transaction_category_name');
    
            // Initialize base query for payments (debit)
            $paymentsQuery = Transaction::select('transaction_name', 'transaction_category_name', DB::raw('SUM(amount) as total_amount'))
                            ->where('transaction_type', 'debit')
                            ->groupBy('transaction_name', 'transaction_category_name');
    
            // If request is a POST and date range is provided
            if ($request->isMethod('post') && $request->has('date_range')) {
                $dateRange = explode(' to ', $request->input('date_range'));
    
                // Check if both start and end dates are provided
                if (count($dateRange) !== 2 || empty($dateRange[0]) || empty($dateRange[1])) {
                    return redirect()->back()->withErrors(['date_range' => 'Please provide both start and end dates in the correct format.']);
                }
                $startDate = $dateRange[0];
                $endDate = $dateRange[1];
    
                // Apply date range filter to both queries
                // $receiptsQuery->whereBetween('created_at', [$startDate, $endDate]);
                $receiptsQuery->whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate);
                // $paymentsQuery->whereBetween('created_at', [$startDate, $endDate]);
                $paymentsQuery->whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate);
            }
    
            // Fetch the data
            $receipts = $receiptsQuery->get();
            $payments = $paymentsQuery->get();
    
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
                    'amounts' => $group->pluck('total_amount')->filter()->implode(', '),
                    'total_amount' => $group->sum('total_amount'),
                ];
            });
    
            // Calculate totals for receipts and payments
            $totalReceipts = $groupedReceipts->sum('total_amount');
            $totalPayments = $groupedPayments->sum('total_amount');
    
            // Return view with data
            return view('accounts.profit_loss_report', compact('groupedReceipts', 'groupedPayments', 'totalReceipts', 'totalPayments', 'startDate', 'endDate'));
        }

        if($request->isMethod('get')){
            return view('accounts.profit_loss_report');
        }
    }

    public function accountReport(Request $request,$id = null){
        $items = [];
        $startDate = null;
        $endDate = null;
        if($request->isMethod('post')){
            if ($request->has('date_range') && !empty($request->input('date_range'))) {
                $dateRange = explode(' to ', $request->input('date_range'));
    
                // Check if both start and end dates are provided
                if (count($dateRange) !== 2 || empty($dateRange[0]) || empty($dateRange[1])) {
                    return redirect()->back()->withErrors(['date_range' => 'Please provide both start and end dates in the correct format.']);
                }
                $startDate = $dateRange[0];
                $endDate = $dateRange[1];
                if($request->has('asset_name')){
                    $items = Asset::where('assets_category_id',$request->asset_name)
                                ->whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate)->get();
                }else{
                    $items = Asset::whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate)->get();
                }
            }else{
                $items = Asset::where('assets_category_id',$request->asset_name)->get();
            }
        }
        if($id != null){
            $items = Asset::where('assets_category_id',$id)->get();
        }
        $assets_categorys = AssetsCategory::all();
        return view('accounts.accounts_report',compact('assets_categorys','items','startDate','endDate'));
    }

    public function expence_accountReport(Request $request,$id = null){
        $items = [];
        $startDate = null;
        $endDate = null;
        if($request->isMethod('post')){
            if ($request->has('date_range') && !empty($request->input('date_range'))) {
                $dateRange = explode(' to ', $request->input('date_range'));
    
                // Check if both start and end dates are provided
                if (count($dateRange) !== 2 || empty($dateRange[0]) || empty($dateRange[1])) {
                    return redirect()->back()->withErrors(['date_range' => 'Please provide both start and end dates in the correct format.']);
                }
                $startDate = $dateRange[0];
                $endDate = $dateRange[1];
                if($request->has('expenses_category_id')){
                    $items = ExpensesTransaction::where('expenses_category_id',$request->expenses_category_id)
                                ->whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate)->get();
                }else{
                    $items = ExpensesTransaction::whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate)->get();
                }
            }else{
                $items = ExpensesTransaction::where('expenses_category_id',$request->expenses_category_id)->get();
            }
        }
        if($id != null){
            $items = ExpensesTransaction::where('expenses_category_id',$id)->get();
        }
        $expence_categorys = ExpenseCategory::all();
        return view('accounts.expence_accounts_report',compact('expence_categorys','items','startDate','endDate'));
    }

}
