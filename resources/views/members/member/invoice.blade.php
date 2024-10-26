@extends('layouts.app')
@section('title', 'Student Payment Invoice')

@section('css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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
					<li class="breadcrumb-item active" aria-current="page">Member Payment Invoice</li>
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
				<a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3" onclick="">Print</a>
                <div id="printableArea" class="table-responsive">
					<!--Invoice wrap start here -->
					<div class="invoice_wrap student">
						<div class="invoice-container">
							<div class="invoice-content-wrap" id="download_section">
								<!--Header start here -->
								<header class="student-header" id="invo_header">
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
												{{-- <div class="invo-book-detail detail-col-car1">
													<span class="font-sm-700 color-light-black">Name:</span>
													<span class="font-sm ">{{ $student->full_name }}</span>
												</div>
												<div class="invo-book-detail detail-col-car1">
													<span class="font-sm-700 color-light-black">Roll NO.:</span>
													<span class="font-sm">{{ $student->roll_no }}</span>
												</div>
												<div class="invo-book-detail detail-col-car1">
													<span class="font-sm-700 color-light-black">Balance Due:</span>
													<span class="font-sm">₹{{ $student->due_amount }}</span>
												</div> --}}
				
												<p><strong>Received with thanks from {{ $member_transaction->member->full_name }}</strong></p>
												<p><strong>Date - {{ format_date($member_transaction->created_at) }}</strong></p>
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
													<td class="font-sm">{{ $member_transaction->transaction_name }}</td>
				
													<td class="font-sm">₹{{ $member_transaction->amount }}</td>
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
															<td class="font-18-700 student-color pt-20">Grand Total:</td>
															<td class="font-18-500 color-light-black text-right pt-20">₹{{ $member_transaction->amount }}</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!--Invoice additional info end here -->
										<p style="text-align: left;color:black;">Rupees {{ numberToWords($member_transaction->amount) }} only</p>
									</div>
								</section>
								<!--Invoice content end here -->
							</div>
							<!--Bottom content start here -->
							{{-- <section class="agency-bottom-content d-print-none" id="agency_bottom">
								<!--Print-download content start here -->
								<div class="invo-buttons-wrap">
									<div class="invo-print-btn invo-btns">
										<a href="javascript:window.print()" class="print-btn">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<g clip-path="url(#clip0_10_61)">
													<path d="M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V11C21 10.4696 20.7893 9.96086 20.4142 9.58579C20.0391 9.21071 19.5304 9 19 9H5C4.46957 9 3.96086 9.21071 3.58579 9.58579C3.21071 9.96086 3 10.4696 3 11V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M17 9V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M7 15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V19C17 19.5304 16.7893 20.0391 16.4142 20.4142C16.0391 20.7893 15.5304 21 15 21H9C8.46957 21 7.96086 20.7893 7.58579 20.4142C7.21071 20.0391 7 19.5304 7 19V15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</g>
												<defs>
													<clipPath id="clip0_10_61">
														<rect width="24" height="24" fill="white"/>
													</clipPath>
												</defs>
											</svg>
											<span class="inter-700 medium-font">Print</span>
										</a>
									</div>
									<div class="invo-down-btn invo-btns">
										<a class="download-btn" id="generatePDF">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_5_246)">
												<path d="M4 17V19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21H18C18.5304 21 19.0391 20.7893 19.4142 20.4142C19.7893 20.0391 20 19.5304 20 19V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 11L12 16L17 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 4V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_5_246"><rect width="24" height="24" fill="white"/></clipPath></defs>
											</svg>
											<span class="inter-700 medium-font">Download</span>
										</a>
									</div>
								</div>
								<!--Print-download content end here -->
								<!--Note content start -->
								<div class="invo-note-wrap">
									<div class="note-title">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_8_240)"><path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 7H10" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 13H15" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 17H15" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_8_240"><rect width="24" height="24" fill="white"/>
										</clipPath></defs></svg>
										<span class="font-md color-light-black">Note:</span>
									</div>
									<h3 class="font-md-grey color-grey note-desc">This is computer generated receipt and does not require physical signature.</h3>
								</div>
								<!--Note content end -->
							</section>  --}}
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