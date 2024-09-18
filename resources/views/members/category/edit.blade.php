@extends('layouts.admin_layout')

@section('title') Edit Category @endsection


@section('content')
<!-- ============================================================== -->
<!-- Title and breadcrumb -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="d-flex align-items-center">
        <h5 class="font-medium m-b-0">Member Category</h5>
        <div class="custom-breadcrumb ml-auto">
            <a href="{{ route('dashboard') }}" class="breadcrumb">Home</a>
            <a href="{{ route('member-category.index') }}" class="breadcrumb">Member Category</a>
            <a href="javascript:void(0);" class="breadcrumb">Edit Category</a>
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
                    <a href="{{ route('member-category.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    <form class="h-form">
                        <div class="form-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="full-n">Category Name</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="full-n" type="text" placeholder="Category Name Here">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label>Visibility</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <p>
                                            <label>
                                                <input name="group1" type="radio" checked />
                                                <span>Show</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                                <input name="group1" type="radio" />
                                                <span>Hide</span>
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