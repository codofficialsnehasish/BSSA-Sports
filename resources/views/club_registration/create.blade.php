@extends('layouts.app')
@section('title', 'Club Registration')
@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Club Registration</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Club</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('club-registration.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('club-registration.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="club_name" class="form-label">Club Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="club_name" placeholder="Enter Club Name" name="club_name" value="{{ old('club_name') }}" required>
                                        <div class="invalid-feedback">
                                            Please enter club name
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_no" class="form-label">Contact No.</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="contact_no" placeholder="Enter Contact Number" name="contact_no" value="{{ old('contact_no') }}" required>
                                        <div class="invalid-feedback">
                                            Please enter contact number
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="club_address" class="form-label">Address</label>
                                    <div class="input-group">
                                        <textarea type="date" class="form-control" id="club_address" placeholder="Enter Club Address" name="club_address">{{ old('club_address') }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter address
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="district_id" class="form-label">Destrict</label>
                                    <div class="input-group">
                                        <select class="form-select" id="district_id" name="district_id" required>
                                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Choose District</option>
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('district_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a district
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
                                <h5 class="mb-2">Submit</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <label class="form-label mb-3 d-flex">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" checked>
                                        <label class="form-check-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0">
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