@extends('layouts.app')
@section('title', 'Create Category')
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
                        <h5 class="mb-4">Add Member Category</h5>
                        <form class="row g-3" id="jQueryValidationForm" action="{{ route('admin.member_category.store') }}"
                            method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="input1"
                                    placeholder="Category Name Here ..." name="name" value="{{ old('name') }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="input1" class="form-label">Members Fees</label>
                                <input type="number" class="form-control" id="fees_amount"
                                    placeholder="Members Fees" name="fees_amount" value="{{ old('fees_amount') }}"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="input7" class="form-label">Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type"
                                        id="type1" checked value="lifetime">
                                    <label class="form-check-label" for="type1">Lifetime</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type"
                                        id="type2" value="renewal">
                                    <label class="form-check-label" for="type2">Renewal</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="input7" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="is_visible_default1" checked value="1">
                                    <label class="form-check-label" for="is_visible_default1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="is_visible_default2" value="0">
                                    <label class="form-check-label" for="is_visible_default2">Inactive</label>
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

