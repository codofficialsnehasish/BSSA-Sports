@extends('layouts.app')

    @section('title') Employees @endsection
    
    @section('content')
    
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Employees</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Employees</li>
                        </ol>
                    </nav>
                </div>
                @can('Create Employee')
                <div class="ms-auto">
                    <a href="{{ route('employee.add') }}">
                        <button type="button" class="btn btn-grd btn-grd-info px-5"><i class="bi bi-plus-lg me-2"></i>Add New Employee</button>
                    </a>
                </div>
                @endcan
            </div>
            <!--end breadcrumb-->

            <div class="card mt-4">
                <div class="card-body">
                    <div class="product-table">
                        <div class="table-responsive white-space-nowrap">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            <input class="form-check-input" type="checkbox">
                                        </th>
                                        <th class="text-wrap">Join Date</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        @canany(['Edit Employee','Delete Employee'])
                                        <th>Action</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox">
                                        </td>
                                        <td class="text-wrap">{!! format_datetime($employee->created_at) !!}</td>
                                        <td class="text-wrap">{{$employee->name}}</td>
                                        <td>{{ get_role($employee->id) }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{!! check_status($employee->status) !!}</td>
                                        @canany(['Edit Employee','Delete Employee'])
                                        <td>
                                            @can('Edit Employee')
                                            <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}" alt="edit">Edit</a>
                                            @endcan
                                            @can('Delete Employee')
                                            <a class="btn btn-danger" onclick="return confirm('Are You Sure?')" href="{{ route('employee.delete',$employee->id)}}">Delete</a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection