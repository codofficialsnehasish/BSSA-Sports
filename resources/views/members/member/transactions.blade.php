@extends('layouts.app')
@section('title', 'Member Transactions')


@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> 
@endsection



@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Member Transactions</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.members.list') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="card"> 
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Member Name</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Transaction Id</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($member_transactions->isNotEmpty())
                                    @foreach ($member_transactions as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->member->full_name }}</td>
                                            <td>{{ $item->transaction_name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->transaction_id }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>{{ format_datetime($item->created_at) }}</td>
                                            <td>
                                                <a href="{{ route('admin.members.payment-invoice', $item->id) }}"> Invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No transactions found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
