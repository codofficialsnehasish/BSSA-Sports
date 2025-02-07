@extends('layouts.app')
@section('title', 'Preview Admission')
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
                        <li class="breadcrumb-item active" aria-current="page">Members Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row g-3">
            <div class="col-auto">
                <div class="position-relative">
                    <input class="form-control px-5" type="search" placeholder="Search ">
                    <span
                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
            </div>
            <div class="col-auto">

                <div class="d-flex align-items-center gap-2 justify-content-lg-end">

                    <a href="javascript:void(0)"
                        onclick="popupCenter({ 
                    url: '{{ route('admin.student.admission.print_form', $data->id) }}', 
                    title: 'Print Invoice', 
                    w: 800, 
                    h: 600 
                    });"
                        class="btn btn-outline-primary me-1 mb-1  float-end" aria-expanded="false">
                        <span class="ms-1" data-feather="printer" style="height:12.8px;width:12.8px;"></span>Print
                    </a>

                </div>


            </div>
        </div><!--end row-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('admin.student.admission.update') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Admission Form</h5>
                            <div class="row">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="admission_fee" class="form-label">Admission Fees:</label>
                                        <span id="admission_fee"
                                            class="form-text">₹{{ number_format($data->admission_fees, 2) }}</span>

                                        <input type="hidden" name="admission_fees" id="hidden_admission_fee"
                                            value="{{ $data->admission_fees }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="monthly_fee" class="form-label">Monthly Fees:</label>
                                        <span id="monthly_fee"
                                            class="form-text">₹{{ number_format($data->monthly_fees, 2) }}</span>
                                        <input type="hidden" name="monthly_fees" id="hidden_monthly_fee"
                                            value="{{ $data->monthly_fees }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="monthly_fee" class="form-label">Age Category:</label>
                                        <span id="age_category" class="form-text">
                                            {{ $data->fee_category ? $data->fee_category->name : '' }}</span>
                                        <input type="hidden" name="fee_category_id" id="hidden_age_category"
                                            value="{{ $data->fee_category_id }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="input25" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">person_outline</i></span>
                                    <input type="text" class="form-control" id="input25" placeholder="Full Name"
                                        name="full_name" value="{{ old('full_name', $data->full_name) }}" required>

                                    <div class="invalid-feedback">
                                        Please enter your full name
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="input25" class="form-label">Father/Guardian’s Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">person_outline</i></span>
                                    <input type="text" class="form-control" id="guardian_name" placeholder="Full Name"
                                        name="guardian_name" value="{{ old('guardian_name', $data->guardian_name) }}"
                                        required>

                                    <div class="invalid-feedback">
                                        Please enter your full name
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="input27" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="material-icons-outlined fs-5">mail</i></span>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ old('email', $data->email) }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your email
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input15" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">call</i></span>
                                        <input type="text" class="form-control" id="mobile_number"
                                            name="mobile_number" placeholder="Phone"
                                            value="{{ old('mobile_number', $data->mobile_number) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter your mobile number
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="input15" class="form-label">Whatsapp Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">call</i></span>
                                        <input type="text" class="form-control" id="whatsapp_number"
                                            name="whatsapp_number" placeholder="Whatsapp Number"
                                            value="{{ old('whatsapp_number', $data->whatsapp_number) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter your whatsapp number
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <label for="input29" class="form-label">Date of Birth</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">calendar_today</i></span>
                                        <input type="date" class="form-control datepicker" id="dob"
                                            name="dob" placeholder="DOB" value="{{ old('dob', $data->dob) }}"
                                            required>

                                        <div class="invalid-feedback">
                                            Please enter your date of birth
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="input29" class="form-label">Age</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">calendar_today</i></span>
                                        <input type="text" class="form-control" id="age" name="age"
                                            placeholder="Age" value="{{ old('age', $data->age) }}" required readonly>

                                        <div class="invalid-feedback">
                                            Please enter your date of birth
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="input13" class="form-label">Sex</label>
                                    <div class="input-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="sex1"
                                                value="Male" {{ $data->sex == 'Male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sex1">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="sex2"
                                                value="Female" {{ $data->sex == 'Female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sex2">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="sex3"
                                                value="Others" {{ $data->sex == 'Others' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sex3">Others</label>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input18" class="form-label">Height(cm)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">event</i></span>
                                        <input type="number" class="form-control" id="height" name="height"
                                            placeholder="Height(cm)" value="{{ old('height', $data->height) }}"
                                            step="any" min="0">
                                        <div class="invalid-feedback">
                                            Please enter your height
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="input18" class="form-label">Weight (kg)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">event</i></span>
                                        <input type="number" class="form-control" id="weight" name="weight"
                                            placeholder="Weight (kg)" value="{{ old('weight', $data->weight) }}"
                                            step="any" min="0">
                                        <div class="invalid-feedback">
                                            Please enter your Weight
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input18" class="form-label">School Portal Id</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">event</i></span>
                                        <input type="text" class="form-control" id="school_portal_id"
                                            name="school_portal_id" placeholder="School Portal Id"
                                            value="{{ old('school_portal_id', $data->school_portal_id) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter your school portal id
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="input13" class="form-label">Aadhaar Card No</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">watch_later</i></span>
                                        <input type="text" class="form-control" id="input13" name="aadhar_card_no"
                                            value="{{ old('aadhar_card_no', $data->aadhar_card_no) }}"
                                            placeholder="Aadhaar Card No" required>
                                        <div class="invalid-feedback">
                                            Please enter your aadhaar card no
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input30" class="form-label">Class</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">watch_later</i></span>
                                        <select class="form-select" id="class_id" name="class_id" required>


                                            <option value="" disabled {{ old('class_id') ? '' : 'selected' }}>
                                                Choose
                                                Class</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('class_id', $data->class_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose class
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="input18" class="form-label">Uniform Size(Upper)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">event</i></span>
                                        <input type="text" class="form-control" id="uniform_size" name="uniform_size"
                                            placeholder="Uniform Size(Upper)"
                                            value="{{ old('age', $data->uniform_size) }}">
                                        <div class="invalid-feedback">
                                            Please enter your uniform size
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input30" class="form-label">Sports Category</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">watch_later</i></span>
                                        <select class="form-select" id="category_id" name="category_id" required>


                                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                                Choose
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
                                    <label for="input33" class="form-label">Special Interest </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">science</i></span>
                                        <select class="form-select" id="interest_id" name="interest_id" required>
                                            <option value="" disabled {{ old('interest_id') ? '' : 'selected' }}>
                                                Choose
                                                Interest</option>
                                            @foreach ($special_interest as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('interest_id', $data->interest_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose interest
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input33" class="form-label">District</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">science</i></span>
                                        <select class="form-select" id="district_id" name="district_id" required>
                                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                                Choose
                                                District</option>
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('district_id', $data->district_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose district
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="input33" class="form-label">Subdivisions </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i
                                                class="material-icons-outlined fs-5">science</i></span>
                                        <select class="form-select" id="subdivision_id" name="subdivision_id" required>

                                            @if ($data->subdivision_id)

                                                @foreach ($subdivisions as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('subdivision_id', $data->subdivision_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="" disabled
                                                    {{ old('subdivision_id') ? '' : 'selected' }}>
                                                    Choose
                                                    Subdivisions</option>
                                            @endif



                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose subdivisions
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <label for="input32" class="form-label"> Residential Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">opacity</i></span>
                                    <input type="text" class="form-control" id="residential_address"
                                        name="residential_address"placeholder="Residential Address" required
                                        value="{{ old('residential_address', $data->residential_address) }}">
                                    <div class="invalid-feedback">
                                        Please enter your residential address
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="input32" class="form-label">Permanent Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">opacity</i></span>
                                    <input type="text" class="form-control" id="permanent_address"
                                        name="permanent_address"placeholder="Permanent Address" required
                                        value="{{ old('permanent_address', $data->permanent_address) }}">
                                    <div class="invalid-feedback">
                                        Please enter your permanent address
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-3">
                    <div class="row">

                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Admission Form</h5>


                                <div class="col-md-12">
                                    <label for="aadhaarInput" class="form-label">Aadhaar Card File</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="aadhar_proof" id="aadhaarInput"
                                            placeholder="Aadhaar Card File">
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                        <img class="rounded me-2" alt="" width="200"
                                            src="{{ isset($data->aadhar_proof_media) ? asset('storage/' . $data->aadhar_proof_media->file_path) : '' }}"
                                            id="aadhaarPreview" data-holder-rendered="true">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="profileInput" class="form-label">Profile Image</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="profile_image"
                                            id="profileInput" placeholder="Profile Image">
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                        <img class="rounded me-2" alt="" width="200"
                                            src="{{ isset($data->profile_image_media) ? asset('storage/' . $data->profile_image_media->file_path) : '' }}"
                                            id="profilePreview">
                                    </div>
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




                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">

                                <h5 class="mb-4">Submit</h5>

                            </div>
                            <div class="card-body p-4">
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                        <button type="reset" class="btn btn-grd-royal px-4">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-3">
                </div>
            </form>
        </div>




    </div>
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".datepicker").flatpickr();

        $(".time-picker").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "Y-m-d H:i",
        });

        $(".date-time").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $(".date-format").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".date-range").flatpickr({
            mode: "range",
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".date-inline").flatpickr({
            inline: true,
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
    <script>
        function readURL(input, imgElementId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById(imgElementId).src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('aadhaarInput').addEventListener('change', function() {
            readURL(this, 'aadhaarPreview');
        });

        document.getElementById('profileInput').addEventListener('change', function() {
            readURL(this, 'profilePreview');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#dob, #category_id').on('change', function() {
                // Get the selected date of birth and category
                const dob = new Date($('#dob').val());
                const category_id = $('#category_id').val();
                const today = new Date();

                // Calculate age
                let age = today.getFullYear() - dob.getFullYear();
                const monthDifference = today.getMonth() - dob.getMonth();

                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }

                // Set the calculated age in the age input field
                $('#age').val(age);

                // Call the server to get the admission fee based on age and category
                if (!isNaN(age) && category_id) {
                    $.ajax({
                        url: `{{ url('admin/student-admission/get-fee-by-age') }}/${age}/${category_id}`,
                        type: 'GET',
                        success: function(response) {
                            console.log(response);
                            const admissionFee = parseFloat(response.feeCategory
                                .admission_fees) || 0;
                            const monthlyFee = parseFloat(response.feeCategory.monthly_fees) ||
                                0;
                            $('#admission_fee').text(`₹${admissionFee.toFixed(2)}`);
                            $('#monthly_fee').text(`₹${monthlyFee.toFixed(2)}`);
                            $('#hidden_admission_fee').val(admissionFee.toFixed(2));
                            $('#hidden_monthly_fee').val(admissionFee.toFixed(2));
                            $('#age_category').text(response.feeCategory.name);
                            $('#hidden_age_category').val(response.feeCategory.id);
                        },
                        error: function(xhr) {
                            console.error('Error fetching fee:', xhr.responseText);
                            alert('No fee category found for this age');
                            $('#admission_fee').val(''); // Clear the fee input
                        }
                    });
                }
            });
            $('#district_id').on('change', function() {
                var district_id = $(this).val();
                var $selected_subdivision = $('#subdivision_id');

                if (district_id) {
                    $.ajax({
                        url: "{{ url('/admin/student-admission/get-subdivisions') }}/" +
                            district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var options = '<option value="">Select Subdivision</option>';
                            $.each(data.subdivisions, function(index, subdivision) {
                                options += '<option value="' + subdivision.id + '">' +
                                    subdivision
                                    .name + '</option>';
                            });
                            $selected_subdivision.html(options);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching cities:', error);
                        }
                    });
                } else {
                    $selected_subdivision.html('<option value="">Select Subdivision</option>');
                }
            });
        });
    </script>
    <script>
        const popupCenter = ({
            url,
            title,
            w,
            h
        }) => {
            // Fixes dual-screen position                             Most browsers      Firefox
            const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;
            const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
                .documentElement.clientWidth : screen.width;
            const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
                .documentElement.clientHeight : screen.height;
            const systemZoom = width / window.screen.availWidth;
            const left = (width - w) / 2 / systemZoom + dualScreenLeft
            const top = (height - h) / 2 / systemZoom + dualScreenTop
            const newWindow = window.open(url, title,
                `
                scrollbars=yes,
                width=${w / systemZoom}, 
                height=${h / systemZoom}, 
                top=${top}, 
                left=${left}
            `
            )
            if (window.focus) newWindow.focus();
            newWindow.print();
        }
    </script>


@endsection
