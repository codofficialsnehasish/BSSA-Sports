<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function assets()
    {
        return view('accounts.assets');
    }

    public function purches()
    {
        return view('accounts.purches');
    }

    public function sallaries()
    {
        return view('accounts.sallaries');
    }

    public function missniliyes()
    {
        return view('accounts.missniliyes');
    }

    public function profit_loss()
    {
        return view('accounts.profit_loss');
    }

    public function criditor_dators()
    {
        return view('accounts.criditor_dators');
    }

    public function balance_sheet()
    {
        return view('accounts.balance_sheet');
    }


}
