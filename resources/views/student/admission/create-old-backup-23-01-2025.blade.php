@extends('layouts.app')
@section('title', 'Admission')
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
                        <li class="breadcrumb-item active" aria-current="page">Admission</li>
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
            <form class="row g-3 needs-validation" novalidate action="{{ route('admin.student.admission.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Admission Form</h5>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="admission_fee" class="form-label">Admission Fees:</label>
                                    <span id="admission_fee" class="form-text">₹0.00</span>
                                    <input type="hidden" name="admission_fees" id="hidden_admission_fee">
                                </div>
                                <div class="col-md-4">
                                    <label for="monthly_fee" class="form-label">Monthly Fees:</label>
                                    <span id="monthly_fee" class="form-text">₹0.00</span>
                                    <input type="hidden" name="monthly_fees" id="hidden_monthly_fee">
                                </div>
                                <div class="col-md-4">
                                    <label for="monthly_fee" class="form-label">Age Category:</label>
                                    <span id="age_category" class="form-text"></span>
                                    <input type="hidden" name="fee_category_id" id="hidden_age_category">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date_of_admission" class="form-label">Date of Admission <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date_of_admission" name="date_of_admission" placeholder="Choose Date Of admission" value="{{ old('date_of_admission') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter a date
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" name="full_name" value="{{ old('full_name') }}" required>
                                    <div class="invalid-feedback">Please enter your full name</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="guardian_name" class="form-label">Father / Guardian's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="guardian_name" placeholder="Enter Father / Guardian's Name" name="guardian_name" value="{{ old('guardian_name') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your full name
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email ID" value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        Please enter your email
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input15" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Phone Number" value="{{ old('mobile_number') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your mobile number
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input15" class="form-label">Whatsapp Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="Enter Whatsapp Number" value="{{ old('whatsapp_number') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your whatsapp number
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Choose Date Of Birth" value="{{ old('dob') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your date of birth
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">Age <span id="age-show"></span></label>
                                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="{{ old('age') }}" required readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input13" class="form-label">Sex <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="sex1"
                                                checked value="Male">
                                            <label class="form-check-label" for="sex1">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="sex2"
                                                value="Female">
                                            <label class="form-check-label" for="sex2">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="sex3"
                                                value="Others">
                                            <label class="form-check-label" for="sex3">Others</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="height" class="form-label">Height(cm) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="height" name="height"
                                        placeholder="Height(cm)" value="{{ old('height') }}" required step="any" min="0">
                                    <div class="invalid-feedback">
                                        Please enter your height
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="weight" class="form-label">Weight (kg) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="weight" name="weight"
                                        placeholder="Weight (kg)" value="{{ old('weight') }}" required step="any" min="0">
                                    <div class="invalid-feedback">
                                        Please enter your Weight
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="school_portal_id" class="form-label">School Portal Id</label>
                                    <input type="text" class="form-control" id="school_portal_id"
                                        name="school_portal_id" value="{{ old('school_portal_id') }}">
                                    <div class="invalid-feedback">
                                        Please enter your school portal id
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="aadhaar" class="form-label">Aadhaar Card No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="aadhaar" name="aadhar_card_no"
                                        value="{{ old('aadhar_card_no') }}" placeholder="Aadhaar Card No" required>
                                    <div class="invalid-feedback">
                                        Please enter your aadhaar card no
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input30" class="form-label">Class <span class="text-danger">*</span></label>
                                    <select class="form-select" id="class_id" name="class_id" required>
                                        <option value="" disabled {{ old('class_id') ? '' : 'selected' }}>
                                            Choose
                                            Class</option>
                                        @foreach ($classes as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('class_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose class
                                    </div>
                                </div>
    
                                <div class="col-md-6 mb-3">
                                    <label for="input18" class="form-label">Uniform Size(Upper)</label>
                                    <input type="text" class="form-control" id="uniform_size" name="uniform_size"
                                        placeholder="Uniform Size(Upper)" value="{{ old('age') }}">
                                    <div class="invalid-feedback">
                                        Please enter your uniform size
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input30" class="form-label">Sports Category <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                            Choose
                                            Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose category
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="input33" class="form-label">Special Interest <span class="text-danger">*</span></label>
                                    <select class="form-select" id="interest_id" name="interest_id" required>
                                        <option value="" disabled {{ old('interest_id') ? '' : 'selected' }}>
                                            Choose
                                            Interest</option>
                                        @foreach ($special_interest as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('interest_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
    
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose interest
                                    </div>
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <label for="input33" class="form-label">District <span class="text-danger">*</span></label>
                                    <select class="form-select" id="district_id" name="district_id" required>
                                        <option value selected disabled>Choose District</option>
                                        @foreach ($districts as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == 13 ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose district
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input33" class="form-label">Subdivisions <span class="text-danger">*</span></label>
                                    <select class="form-select" id="subdivision_id" name="subdivision_id" required>
                                        <option value disabled selected>Choose Subdivisions</option>
                                        @foreach($subdivisions as $subdivision)
                                            <option value="{{ $subdivision->id }}">{{ $subdivision->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose subdivisions
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="residential_address" class="form-label"> Residential Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="residential_address"
                                        name="residential_address" placeholder="Residential Address" required
                                        value="{{ old('residential_address') }}">
                                    <div class="invalid-feedback">
                                        Please enter your residential address
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="input32" class="form-label">Permanent Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="permanent_address"
                                        name="permanent_address"placeholder="Permanent Address" required
                                        value="{{ old('permanent_address') }}">
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
                                <h5 class="mb-4">Profile & Aadhaar</h5>


                                <div class="col-md-12 mb-3">
                                    <label for="aadhaarInput" class="form-label">Aadhaar Card File <span class="text-danger">*</span></label>
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="aadhaarPreview" alt="" width="200" src="" data-holder-rendered="true">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="aadhar_proof" type="file" id="aadhaarInput" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="profileInput" class="form-label">Profile Image <span class="text-danger">*</span></label>
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="profilePreview" alt="" width="200" src="" data-holder-rendered="true">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="profile_image" type="file" id="profileInput" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                    </div>
                                    {{-- <div class="input-group">
                                        <input type="file" class="form-control" name="profile_image"
                                            id="profileInput" placeholder="Profile Image" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                        <img class="rounded me-2" alt="" width="200" src=""
                                            id="profilePreview">
                                    </div> --}}
                                </div>




                                <div class="col-md-12">
                                    <label for="input7" class="form-label">Visibility</label>
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




                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="">Publish</h5>
                            </div>
                            <div class="card-body p-4">
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
                //const dob = new Date($('#dob').val());
                const category_id = $('#category_id').val();
                //const today = new Date();

                // Calculate age
                //let age = today.getFullYear() - dob.getFullYear();
                //const monthDifference = today.getMonth() - dob.getMonth();

                //if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                  //  age--;
                //}

                // Set the calculated age in the age input field
                //$('#age').val(age);

                const dob = new Date($('#dob').val());
                const today = new Date();

                // Calculate differences
                let years = today.getFullYear() - dob.getFullYear();
                let months = today.getMonth() - dob.getMonth();
                let days = today.getDate() - dob.getDate();

                // Adjust for negative values
                if (days < 0) {
                    months--;
                    days += new Date(today.getFullYear(), today.getMonth(), 0).getDate(); // Get last month days
                }

                if (months < 0) {
                    years--;
                    months += 12;
                }

                // Set the calculated age in the age input field in "Y M D" format
                // $('#age').val(`${years} years, ${months} months, ${days} days`);
                $('#age').val(years);
                $('#age-show').text(`(${years} years, ${months} months, ${days} days)`);


                // Call the server to get the admission fee based on age and category
                if (!isNaN(years) && category_id) {
                    $.ajax({
                        url: `{{ url('admin/student-admission/get-fee-by-age') }}/${years}/${category_id}`,
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
                            $('#hidden_monthly_fee').val(monthlyFee.toFixed(2));
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
                $selected_subdivision.html('');

                if (district_id) {
                    $.ajax({
                        url: "{{ url('/admin/student-admission/get-subdivisions') }}/" + district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var options = '<option value="">Select Subdivision</option>';
                            $.each(data.subdivisions, function(index, subdivision) {
                                options += '<option value="' + subdivision.id + '">' + subdivision
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


@endsection
