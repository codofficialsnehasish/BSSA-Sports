@extends('layouts.app')

@section('title', 'Balance Sheet')

@section('css')
    <style>
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            font-family: 'Arial', sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
            border: 1px solid #dddddd;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.total-row td {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        .styled-table tbody tr.total-row td:last-child {
            text-align: right;
            color: #009879;
        }

        .styled-table u {
            font-weight: bold;
            color: #009879;
        }
    </style>
@endsection

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
                        <li class="breadcrumb-item active" aria-current="page">Balance Sheet</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('accounts.search-profit-loss-report') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-0 col-md-10">
                                <label class="form-label">Search Using Date Range</label>
                                {{-- <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" class="form-control" required name="start_date" placeholder="Start Date" value="" autocomplete="off" />
                                    <input type="text" class="form-control" required name="end_date" placeholder="End Date" value="" autocomplete="off" />
                                </div> --}}
                                <input type="text" class="form-control date-range" name="date_range">
                            </div>
                            <div class="col-md-2" style="margin-top: 29px !important;">
                                <button class="btn btn-primary" type="submit">Search Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(!empty($groupedReceipts) || !empty($groupedPayments))
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3" onclick="">Print</a>
                    <div id="printableArea" class="table-responsive">
                        <div class="text-center">
                            <p style="font-size:20px;"><u><strong>BISHNUPUR SUB-DIVISIONAL SPORTS ASSOCIATION</strong></u></p>
                            <p style="font-size:20px;"><u><strong>BISHNUPUR, BANKURA</strong></u></p>
                            <p style="font-size:18px;">BALANCE SHEET, FOR THE PERIOD ENDED FROM {{ \Illuminate\Support\Carbon::parse($startDate)->format('d.m.Y') }} TO {{ \Illuminate\Support\Carbon::parse($endDate)->format('d.m.Y') }}</p>
                        </div>
                        
                        <div class="row">

                            @if(!empty($groupedReceipts))
                            <div class="col-md-6">
                                <table class="styled-table">
                                    <tr>
                                        <th colspan="2">Receipts</th>
                                        <th>Amount</th>
                                    </tr>

                                    @foreach ($groupedReceipts as $key => $receipt)
                                    <tr>
                                        <td @if(empty($receipt['transaction_category_name'])) colspan="2" @endif>
                                            @if(!empty($receipt['transaction_category_name'])) 
                                                <u>{{ $key }}</u>
                                                <br>
                                                @php 
                                                    $transaction_category_name = explode(',',$receipt['transaction_category_name']); 
                                                    $transaction_category_amounts = explode(',',$receipt['amounts']); 
                                                @endphp
                                                @foreach($transaction_category_name as $value)
                                                {{ $value }}<br>
                                                @endforeach 
                                            @else
                                                {{ $key }}
                                            @endif
                                        </td>
                                        @if(!empty($receipt['transaction_category_name'])) 
                                        <td>
                                            @foreach ($transaction_category_amounts as $transaction_category_amount )
                                            {{ $transaction_category_amount }}<br>
                                            @endforeach
                                        </td>
                                        @endif
                                        <td>{{ $receipt['total_amount'] }}</td>
                                    </tr>
                                    @endforeach

                                    
                                    <tr>
                                        <th colspan="2"><strong>Total Receipts</strong></th>
                                        <th><strong>{{ $totalReceipts }}</strong></th>
                                    </tr>
                                    
                                </table>
                            </div>
                            @endif

                            @if(!empty($groupedPayments))
                            <div class="col-md-6">
                                <table class="styled-table">
                                    <tr>
                                        <th colspan="2">Payments</th>
                                        <th>Amount</th>
                                    </tr>

                                    @foreach ($groupedPayments as $key => $payments)
                                    <tr>
                                        <td @if(empty($payments['transaction_category_name'])) colspan="2" @endif>
                                            @if(!empty($payments['transaction_category_name'])) 
                                                <u>{{ $key }}</u>
                                                <br>
                                                @php 
                                                    $transaction_category_name = explode(',',$payments['transaction_category_name']); 
                                                    $transaction_category_amounts = explode(',',$payments['amounts']); 
                                                @endphp
                                                @foreach($transaction_category_name as $value)
                                                {{ $value }}<br>
                                                @endforeach 
                                            @else
                                                {{ $key }}
                                            @endif
                                        </td>
                                        @if(!empty($payments['transaction_category_name'])) 
                                        <td>
                                            @foreach ($transaction_category_amounts as $transaction_category_amount )
                                            {{ $transaction_category_amount }}<br>
                                            @endforeach
                                        </td>
                                        @endif
                                        <td>{{ $receipt['total_amount'] }}</td>
                                    </tr>
                                    @endforeach
                        
                                    <tr>
                                        <th colspan="2"><strong>Total Payments</strong></th>
                                        <th><strong>{{ $totalPayments }}</strong></th>
                                    </tr>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(".datepicker").flatpickr();

    $(".time-picker").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "Y-m-d H:i",
    });

    $(".date-time").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    $(".date-format").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    $(".date-range").flatpickr({
        mode: "range",
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    $(".date-inline").flatpickr({
        inline: true,
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });
</script>
<script>
    $(document).ready(function() {
        $('#btn_print').click(function() {
            var printContents = $('#printableArea').html();
            var originalContents = $('body').html();

            $('body').html(printContents);
            window.print();
            $('body').html(originalContents);
        });
    });
</script>
@endsection