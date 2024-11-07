@extends('layouts.app')
@section('title', 'Student Details')

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
                        <li class="breadcrumb-item active" aria-current="page">student Details</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.student.admission.list') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3" onclick="">Print</a>
                    <div id="printableArea" class="table-responsive">
                        <div class="container my-5">
                            <div class="text-center mb-4">
                                <h2>BISHNUPUR SUB-DIVISIONAL SPORTS ASSOCIATION</h2>
                                <p>BISHNUPUR, BANKURA</p>
                            </div>
                            <form>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="formNo" class="form-label">Application No : {{ $student->application_id }}</label>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="border border-dark" style="width: 150px; height: 200px; margin: 0 auto;">
                                            <img style="width: 147px;" src="{{ isset($student->profile_image_media) ? asset('storage/' . $student->profile_image_media->file_path) : '' }}" alt="">
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="studentName" class="form-label">Student's Name : {{ $student->full_name }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Roll No : {{ $student->roll_no }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Date of Birth : {{ $student->dob }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Gender : {{ $student->sex }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Guardian Name : {{ $student->guardian_name }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Email : {{ $student->email }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Mobile Number : {{ $student->mobile_number }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Whatsapp Number : {{ $student->whatsapp_number }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Aadhaar Card No : {{ $student->aadhar_card_no }}</label>
                                    </div>
        
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Age : {{ $student->age }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Height : {{ $student->height }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Weight : {{ $student->weight }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Class : {{ $student->class->name }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">School Portal Id : {{ $student->school_portal_id }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Sports Category : {{ $student->category->name }}</label>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <label for="dob" class="form-label">Special Interest : {{ $student->special_interest->name }}</label>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Height(cm) : {{ $student->height }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Weight (kg) : {{ $student->weight }}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Uniform Size(Upper) : {{ $student->uniform_size }}</label>
                                    </div>
                                </div>
                    
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="presentAddress" class="form-label">Present Address : {{ $student->residential_address }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="permanentAddress" class="form-label">Permanent Address : {{ $student->permanent_address }}</label>
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">District : {{ $student->district->name }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Subdivisions : {{ $student->subdivision->name }}</label>
                                    </div>
                                </div>
                    
                                <div class="row mb-3 text-center">
                                    <div class="col-md-6">
                                        <label>Signature of Father / Guardian</label>
                                        <div class="border border-dark" style="height: 50px;"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Signature of Applicant</label>
                                        <div class="border border-dark" style="height: 50px;"></div>
                                    </div>
                                </div>
                            </form>
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