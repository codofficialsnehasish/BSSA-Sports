@extends('layouts.app')
@section('title', 'Member List')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> 
@endsection
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
                        <li class="breadcrumb-item active" aria-current="page">Member Details</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.members.list') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="card-title">Member Details</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block" style="float: inline-end;">
                            <a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3" onclick="">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="printableArea" class="table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ isset($member->profile_image) ? asset('storage/' . $member->profile_image_media->file_path) : '' }}" class="img-fluid rounded-circle" alt="Profile Image">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title">{{ $member->full_name }}</h5>
                                <p class="card-text"><strong>ID:</strong> {{ $member->id }}</p>
                                <p class="card-text"><strong>Member ID:</strong> {{ $member->member_id }}</p>
                                <p class="card-text"><strong>Father's Name:</strong> {{ $member->father_name }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $member->email }}</p>
                                <p class="card-text"><strong>Mobile Number:</strong> {{ $member->mobile_number }}</p>
                                <p class="card-text"><strong>WhatsApp Number:</strong> {{ $member->whatsapp_number }}</p>
                                <p class="card-text"><strong>Date of Birth:</strong> {{ $member->dob }}</p>
                                <p class="card-text"><strong>Age:</strong> {{ $member->age }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $member->address }}</p>
                                <p class="card-text"><strong>Aadhar Card No:</strong> {{ $member->aadhar_card_no }}</p>
                                <p class="card-text"><strong>Subscription End Date:</strong> {{ $member->subscription_end_date }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $member->status }}</p>
                                <p class="card-text"><strong>Created At:</strong> {{ $member->created_at }}</p>
                                <p class="card-text"><strong>Updated At:</strong> {{ $member->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#btn_print').click(function() {
            var printContents = $('#printableArea').html();
            var originalContents = $('body').html();

            $('body').html(printContents);
            window.print();
            $('body').html(originalContents);
        });
    });
</script>
@endsection