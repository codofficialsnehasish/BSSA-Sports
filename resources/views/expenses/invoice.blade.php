@extends('layouts.app')
@section('title', 'Income Invoice')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/payment_invoice_assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/payment_invoice_assets/css/media-query.css') }}">
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
                        <li class="breadcrumb-item active" aria-current="page">Expence Invoice</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="#" onclick="history.back()">
                    <button type="button" class="btn btn-grd btn-grd-info px-5">Back</button>
                </a>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3"
                        onclick="">Print</a>
                    <div id="printableArea" class="table-responsive">
                        <!--Invoice wrap start here -->
                        <div class="invoice_wrap student">
                            <div class="invoice-container">
                                <div class="invoice-content-wrap" id="download_section">
                                    <!--Header start here -->
                                    <header class="student-header" id="invo_header"
                                        style="display: flex;align-items: center;justify-content:center;">
                                        <div class="">
                                            <img src="{{ asset('assets/images/bssa-logo1.png') }}" width="100"
                                                class="logo-img" alt="">
                                        </div>
                                        <div style="text-align: center;color:black;">
                                            <p><strong>BISHNUPUR SUB-DIVISIONAL SPORTS ASSOCIATION</strong></p>
                                            <p><strong>(B.S.S.A)</strong></p>
                                            <p><strong>P.O. - BISHNUPUR, Dist. - BANKURA, PIN - 722122</strong></p>
                                        </div>
                                    </header>
                                    <!--Header end here -->
                                    <!--Invoice content start here -->
                                    <section class="ticket-booking-content" id="student_invoice">
                                        <div class="container">
                                            <!--Student billing details start -->
                                            <div class="invo-car-book-wrap1 pt-40">
                                                <div class="booking-content-wrap" style="text-align: center;color:black;">


                                                    <p><strong> {{ $expense->desc }}</strong></p>
                                                    <p><strong>Date - {{ format_date($expense->created_at) }}</strong></p>
                                                    <p><strong>Receipt No. - {{ $expense->memo_no }}</strong></p>
                                                </div>
                                            </div>
                                            <!--Student billing details end -->
                                            <!--Student table data start here -->
                                            <div class="table-wrapper pt-40">
                                                <table class="invoice-table student-invoice">
                                                    <thead>
                                                        <tr class="invo-tb-header">
                                                            <th class="font-md color-light-black">Details</th>
                                                            <th class="font-md color-light-black">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="invo-tb-body">
                                                        <tr class="invo-tb-row">
                                                            <td class="font-sm">{{ $expense->category->name }}</td>

                                                            <td class="font-sm">₹{{ $expense->amount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <!-- Student table data end here -->
                                            <!--Invoice additional info start here -->
                                            <div class="invo-addition-wrap pt-20 pb-40">
                                                <div class="invo-add-info-content w-60">
                                                    <!-- <h2 class="d-none">Hidden</h2>
                    <h3 class="font-md color-light-black">Pay By:</h3>
                    <div class="pt-10">
                     <div>
                      <span class="font-sm-500 color-light-black">Credit Card:</span>
                      <span class="font-sm">**** **** **** **23</span>
                     </div>
                     <div>
                      <span class="font-sm-500 color-light-black">Amount:</span>
                      <span class="font-sm">$6053</span>
                     </div>
                     <div>
                      <span class="font-sm-500 color-light-black">Due:</span>
                      <span class="font-sm">$0</span>
                     </div>
                    </div> -->
                                                </div>
                                                <div class="invo-bill-total w-40">
                                                    <table class="invo-total-table">
                                                        <tbody>
                                                            <!-- <tr>
                       <td class="font-md color-light-black">Sub Total:</td>
                       <td class="font-md-grey color-grey text-right">$5130.00</td>
                      </tr>
                      <tr class="tax-row bottom-border">
                       <td class="font-md color-light-black">Tax <span class="font-md color-grey">(18%)</span></td>
                       <td class="font-md-grey color-grey text-right">$923.40</td>
                      </tr> -->
                                                            <tr class="invo-grand-total bottom-border">
                                                                <td class="font-18-700 student-color pt-20">Grand Total:
                                                                </td>
                                                                <td class="font-18-500 color-light-black text-right pt-20">
                                                                    ₹{{ $expense->amount }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--Invoice additional info end here -->
                                            {{-- <p style="text-align: left;color:black;">Rupees {{ numberToWords($expense->amount) }} only</p> --}}



                                            <div class="d-flex " style="justify-content: space-between">
                                                <p style="text-align: left;color:black; position:relative">Rupees
                                                    {{ numberToWords($expense->amount) }} only</p>

                                                <p style="text-align: right;color:black;">
                                                    ............................................................</p>

                                            </div>
                                            <div class="col-lg-12 d-flex">
                                                <div class="col-lg-6">
                                                </div>
                                                <div class="col-lg-6">
                                                    <p
                                                        style="text-align: right;color:black;text-align:center; padding-left:100PX;">
                                                        Authorized
                                                        signature</p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!--Invoice content end here -->
                                </div>
                                <!--Bottom content start here -->
                                <!--Bottom content end here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('assets/payment_invoice_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/payment_invoice_assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/payment_invoice_assets/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/payment_invoice_assets/js/custom.js') }}"></script>

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
