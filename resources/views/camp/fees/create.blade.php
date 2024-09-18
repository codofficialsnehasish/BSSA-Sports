@extends('layouts.admin_layout')

@section('title') Fees Collection @endsection


@section('content')
<!-- ============================================================== -->
<!-- Title and breadcrumb -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="d-flex align-items-center">
        <h5 class="font-medium m-b-0">Admission Fees Collection</h5>
        <div class="custom-breadcrumb ml-auto">
            <a href="{{ route('dashboard') }}" class="breadcrumb">Home</a>
            <a href="{{ route('admission.fees-collection') }}" class="breadcrumb">Admission</a>
            <a href="javascript:void(0);" class="breadcrumb">Collect Admission Fees</a>
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
                    <a href="{{ route('admission.fees-collection') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    <form class="h-form">
                        <div class="form-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="full-n">Admission Name</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <select>
                                            <option value="" disabled selected>Choose ...</option>
                                            <option value="1">Ram Sengupta</option>
                                            <option value="2">Proloy Ray</option>
                                            <option value="3">Ishan Mondal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="title">Amount</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="title" type="number" placeholder="Amount Here" step="0.01">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="com1">Date of Collection</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input type="text" id="dob" class="datepicker">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="full-n">Status</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <select>
                                            <option value="" disabled selected>Choose ...</option>
                                            <option value="1">Collected</option>
                                            <option value="2">Due</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3">
                                        <div class="h-form-label">
                                            <label for="con2">Remarks</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s9">
                                        <input id="con2" type="text" placeholder="Remarks Here">
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