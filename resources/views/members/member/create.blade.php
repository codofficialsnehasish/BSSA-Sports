@extends('layouts.app')
@section('title', 'Create Member')
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
                        <li class="breadcrumb-item active" aria-current="page">Create Member</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('admin.members.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Members Entry</h5>

                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Members Category</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="member_cat_id" name="member_cat_id" required>
                                        <option value="" disabled {{ old('member_cat_id') ? '' : 'selected' }}>Choose
                                            Category</option>
                                        @foreach ($member_category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('member_cat_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose category
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="input25" placeholder="Full Name"
                                        name="full_name" value="{{ old('full_name') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your full name
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Father Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="father_name" placeholder="Father Name"
                                        name="father_name" value="{{ old('father_name') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your father name
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ old('email') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your email
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Mobile No.</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                                        placeholder="Phone" value="{{ old('mobile_number') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your mobile number
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Whatsapp No.</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="whatsapp_number" name="whatsapp_number"
                                        placeholder="Phone" value="{{ old('whatsapp_number') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your whatsapp number
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Date of Birth</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control " id="dob" name="dob"
                                        placeholder="DOB" value="{{ old('dob') }}" required>

                                    <div class="invalid-feedback">
                                        Please enter your date of birth
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Age</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="age" name="age"
                                        placeholder="Age" value="{{ old('age') }}" required>
                                    <div class="invalid-feedback">
                                        Please enter your age
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Aadhaar Card No</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="input13" name="aadhar_card_no"
                                        value="{{ old('aadhar_card_no') }}" placeholder="Aadhaar Card No" required>
                                    <div class="invalid-feedback">
                                        Please enter your aadhaar card no
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Select
                                    Interest Sports</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Choose
                                            Sports</option>
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
                            </div>

                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Enter
                                    Address</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="address" name="address"placeholder="Address" required>{{ old('address') }}</textarea>
                                    <div class="invalid-feedback">
                                        Please enter your address
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input35" class="col-sm-3 col-form-label">Select
                                    District</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="district_id" name="district_id" required>
                                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Choose
                                            District</option>
                                        @foreach ($districts as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('district_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose district
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
                                <h5 class="mb-4">Members Entry</h5>


                                <div class="col-md-12 mb-3">
                                    <label for="aadhaarInput" class="form-label">Aadhaar Card File</label>
                                    {{-- <div class="input-group">
                                        <input type="file" class="form-control" name="aadhar_proof" id="aadhaarInput"
                                            placeholder="Aadhaar Card File" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                        <img class="rounded me-2" alt="" width="200" src=""
                                            id="aadhaarPreview">
                                    </div> --}}
                                    <div class="mb-3">
                                        {{-- <img class="img-thumbnail rounded me-2" id="aadhaarPreview" alt="" width="200" src="" data-holder-rendered="true"> --}}
                                        <img class="img-thumbnail rounded me-2" alt="" width="200" src="" id="aadhaarPreview">
                                    </div>
                                    <div class="mb-0">
                                        <input type="file" class="form-control" name="aadhar_proof" id="aadhaarInput" placeholder="Aadhaar Card File" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="profileInput" class="form-label">Profile Image</label>
                                    {{-- <div class="input-group">
                                        <input type="file" class="form-control" name="profile_image" id="profileInput" placeholder="Profile Image" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                        <img class="rounded me-2" alt="" width="200" src="" id="profilePreview">
                                    </div> --}}
                                    <div class="mb-3">
                                        {{-- <img class="img-thumbnail rounded me-2" id="aadhaarPreview" alt="" width="200" src="" data-holder-rendered="true"> --}}
                                        <img class="rounded me-2" alt="" width="200" src="" id="profilePreview">
                                    </div>
                                    <div class="mb-0">
                                        <input type="file" class="form-control" name="profile_image" id="profileInput" placeholder="Profile Image" required>
                                        <div class="invalid-feedback">
                                            Please choose a file
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <label for="input7" class="form-label">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="is_visible_default1" value="1"
                                            {{ old('status') ? '' : 'selected' }}>
                                        <label class="form-check-label" for="is_visible_default1">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="is_visible_default2" value="0" {{ old('status') ? '' : 'selected' }}
                                            checked>
                                        <label class="form-check-label" for="is_visible_default2">Inactive</label>
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



@endsection
