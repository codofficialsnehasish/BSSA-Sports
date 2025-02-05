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
            <div class="breadcrumb-title pe-3">Expence Accounts</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Expence Accounts</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('accounts.generate-expence-account-report') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-0 col-md-6">
                                <label class="form-label">Search Using Date Range</label>
                                <input type="text" class="form-control date-range" name="date_range">
                            </div>
                            <div class="col-md-4 mb-0">
                                <label for="asset_name" class="form-label">Account Name</label>
                                <div class="input-group">

                                    <select name="expenses_category_id" id="single-select-clear-field" data-placeholder="Choose one thing" class="form-select" required>
                                        <option value selected disabled>Select a account</option>
                                        @foreach($expence_categorys as $expence_category)
                                        <option value="{{ $expence_category->id }}">
                                            {{ $expence_category->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Please enter expense
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 29px !important;">
                                <button class="btn btn-primary" type="submit">Search Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(!empty($items))
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3" onclick="">Print</a>
                    <div id="printableArea" class="table-responsive">
                        <div class="text-center">
                            <p style="font-size:20px;"><u><strong>BISHNUPUR SUB-DIVISIONAL SPORTS ASSOCIATION</strong></u></p>
                            <p style="font-size:20px;"><u><strong>BISHNUPUR, BANKURA</strong></u></p>
                            <p style="font-size:18px;">Expence Account Statement @if(!empty($startDate) && !empty($endDate)), FOR THE PERIOD ENDED FROM {{ \Illuminate\Support\Carbon::parse($startDate)->format('d.m.Y') }} TO {{ \Illuminate\Support\Carbon::parse($endDate)->format('d.m.Y') }}@endif</p>
                        </div>
                        
                        <div class="row">
                            <div class="card"> 
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <tr>
                                                        <th>Sl. No.</th>
                                                        <th>Date Time</th>
                                                        <th>Title</th>
                                                        <th>Remarks</th>
                                                        <th>Amount</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($items->isNotEmpty())
                                                    @php $total_amount = 0 @endphp
                                                    @foreach ($items as $item)
                                                        @php $total_amount += $item->amount @endphp
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ format_datetime($item->created_at) }}</td>
                                                            <td>{{ $item->category->name }}</td>
                                                            <td>{{ $item->remarks }}</td>
                                                            <td>{{ $item->amount }}</td>
                                                            <td>{{ $item->desc }}</td>
                                                            <td>
                                                                <a href="{{ route('asset.invoice', $item->id) }}"> Invoice</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="4"> <b>Total</b> </td>
                                                        <td><b>{{ $total_amount }}</b></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="6" class="text-center">No transactions found.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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