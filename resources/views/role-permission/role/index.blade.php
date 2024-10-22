@extends('layouts.app')

    @section('title') Roles @endsection
    
    @section('content')


    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
            @can('Create Role')
            <div class="ms-auto">
                <button class="btn btn-grd btn-grd-info px-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-lg me-2"></i>Add New Role</button>
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
                                    <th>Name</th>
                                    @can('Asign Permission')
                                    <th>Asign Permission to Role</th>
                                    @endcan
                                    @canany(['Edit Role','Delete Role'])
                                    <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    @can('Asign Permission')
                                    <td><a href="{{ url('admin/roles/'.$role->id.'/give-permissions') }}" class="btn btn-outline-success">Asign Permission</a></td>
                                    @endcan
                                    @canany(['Edit Role','Delete Role'])
                                    <td class="d-flex">
                                        @can('Edit Role')
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropedit{{ $role->id }}" style="margin-right: 10px;"> 
                                            Edit
                                        </button>
                                        @endcan
                                        @can('Delete Role')
                                        <a class="btn btn-danger" href="{{ url('admin/roles/'.$role->id.'/delete') }}" onclick="return confirm('Are you sure?')">Delete</a>
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


        <div id="staticBackdrop" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 py-2">
                        <h5 class="modal-title">Add New Role</h5>
                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                            <i class="material-icons-outlined">close</i>
                        </a>
                    </div>
                    <form action="{{ route('roles.store') }}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="position-relative">
                            <label for="role-name" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" id="role-name" placeholder="Write Role name here..." required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-top-0">
                        <button type="submit" class="btn btn-grd btn-grd-info px-4">Save Role</button>
                    </div>                                          
                    </form>
                </div>
            </div>
        </div>

        @foreach($roles as $role)
        <div class="modal fade" id="staticBackdropedit{{ $role->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('roles.update',$role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="position-relative">
                            <label for="role-name" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" id="role-name" placeholder="Write role name here..." value="{{ $role->name }}" required="">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    @endsection