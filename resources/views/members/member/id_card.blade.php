@extends('layouts.app')
@section('title', 'ID Card')

@section('css')
<style>
    .id-card-holder {
		width: 320px;
		padding: 4px;
		margin: 0 auto;
		/* background-color: #1f1f1f; */
		border-radius: 5px;
		position: relative;
		box-shadow: 0px 0px 5px 0px #00000047;
        margin: 5px;
        height: 414px;
	}

	.id-card {	
		background-color: #fff;
		padding: 10px;
		border-radius: 10px;
		text-align: center;
		/* box-shadow: 0 0 1.5px 0px #b9b9b9; */
	}
	.id-card img {
		margin: 0 auto;
	}
	.header img {
		width: 75px;
		margin-top: 15px;
	}
	.photo img {
		width: 120px;
		margin-top: 15px;
		height: 120px;
		border-radius: 100%;
		border: 2px solid #71cf2c;
		margin-bottom: 20px;
	}
	h2 {
		font-size: 14px;
		margin: 5px 0;
		color: black;
	}
	h3 {
		font-size: 12px;
		margin: 2.5px 0;
		font-weight: 300;
		color: black;
	}
	.qr-code img {
		width: 50px;
	}
	p {
		font-size: 5px;
		margin: 2px;
	}

	.id-card-tag{
		width: 0;
		height: 0;
		border-left: 100px solid transparent;
		border-right: 100px solid transparent;
		border-top: 100px solid #d9300f;
		margin: -10px auto -30px auto;
	}

	.id-card-tag:after {
		content: '';
		display: block;
		width: 0;
		height: 0;
		border-left: 50px solid transparent;
		border-right: 50px solid transparent;
		border-top: 100px solid white;
		margin: -10px auto -30px auto;
		position: relative;
		top: -130px;
		left: -50px;
	}

    .id-card h4 {
        font-size: 12px;
        color: black;
    }

    h3.id-back-address {
        padding: 69px 0;
    }
</style>
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
                        <li class="breadcrumb-item active" aria-current="page">Member ID Card</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ID Card</h6>
                </div>
                <div class="card-body">
                <a id="btn_print" type="button" value="print" class="btn btn-success mt-3 mb-3" onclick="">Print ID Card</a>
                    <div id="printableArea" class="table-responsive">
                        <div class="d-flex align-items-center justify-content-center text-center" id="PrintMe">
                            <div class="id-card-holder">
                                <div class="id-card">
                                    <div class="header">
                                        <P style="font-size: 10px;">BISHNUPUR SUB-DIVISIONAL SPORTS ASSOCIATION</P>
                                        <P style="font-size: 10px;">(BSSA)</P>
                                        <P style="font-size: 10px;">Affiliated to DSA (Bankura)</P>
                                        <P style="font-size: 10px;">Estd. - 1948</P>
                                        <p style="font-size: 10px;">P.O. : Bishnupur, Dist.-Bankura, Pin-722122</p>
                                        <p style="font-size: 10px;">Ph. No. : 9932481642</p>
                                    </div>
                                    <hr>
                                    <h2>IDENTITY CARD</h2>
                                    <div class="photo">
                                        <img src="{{ isset($member->profile_image_media) ? asset('storage/' . $member->profile_image_media->file_path) : '' }}">
                                    </div>
                                    <h2>{{ $member->full_name }}</h2>
                                    <h3>Address: {{ $member->address }}</h3>
                                    <!-- <div class="qr-code">
                                        
                                    </div> -->
                                    {{-- <h3>ID : {{ $student->roll_no }}</h3> --}}
                                    <h3>Ph. No. : {{ $member->mobile_number }}</h3>
                                    <h3>DOB : {{ format_date($member->dob) }}</h3>
                                    {{-- <hr>
                                    <p><strong>BSSA</strong><p>
                                    <p>Addess</p> --}}
                                </div>
                            </div>
                            {{-- <div class="id-card-holder">
                                <div class="id-card">
                                    <div class="header">
                                        <img src="logo">
                                    </div>
                                    <!-- <div class="qr-code">
                                        
                                    </div> -->
                                    <h3 class="id-back-address">rhgfuy</h3>
                                    <img src="https://codeofdolphins.com/backup/hospital/assets/images/cards/d89ec4041dc4180be6fdc3ba625b5994.png" alt="">
                                    <hr>
                                    <h4>Authorized Signature</h4>
                                </div>
                                
                            </div> --}}
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
