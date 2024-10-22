@extends('layouts.app')

    @section('title') Employees @endsection
    
    @section('content')

        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Employees</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Employee</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-primary px-4" href="{{ route('employee') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                </div>
            </div>
            <!--end breadcrumb-->

            <form class="needs-validation" action="{{ route('employee.add.process') }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="card mt-4">
                            <div class="card-header text-center">Add Employee Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a name.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="email">Email ID</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" id="email" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="phone">Phone No.</label>
                                        <input type="number" name="mobile" id="phone" value="{{ old('mobile') }}" class="form-control" required placeholder="Enter phone number">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" required placeholder="Enter Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="select-role">Select Role</label>
                                        <div>
                                            <select name="roles" id="select-role" class="form-select">
                                                <option value selected disabled>Select a Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ old('roles') == $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="blood_group">Blood Group</label>
                                        <input type="text" name="blood_group" id="blood_group" value="{{ old('blood_group') }}" class="form-control" placeholder="Enter Blood Group">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="dob">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="form-control" placeholder="Enter Blood Group">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="select-gender">Select Gender</label>
                                        <div>
                                            <select name="gender" id="select-gender" class="form-select">
                                                <option value selected disabled>Select a Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="select-gender">Marital Status</label>
                                        <div>
                                            <select name="marital_status" id="select-gender" class="form-select">
                                                <option value selected disabled>Select a Marital Status</option>
                                                <option value="Married">Married</option>
                                                <option value="Unmarried">Unmarried</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="nationality">Nationality</label>
                                        <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="religion">Religion</label>
                                        <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="aadhaar_number">Aadhaar Number</label>
                                        <input type="text" name="aadhaar_number" id="aadhaar_number" value="{{ old('aadhaar_number') }}" class="form-control" placeholder="Enter Aadhaar Number">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="pan_card_number">Pan Card Number</label>
                                        <input type="text" name="pan_card_number" id="pan_card_number" value="{{ old('pan_card_number') }}" class="form-control" placeholder="Enter Pan Card Number">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="aadhaar_number">Aadhaar Proof</label>
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="aadhar_front_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="aadhar_front" type="file" id="aadhar_front">
                                        </div> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="aadhaar_number">Pan Card Proof</label>
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="aadhar_back" type="file" id="aadhar_back">
                                        </div> 
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="pin_code">Pin Code</label>
                                        <input type="text" name="pin_code" id="pin_code" value="{{ old('pin_code') }}" class="form-control" placeholder="Enter Pin Code">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="address">Address</label>
                                        <textarea type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="Enter Address"></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="nationality">Bank Name</label>
                                        <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="religion">IFSC Code</label>
                                        <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="religion">Bank Account Number</label>
                                        <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="aadhaar_number">Passbook Image</label>
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="aadhar_back" type="file" id="aadhar_back">
                                        </div> 
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="card mt-4">
                                <div class="card-header text-center">Add Employee Image</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="employee_image" type="file" id="imgInp">
                                    </div> 
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-center">Publish</div>
                                <div class="card-body">
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

            {{-- <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Besic Details</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-person me-1 fs-6"></i></div>
                                    <div class="tab-title">Personal Details</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-sallary" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bi bi-headset me-1 fs-6'></i></div>
                                    <div class="tab-title">Sallary Details</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-contact" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bi bi-headset me-1 fs-6'></i></div>
                                    <div class="tab-title">Bank Details</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                            <form class="needs-validation" action="{{ route('employee.add.process') }}" method="post" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a name.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="email">Email ID</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" id="email" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid email.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="phone">Phone No.</label>
                                                <input type="number" name="mobile" id="phone" value="{{ old('mobile') }}" class="form-control" required placeholder="Enter phone number">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid phone number.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="pass">Password</label>
                                                <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" required placeholder="Enter Password" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter password.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="select-role">Select Role</label>
                                                <div>
                                                    <select name="roles" id="select-role" class="form-select">
                                                        <option value selected disabled>Select a Role</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->name }}" {{ old('roles') == $role->name ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <label for="">Profile Image</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="employee_image" type="file" id="imgInp">
                                            </div> 
                                        </div> 
                                        <div class="row">
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
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                                <button type="reset" class="btn btn-grd btn-grd-warning px-4">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="blood_group">Blood Group</label>
                                    <input type="text" name="blood_group" id="blood_group" value="{{ old('blood_group') }}" class="form-control" placeholder="Enter Blood Group">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="dob">Date Of Birth</label>
                                    <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="form-control" placeholder="Enter Blood Group">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="select-gender">Select Gender</label>
                                    <div>
                                        <select name="gender" id="select-gender" class="form-select">
                                            <option value selected disabled>Select a Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="select-gender">Marital Status</label>
                                    <div>
                                        <select name="marital_status" id="select-gender" class="form-select">
                                            <option value selected disabled>Select a Marital Status</option>
                                            <option value="Married">Married</option>
                                            <option value="Unmarried">Unmarried</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="nationality">Nationality</label>
                                    <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="religion">Religion</label>
                                    <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="aadhaar_number">Aadhaar Number</label>
                                    <input type="text" name="aadhaar_number" id="aadhaar_number" value="{{ old('aadhaar_number') }}" class="form-control" placeholder="Enter Aadhaar Number">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="pan_card_number">Pan Card Number</label>
                                    <input type="text" name="pan_card_number" id="pan_card_number" value="{{ old('pan_card_number') }}" class="form-control" placeholder="Enter Pan Card Number">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="aadhaar_number">Aadhaar Proof</label>
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="aadhar_front_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="aadhar_front" type="file" id="aadhar_front">
                                    </div> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="aadhaar_number">Pan Card Proof</label>
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="aadhar_back" type="file" id="aadhar_back">
                                    </div> 
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="pin_code">Pin Code</label>
                                    <input type="text" name="pin_code" id="pin_code" value="{{ old('pin_code') }}" class="form-control" placeholder="Enter Pin Code">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <textarea type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="Enter Address"></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-sallary" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="nationality">Bank Name</label>
                                    <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="religion">IFSC Code</label>
                                    <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="religion">Bank Account Number</label>
                                    <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="aadhaar_number">Passbook Image</label>
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="aadhar_back" type="file" id="aadhar_back">
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-contact" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="nationality">Bank Name</label>
                                    <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="religion">IFSC Code</label>
                                    <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="religion">Bank Account Number</label>
                                    <input type="text" name="religion" id="religion" value="{{ old('religion') }}" class="form-control" placeholder="Enter Religion">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="aadhaar_number">Passbook Image</label>
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                    </div>
                                    <div class="mb-0">
                                        <input class="form-control" name="aadhar_back" type="file" id="aadhar_back">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    @endsection