@extends('layouts.app')
@section('title', 'Expenses')


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
                        <li class="breadcrumb-item active" aria-current="page">Expenses Details of Date : {{ format_date($date) }}</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('expenses.index') }}">
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
                                    <th>Sl. No.</th>
                                    <th>Expense</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($expenses->isNotEmpty())
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($expenses as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->expenses_name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>{{ format_datetime($item->created_at) }}</td>
                                            <td>
                                                <a href="{{ route('expenses.edit', $item->id) }}"> <i class="text-primary" data-feather="edit"></i></a>
                                                <form action="{{ route('expenses.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit"><i class="text-danger" data-feather="trash-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No transactions found.</td>
                                    </tr>
                                @endif


                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Name</th>
                                    <th>Visibility</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
