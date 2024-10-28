@extends('layouts.app')
@section('title', 'Tournament')
@section('content')

    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tournament</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Tournament</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('tournament.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('tournament.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tournament_name" class="form-label">Tournament Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tournament_name" placeholder="Enter Tournament Name" name="tournament_name" value="{{ old('tournament_name') }}" required>
                                        <div class="invalid-feedback">
                                            Please enter tournament name
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tournament_category_id" class="form-label">Tournament Category</label>
                                    <select class="form-select" id="tournament_category_id" name="tournament_category_id" required>
                                        <option value="" disabled {{ old('tournament_category_id') ? '' : 'selected' }}>Choose Category</option>
                                        @foreach ($tournament_categorys as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('tournament_category_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose category
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="tournament_date" class="form-label">Tournament Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="tournament_date" placeholder="Enter Tournament Date" name="tournament_date" value="{{ old('tournament_date') }}" required>
                                        <div class="invalid-feedback">
                                            Please enter tournament date
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <label for="registration_start_date" class="form-label">Registration Start Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="registration_start_date" placeholder="Enter Registration Start Date" name="registration_start_date" value="{{ old('registration_start_date') }}" required>
                                        <div class="invalid-feedback">
                                            Please enter registration start date
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="registration_end_date" class="form-label">Registration End Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="registration_end_date" placeholder="Enter Registration End Date" name="registration_end_date" value="{{ old('registration_end_date') }}" required>
                                        <div class="invalid-feedback">
                                            Please enter registration end date
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="entry_fee" class="form-label">Entry Fee</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="entry_fee" placeholder="Enter Entry Fee" name="entry_fee" value="{{ old('entry_fee') }}" required step="0.01">
                                        <div class="invalid-feedback">
                                            Please enter entry fee
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