@extends('layouts.app')
@section('title','Dashboard')
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
                    <li class="breadcrumb-item active" aria-current="page">Analysis</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-info">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">{{ $total_members }}</h4>
                        <h5 class="mt-3 text-light">Total Members</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-success text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">{{ $total_students }}</h4>
                        <h5 class="mt-3 text-light">Total Students</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-warning text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">{{ $total_employees }}</h4>
                        <h5 class="mt-3 text-light">Total Employees</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-danger text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">{{ $total_comity }}</h4>
                        <h5 class="mt-3 text-light">Total Committees</h5>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-warning text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">₹{{ $income_of_this_month }}</h4>
                        <h5 class="mt-3 text-light">Income of {{ date('F') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-danger text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">₹{{ $expenses_of_this_month }}</h4>
                        <h5 class="mt-3 text-light">Expenses of {{ date('F') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-info text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">248</h4>
                        <h5 class="mt-3 text-light">Total Students</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100 bg-success text-light">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 text-light">248</h4>
                        <h5 class="mt-3 text-light">Total Students</h5>
                    </div>
                </div>
            </div>
        </div> --}}

      </div><!--end row-->



</div>
@endsection
