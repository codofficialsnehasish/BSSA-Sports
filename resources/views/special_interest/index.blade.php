@extends('layouts.app')
@section('title', 'Special Interest')

@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Special Interest</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('special-interest.create') }}">
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($special_interests->isNotEmpty())
                                    @foreach ($special_interests as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{!! check_status($item->status) !!}</td>
                                            <td>{{ format_datetime($item->created_at) }}</td>
                                            <td>
                                                <a href="{{ route('special-interest.edit', $item->id) }}"> <i class="text-primary" data-feather="edit"></i></a>
                                                <form action="{{ route('special-interest.destroy', $item->id) }}" onsubmit="return confirm('Are you sure?')" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit"><i class="text-danger" data-feather="trash-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No special interest found.</td>
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
