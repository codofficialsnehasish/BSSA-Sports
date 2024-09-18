@extends('layouts.admin_layout')

@section('title') Add Member @endsection


@section('content')
<!-- ============================================================== -->
<!-- Title and breadcrumb -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="d-flex align-items-center">
        <h5 class="font-medium m-b-0">Create Member</h5>
        <div class="custom-breadcrumb ml-auto">
            <a href="{{ route('dashboard') }}" class="breadcrumb">Home</a>
            <a href="{{ route('members.index') }}" class="breadcrumb">Members</a>
            <a href="javascript:void(0);" class="breadcrumb">Add Member</a>
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
                    <a href="{{ route('members.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    <form class="h-form">
                        <div class="form-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="full-n">Member Category</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <select>
                                            <option value="" disabled selected>Choose Category</option>
                                            <option value="1">Manager</option>
                                            <option value="2">Developer</option>
                                            <option value="3">Business</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="full-n">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="full-n" type="text" placeholder="Full Name Here">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="em1">Email</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="em1" type="text" placeholder="Email Here">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="title">Contact Number</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="title" type="number" placeholder="Contact Number Here">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="com1">Date of Birth</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input type="text" id="dob" class="datepicker">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="con2">Address</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="con2" type="text" placeholder="Address Here">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label>Status</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <p>
                                            <label>
                                                <input name="group1" type="radio" checked />
                                                <span>Active</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                                <input name="group1" type="radio" />
                                                <span>Inactive</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="card-content">
                            <div class="form-action">
                                <button class="btn cyan waves-effect waves-light" type="submit" name="action">Save
                                </button>
                                <button class="btn waves-effect waves-light grey darken-4" type="submit" name="action">Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection