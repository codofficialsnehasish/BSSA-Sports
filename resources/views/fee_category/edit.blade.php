@extends('layouts.app')
@section('title', 'Fees Category')
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
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Fees Category Edit</h5>
                        <form class="row g-3" id="jQueryValidationForm" action="{{ route('admin.fee_category.update') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="input1"
                                    placeholder="Category Name Here ..." name="name"
                                    value="{{ old('name', $data->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="input30" class="form-label">Category</label>
                                <div class="input-group">

                                    <select class="form-select" id="category_id" name="category_id" required>


                                        <option value="" disabled
                                            {{ old('category_id', $data->category_id) ? '' : 'selected' }}>Choose
                                            Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id', $data->category_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose category
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Minimum Age</label>
                                <input type="number" class="form-control" id="min_age"
                                    placeholder="Minimum Age" name="min_age" value="{{ old('min_age',$data->min_age) }}"
                                    required step="any" min="0">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Maxmimum Age</label>
                                <input type="number" class="form-control" id="max_age"
                                    placeholder="Maxmimum Age" name="max_age" value="{{ old('max_age',$data->max_age) }}"
                                    required step="any" min="0">
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Admission Fees</label>
                                <input type="number" class="form-control" id="admission_fees"
                                    placeholder="Admission Fees" name="admission_fees" value="{{ old('admission_fees',$data->admission_fees) }}"
                                    required step="any" min="0">
                            </div>

                            <div class="col-md-6">
                                <label for="input1" class="form-label">Monthly Fees</label>
                                <input type="number" class="form-control" id="monthly_fees"
                                    placeholder="Monthly Fees" name="monthly_fees" value="{{ old('monthly_fees',$data->monthly_fees) }}"
                                    required step="any" min="0">
                            </div>

                            <div class="col-md-6">
                                <label for="input7" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1"
                                        value="1" {{ $data->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2"
                                        value="0" {{ $data->status == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status2">Inactive</label>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                    <button type="reset" class="btn btn-grd-royal px-4">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            @if (session('success'))
                round_success_noti('{{ session('success') }}');
            @endif


            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    round_error_noti('{{ $error }}');
                @endforeach
            @endif
        });
    </script>



@endsection
