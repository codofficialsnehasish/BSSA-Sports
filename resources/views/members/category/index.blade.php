@extends('layouts.admin_layout')

@section('title') Category @endsection


@section('content')
<!-- ============================================================== -->
<!-- Title and breadcrumb -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="d-flex align-items-center">
        <h5 class="font-medium m-b-0">Member Category</h5>
        <div class="custom-breadcrumb ml-auto">
            <a href="{{ route('dashboard') }}" class="breadcrumb">Home</a>
            <a href="javascript:void(0);" class="breadcrumb">Member Category</a>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Container fluid scss in scafholding.scss -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <a href="{{ route('member-category.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                    <table id="zero_config" class="responsive-table display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Visibility</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td>Show</td>
                                <td>10 September 2024,6:51 Am</td>
                                <td>
                                    <a class="btn btn-danger" href="javascript:void(0);">Edit</a>
                                    <a class="btn btn-success" href="javascript:void(0);">Delete</a>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection