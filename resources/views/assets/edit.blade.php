@extends('layouts.app')
@section('title', 'Assets')
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
                        <li class="breadcrumb-item active" aria-current="page">Update Asset</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('assets.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('assets.update',$asset->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="asset_name" class="form-label">Asset Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="asset_name" placeholder="Enter Asset"
                                            name="asset_name" value="{{ $asset->title }}" required>
    
                                        <div class="invalid-feedback">
                                            Please enter expense
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="amount" placeholder="Enter Amount"
                                            name="amount" value="{{ $asset->amount }}" required step="0.01">
    
                                        <div class="invalid-feedback">
                                            Please enter amount
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="remarks" class="form-label">Remarks (Optional)</label>
                                    <div class="">
                                        <textarea type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">{{ $asset->remarks }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-3">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="">Publish</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                        <button type="reset" class="btn btn-grd btn-grd-warning px-4">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>




    </div>
@endsection