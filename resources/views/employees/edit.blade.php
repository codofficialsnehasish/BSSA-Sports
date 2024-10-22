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
                            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-primary px-4" href="{{ route('employee') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                </div>
            </div>
            <!--end breadcrumb-->

            <form class="needs-validation" action="{{ route('employee.update') }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <div class="row">
                    <div class="col-md-9">
                        {{-- <div class="card mt-4">
                            <div class="card-header text-center">Edit Employee Details</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ $employee->name }}" name="name" id="name" placeholder="Enter name" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email ID</label>
                                    <input type="email" name="email" class="form-control" value="{{ $employee->email }}" placeholder="Enter email" id="email" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone No.</label>
                                    <input type="number" name="mobile" id="phone" value="{{ $employee->phone }}" class="form-control" required placeholder="Enter phone number">
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <!--<div class="mb-3">
                                    <label class="form-label" for="pass">Password</label>
                                    <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" required placeholder="Enter Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter password.</div>
                                </div> -->
                                <div class="mb-3">
                                    <label class="form-label" for="select-role">Select Role</label>
                                    <div>
                                        <select name="roles" id="select-role" class="form-select">
                                            <option value selected disabled>Select a Role</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->name }}" {{ get_role($employee->id) == $role->name ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="card mt-4">
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
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" class="form-control" value="{{ $employee->name }}" name="name" id="name" placeholder="Enter name" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a name.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="email">Email ID</label>
                                                <input type="email" name="email" class="form-control" value="{{ $employee->email }}" placeholder="Enter email" id="email" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid email.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="phone">Phone No.</label>
                                                <input type="number" name="mobile" id="phone" value="{{ $employee->phone }}" class="form-control" required placeholder="Enter phone number">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid phone number.</div>
                                            </div>
                                            {{-- <div class="col-md-6 mb-3">
                                                <label class="form-label" for="pass">Password</label>
                                                <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" required placeholder="Enter Password" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter password.</div>
                                            </div> --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="select-role">Select Role</label>
                                                <div>
                                                    <select name="roles" id="select-role" class="form-select">
                                                        <option value selected disabled>Select a Role</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->name }}" {{ get_role($employee->id) == $role->name ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="blood_group">Blood Group</label>
                                                <input type="text" name="blood_group" id="blood_group" value="{{ $employee->blood_group }}" class="form-control" placeholder="Enter Blood Group">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter password.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="dob">Date Of Birth</label>
                                                <input type="date" name="dob" id="dob" value="{{ $employee->date_of_birth }}" class="form-control" placeholder="Enter Blood Group">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter password.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="select-gender">Select Gender</label>
                                                <div>
                                                    <select name="gender" id="select-gender" class="form-select">
                                                        <option value selected disabled>Select a Gender</option>
                                                        <option @if($employee->gender == 'Male') selected @endif value="Male">Male</option>
                                                        <option @if($employee->gender == 'Female') selected @endif value="Female">Female</option>
                                                        <option @if($employee->gender == 'Others') selected @endif value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="select-gender">Marital Status</label>
                                                <div>
                                                    <select name="marital_status" id="select-gender" class="form-select">
                                                        <option value selected disabled>Select a Marital Status</option>
                                                        <option @if($employee->marital_status == 'Married') selected @endif value="Married">Married</option>
                                                        <option @if($employee->marital_status == 'Unmarried') selected @endif value="Unmarried">Unmarried</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="nationality">Nationality</label>
                                                <input type="text" name="nationality" id="nationality" value="{{ $employee->nationality }}" class="form-control" placeholder="Enter Nationality">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="religion">Religion</label>
                                                <input type="text" name="religion" id="religion" value="{{ $employee->religion }}" class="form-control" placeholder="Enter Religion">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="aadhaar_number">Aadhaar Number</label>
                                                <input type="text" name="aadhaar_number" id="aadhaar_number" value="{{ $employee->aadhaar_number }}" class="form-control" placeholder="Enter Aadhaar Number">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="pan_card_number">Pan Card Number</label>
                                                <input type="text" name="pan_card_number" id="pan_card_number" value="{{ $employee->pan_card_number }}" class="form-control" placeholder="Enter Pan Card Number">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="aadhar_proof">Aadhaar Proof</label>
                                                <div class="mb-3">
                                                    <img class="img-thumbnail rounded me-2" id="aadhar_proof_blah" alt="" width="200" src="{{ isset($employee->aadhaar_image) ? asset('storage/' . $employee->aadhaar_media->file_path) : '' }}" data-holder-rendered="true" style="display: {{ is_have_image($employee->aadhaar_image) }};">
                                                </div>
                                                <div class="mb-0">
                                                    <input class="form-control" name="aadhar_proof" type="file" id="aadhar_proof">
                                                </div> 
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="pan_card_proof">Pan Card Proof</label>
                                                <div class="mb-3">
                                                    <img class="img-thumbnail rounded me-2" id="pan_card_blah" alt="" width="200" src="{{ isset($employee->pan_card_proof) ? asset('storage/' . $employee->pan_card_media->file_path) : '' }}" data-holder-rendered="true" style="display: {{ is_have_image($employee->pan_card_proof) }};">
                                                </div>
                                                <div class="mb-0">
                                                    <input class="form-control" name="pan_card_proof" type="file" id="pan_card_proof">
                                                </div> 
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="pin_code">Pin Code</label>
                                                <input type="text" name="pin_code" id="pin_code" value="{{ $employee->pin_code }}" class="form-control" placeholder="Enter Pin Code">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="address">Address</label>
                                                <textarea type="text" name="address" id="address" class="form-control" placeholder="Enter Address">{{ $employee->address }}</textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="primary-pills-sallary" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationCustom01" class="form-label">Base Salary (per month)</label>
                                                    <input type="number" step="0.01" class="form-control" id="baseSalary" placeholder="0.00" name="base_salary" value="{{ $employee->sallary->base_salary ?? '' }}" onkeyup="calculatePayingInHand()">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">PF (Provident Fund) Contribution (% of base salary)</label>
                                                    <input type="number" class="form-control" id="pfContribution" placeholder="0.00"  name="provident_fund" value="{{ $employee->sallary->provident_fund ?? '' }}" onkeyup="calculatePayingInHand()">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">Health Insurance Deduction (per month)</label>
                                                    <input type="number" class="form-control" id="healthInsurance" placeholder="0.00"  name="health_insurance" value="{{ $employee->sallary->health_insurance ?? '' }}" onkeyup="calculatePayingInHand()">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">Income Tax Withholding (per month)</label>
                                                    <input type="number" class="form-control" id="incomeTax" placeholder="0.00"  name="income_tax" value="{{ $employee->sallary->income_tax ?? '' }}" onkeyup="calculatePayingInHand()">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="validationCustom02" class="form-label">Other Deductions (per month)</label>
                                                    <input type="number" class="form-control" id="otherDeductions" placeholder="0.00"  name="other_deductions" value="{{ $employee->sallary->other_deductions ?? '' }}" onkeyup="calculatePayingInHand()">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: flex;align-items: center;">
                                                <div class="mb-3 col-md-12">
                                                    <label for="validationCustom02" class="form-label">Paying In Hand (per month)</label>
                                                    <input type="number" class="form-control" id="payingInHand" placeholder="0.00"  name="paying_in_hand" value="{{ $employee->sallary->paying_in_hand ?? '' }}" readonly>
                                                    <label class="text-danger pt-1">This Field is Auto Genetarted</label>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="primary-pills-contact" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="bank_name">Bank Name</label>
                                                <input type="text" name="bank_name" id="bank_name" value="{{ $employee->bank_name }}" class="form-control" placeholder="Enter Bank Name">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="ifsc_code">IFSC Code</label>
                                                <input type="text" name="ifsc_code" id="ifsc_code" value="{{ $employee->ifsc_code }}" class="form-control" placeholder="Enter IFSC Code">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="bank_ac_number">Bank Account Number</label>
                                                <input type="text" name="bank_ac_number" id="bank_ac_number" value="{{$employee->bank_ac_number }}" class="form-control" placeholder="Enter Bank A/C Number">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="bank_passbook">Passbook Image</label>
                                                <div class="mb-3"> {{-- bank_passbook_media --}}
                                                    <img class="img-thumbnail rounded me-2" id="bank_passbook_blah" alt="" width="200" src="{{ isset($employee->passbook_image) ? asset('storage/' . $employee->bank_passbook_media->file_path) : '' }}" data-holder-rendered="true" style="display: {{ is_have_image($employee->passbook_image) }};">
                                                </div>
                                                <div class="mb-0">
                                                    <input class="form-control" name="bank_passbook" type="file" id="bank_passbook">
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="card mt-4">
                                <div class="card-header text-center">Edit Employee Image</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ isset($employee->profile_image) ? asset('storage/' . $employee->media->file_path) : '' }}" data-holder-rendered="true" style="display: {{ is_have_image($employee->profile_image) }};">
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
                                            <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" {{ check_uncheck($employee->status,1) }}>
                                            <label class="form-check-label" for="customRadioInline1">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" {{ check_uncheck($employee->status,0) }}>
                                            <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                        </div>
                                    </div>
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @endsection


    @section('scripts')
    <script>
        $('#aadhar_proof').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#aadhar_proof_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#pan_card_proof').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#pan_card_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#bank_passbook').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#bank_passbook_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>

    <script>
        function calculatePayingInHand() {
            var baseSalary = parseFloat(document.getElementById('baseSalary').value) || 0;
            console.log(baseSalary);
            var pfContribution = parseFloat(document.getElementById('pfContribution').value) || 0;
            var healthInsurance = parseFloat(document.getElementById('healthInsurance').value) || 0;
            var incomeTax = parseFloat(document.getElementById('incomeTax').value) || 0;
            var otherDeductions = parseFloat(document.getElementById('otherDeductions').value) || 0;

            var totalDeductions = pfContribution + healthInsurance + incomeTax + otherDeductions;
            var payingInHand = baseSalary - totalDeductions;

            document.getElementById('payingInHand').value = payingInHand.toFixed(2);
        }
        calculatePayingInHand();
    </script>
    @endsection