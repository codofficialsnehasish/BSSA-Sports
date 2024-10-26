@extends('layouts.app')
@section('title', 'Tournament')


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
                        <li class="breadcrumb-item active" aria-current="page">Tournament</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('tournament.create') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Add New</button>
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
                                        <th>Tournament Name</th>
                                        <th>Tournament Date</th>
                                        <th>Registration Start Date</th>
                                        <th>Registration End Date</th>
                                        <th>Entry Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tournament->isNotEmpty())
                                    @foreach ($tournament as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tournament_name }}</td>
                                            <td>{{ $item->tournament_date }}</td>
                                            <td>{{ $item->registration_start_date }}</td>
                                            <td>{{ $item->registration_end_date }}</td>
                                            <td>{{ $item->entry_fee }}</td>
                                            <td>
                                                <a href="{{ route('tournament.edit', $item->id) }}"> <i class="text-primary" data-feather="edit"></i></a>
                                                <form action="{{ route('tournament.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit"><i class="text-danger" data-feather="trash-2"></i></button>
                                                </form>
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
