@extends('layouts.app')
@section('title', 'Income')


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
                        <li class="breadcrumb-item active" aria-current="page">Incomes</li>
                    </ol>
                </nav>
            </div>
            @can('Create Asset') 
            <div class="ms-auto">
                <a href="{{ route('assets.create') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Add New</button>
                </a>
            </div>
            @endcan
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
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($assets->isNotEmpty())
                                    @foreach ($assets as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->remarks }}</td>
                                            <td>{{ format_datetime($item->created_at) }}</td>
                                            <td>
                                                {{-- <a href="{{ route('assets.edit', $item->id) }}"> <i class="text-primary" data-feather="edit"></i></a> --}}
                                                {{-- <form action="{{ route('assets.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit"><i class="text-danger" data-feather="trash-2"></i></button>
                                                </form> --}}
                                                <a href="{{ route('asset.invoice', $item->id) }}"> Invoice</a>
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
