@extends('layouts.app')
@section('title', 'Special Interest')
@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Special Interest Master</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Special Interest</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('special-interest.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('special-interest.update',$special_interest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="class_name" class="form-label">Special Interest Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="class_name" placeholder="Enter Special Interest Name" value="{{ $special_interest->name }}"
                                            name="special_interest_name" required>
    
                                        <div class="invalid-feedback">
                                            Please enter a special interest name
                                        </div>
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

                                <h5 class="">Submit</h5>

                            </div>
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <label class="form-label mb-3 d-flex">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" {{ check_uncheck($special_interest->status,1) }}>
                                        <label class="form-check-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" {{ check_uncheck($special_interest->status,0) }}>
                                        <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                    </div>
                                </div>
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