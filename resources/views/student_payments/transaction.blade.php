@extends('layouts.app')
@section('title', 'Student Payment List')


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
                        <li class="breadcrumb-item active" aria-current="page">Studenta Payments</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.student.payment.create') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Make New Payments</button>
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
                                    <th class="text-wrap">Sl. No.</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($transaction->isNotEmpty())
                                    @foreach ($transaction as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ format_datetime($item->created_at) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('admin.student.payment.transaction-invoice',[format_date_for_db($item->created_at),request()->segment(3)]) }}">View Invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No transactions found.</td>
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
