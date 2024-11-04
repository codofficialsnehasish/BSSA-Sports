@extends('layouts.app')
@section('title', 'Assign Club In Tournament')
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
                        <li class="breadcrumb-item active" aria-current="page">Assign Club</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('tournaments.clubs',request()->segment(4)) }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('tournaments.process-assign-clubs') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">

                                <div class="col-md-6 mb-3">
                                    <label for="club_id" class="form-label">Clubs</label>
                                    <div class="input-group">
                                        <select class="form-select" id="club_id" name="club_id" required>
                                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Choose Clubs</option>
                                            @foreach ($clubs as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('club_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->club_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a club
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="memo_no" class="form-label">Memo No.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="memo_no" placeholder="Enter Memo No."
                                            name="memo_no" value="{{ old('memo_no') }}" required>
    
                                        <div class="invalid-feedback">
                                            Please enter memo no.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fee_amount" class="form-label">Fee Amount</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="fee_amount" name="fee_amount" value="{{ $tournament->entry_fee }}" readonly>
                                        <div class="invalid-feedback">
                                            Please enter fee amount
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="payment_mode" class="form-label">Payment Mode</label>
                                    <select class="form-select" id="payment_mode" name="payment_mode" required>
                                        <option value disabled selected>Choose Payment Mode</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Chaque">Chaque</option>
                                        <option value="Online">Online</option>
                                    </select>
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
                                {{-- <div class="mb-3">
                                    <label class="form-label mb-3 d-flex">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" checked>
                                        <label class="form-check-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0">
                                        <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                    </div>
                                </div> --}}
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