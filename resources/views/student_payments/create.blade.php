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
                        <li class="breadcrumb-item active" aria-current="page">Make New Payment</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin.student.payment.index') }}">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <form class="row g-3 needs-validation" novalidate action="{{ route('admin.student.payment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-9 col-xl-9">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value selected disabled>Choose Category</option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="student_id" class="form-label">Students</label>
                                    <select class="form-select" id="student_id" name="student_id" required>
                                        <option value selected disabled>Please Select Category</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="amount" placeholder="Enter Amount"
                                            name="amount" value="{{ old('amount') }}" required step="0.01">
    
                                        <div class="invalid-feedback">
                                            Please enter amount
                                        </div>
                                        <div class="text-danger" id="custom-error" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="remarks" class="form-label">Remarks (Optional)</label>
                                    <div class="">
                                        <textarea type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" required>{{ old('remarks') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-3">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">

                                <h5 class="mb-4">Submit</h5>

                            </div>
                            <div class="card-body p-4">
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" id="submit-button" class="btn btn-grd btn-grd-info px-4">Submit</button>
                                        <button type="reset" class="btn btn-grd btn-grd-warning px-4">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $('#category_id').on('change',function() {
            $.ajax({
                url:"{{ route('admin.student.get-students-by-category') }}",
                type:"POST",
                data:{category_id:this.value, _token:"{{ csrf_token() }}"},
                success:function(resp){
                    if(resp && resp.length > 0) {
                        $('#student_id').empty().append('<option value selected disabled>Please Select Student</option>');
                        $.each(resp, function(index, student) {
                            $('#student_id').append('<option value="' + student.id + '">' + student.full_name + '</option>');
                        });
                    } else {
                        $('#student_id').empty().append('<option value selected disabled>No students available</option>');
                    }
                    console.log(resp);
                }
            });
        });

        let response;
        let admissionFees = 0;
        let monthlyFees = 0;

        $('#student_id').on('change',function() {
            $('#amount').val('');
            $('#remarks').val('');
            $.ajax({
                url:"{{ route('admin.student.get-students-payment-data') }}",
                type:"POST",
                data:{student_id:this.value, category_id:$('#category_id').val(), _token:"{{ csrf_token() }}"},
                success:function(resp){
                    // console.log(resp);
                    response = resp;
                    admissionFees = parseFloat(resp.admission_fees);
                    monthlyFees = parseFloat(resp.monthly_fees);
                    if(resp.is_paid_admission_fees == false){
                        $('#amount').val(resp.admission_fees);
                        $('#remarks').val('Admission Fees');
                    }else{
                        $('#amount').val(resp.monthly_fees);
                        $('#remarks').val('Monthly Fees');
                    }


                    // Attach validation logic to the amount input field
                    
                }
            });
        });

        $('#amount').on('input', function() {
            $('#custom-error').hide();
            $('#submit-button').prop('disabled', false);
            let enteredAmount = parseFloat($(this).val());

            // If admission fees haven't been paid, the amount must be at least admission fees
            if (response.is_paid_admission_fees == false) {
                if (enteredAmount < admissionFees) {
                    // alert(`Minimum amount to pay is ${admissionFees}`);
                    $('#custom-error').text(`Minimum amount to pay is ${admissionFees}`);
                    $('#custom-error').show();
                    $('#submit-button').prop('disabled', true);
                } else {
                    let extraAmount = enteredAmount - admissionFees;
                    if (extraAmount > 0 && extraAmount % monthlyFees !== 0) {
                        let nextMultiple = Math.floor(extraAmount / monthlyFees) + 1;
                        // console.log(nextMultiple);
                        let suggestedAmount = (nextMultiple * monthlyFees) + admissionFees;
                        // let suggestedAmount = Math.floor(extraAmount / monthlyFees) * monthlyFees + admissionFees;
                        // alert(`Invalid amount. Consider paying either ${admissionFees} or ${suggestedAmount}.`);
                        $('#custom-error').text(`Invalid amount. Consider paying either ${admissionFees} or ${suggestedAmount}.`);
                        $('#custom-error').show();
                        $('#submit-button').prop('disabled', true);
                    }
                }
            } else {
                // If admission fees are paid, just validate against monthly fees
                if (enteredAmount < monthlyFees) {
                    // alert(`Minimum amount to pay is ${monthlyFees}`);
                    $('#custom-error').text(`Minimum amount to pay is ${monthlyFees}`);
                    $('#custom-error').show();
                    $('#submit-button').prop('disabled', true);
                } else {
                    if (enteredAmount % monthlyFees !== 0) {
                        let nextMultiple = Math.floor(enteredAmount / monthlyFees) + 1;
                        let suggestedAmount = nextMultiple * monthlyFees;
                        // let suggestedAmount = Math.floor(enteredAmount / monthlyFees) * monthlyFees;
                        // alert(`Invalid amount. Consider paying either ${monthlyFees} or ${suggestedAmount}.`);
                        $('#custom-error').text(`Invalid amount. Consider paying either ${monthlyFees} or ${suggestedAmount}.`);
                        $('#custom-error').show();
                        $('#submit-button').prop('disabled', true);
                    }
                }
            }
        });
    </script>

@endsection
