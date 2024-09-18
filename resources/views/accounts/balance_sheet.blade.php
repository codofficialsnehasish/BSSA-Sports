@extends('layouts.admin_layout')

@section('title') Balance Sheet @endsection


@section('content')
<!-- ============================================================== -->
<!-- Title and breadcrumb -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="d-flex align-items-center">
        <h5 class="font-medium m-b-0">Balance Sheet</h5>
        <div class="custom-breadcrumb ml-auto">
            <a href="{{ route('dashboard') }}" class="breadcrumb">Home</a>
            <a href="javascript:void(0);" class="breadcrumb">Accounts</a>
            <a href="javascript:void(0);" class="breadcrumb">Balance Sheet</a>
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
                    <table id="zero_config" class="responsive-table display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Camp Type</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>DOB</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection