@extends('layouts.app')

@section('title', 'Member List')


@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Accounts</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profit Loss</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <p><strong>BISHNUPUR SUB-DIVISIONAL SPORTS ASSOCIATION</strong></p>
                        <p><strong>BISHNUPUR, BANKURA</strong></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <th>Receipts</th>
                                    <th>Amount</th>
                                </tr>

                                @foreach ($groupedReceipts as $key => $receipt)
                                <tr>
                                    <td>
                                        @if(!empty($receipt['transaction_category_name'])) 
                                            <u>{{ $key }}</u>
                                            <br>
                                            @php 
                                                $transaction_category_name = explode(',',$receipt['transaction_category_name']); 
                                                $transaction_category_amounts = explode(',',$receipt['amounts']); 
                                            @endphp
                                            @foreach($transaction_category_name as $key => $value)
                                            {{ $value }} : {{ $transaction_category_amounts[$key] }}<br>
                                            @endforeach 
                                        @else
                                            {{ $key }}
                                        @endif
                                    </td>
                                    <td>{{ $receipt['total_amount'] }}</td>
                                </tr>
                                @endforeach
                    
                                <tr>
                                    <th>Total Receipts</th>
                                    <th>{{ $totalReceipts }}</th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <th>Payments</th>
                                    <th>Amount</th>
                                </tr>
                    
                                @foreach ($groupedPayments as $key => $payments)
                                <tr>
                                    <td>
                                        @if(!empty($payments['transaction_category_name'])) 
                                            <u>{{ $key }}</u>
                                            <br>
                                            @php 
                                                $transaction_category_name = explode(',',$payments['transaction_category_name']); 
                                                $transaction_category_amounts = explode(',',$payments['amounts']); 
                                            @endphp
                                            @foreach($transaction_category_name as $key => $value)
                                            {{ $value }} : {{ $transaction_category_amounts[$key] }}<br>
                                            @endforeach 
                                        @else
                                            {{ $key }}
                                        @endif
                                    </td>
                                    <td>{{ $payments['total_amount'] }}</td>
                                </tr>
                                @endforeach
                    
                                <tr>
                                    <th>Total Payments</th>
                                    <th>{{ $totalPayments }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection