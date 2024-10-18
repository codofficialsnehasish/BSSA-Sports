@extends('layouts.app')
@section('title', 'Admission')
@section('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spinnaker&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link type="text/css" rel="stylesheet" href="https://thesolartattoos.com/assets/css/style.css" />
    <link type="text/css" rel="stylesheet" href="https://thesolartattoos.com/assets/css/responsive.css" />
    <link type="text/css" rel="stylesheet" href="https://thesolartattoos.com/assets/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="https://thesolartattoos.com/assets/css/lightbox.css" />

    <!-- Toast message -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://thesolartattoos.com/assets/js/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://thesolartattoos.com/assets/css/jquery.signature.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            text-align: left;
            padding: 8px;
            /*border: 1px solid #cccccc;*/
        }

        .regis_tration form.needs-validation {
            background: #ffffff;
            padding: 4%;
            margin-top: 20px;
            float: left;
        }

        .regis_tration h2 {
            text-align: center;
            padding-bottom: 20px;
            font-size: 36px;
            font-family: 'Oswald', sans-serif;
            /*text-transform: uppercase;*/
            float: left;
            padding-top: 19px;
            padding-left: 16px;
        }

        .regis_tration span.phot_o {
            float: left;
        }

        .regis_tration span.phot_o img {
            width: 150px;
            height: 150px;
            border: 1px solid #3333333d;
            margin: 5px;
            padding: 10px;
        }

        .regis_tration canvas#signature-pad {
            background: #fff;
            width: 240px;
            height: 80px;
            cursor: crosshair;
            border: 1px solid #cccccc;
        }

        .regis_tration button#clear {
            background: #ff940b;
            border: 1px solid transparent;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .regis_tration {
            padding: 30px;
            background: #ff940b;
            box-shadow: 0px 0px 5px 0px #00000047;
            margin-bottom: 21px;
            display: inline-block;
        }

        .regis_tration img {
            float: left;
        }

        .regis_tration form h2 {
            /* padding-bottom: 0px !important; */
            margin-bottom: 0;
            background: #ff940b;
            padding: 10px !important;
            font-size: 18px !important;
            font-weight: bold;
            text-align: left;
            font-family: 'Raleway', sans-serif;
        }

        .regis_tration input {
            float: left;
            width: 100%;
            height: 40px;
            border: 1px solid #cccccc;
            background: transparent;
            border-radius: 0px !important;
            padding: 10px;
            font-size: 14px;
            box-shadow: none;
        }

        .regis_tration .form-check-input[type=checkbox] {
            width: auto;
            height: auto;
            border-radius: 100% !important;
            float: left;
            display: inline-block;
            margin-top: 0px !important;
            margin: 10px;
        }

        .regis_tration label {
            float: left;
            font-size: 14px;
            padding-bottom: 10px;
        }

        .regis_tration button.btn.btn-primary {
            background: #ff940b;
            border: none;
            padding: 10px 50px;
            font-size: 14px;
        }

        .regis_tration button.btn.btn-primary:hover {
            background: #cd770a;
        }

        .regis_tration input#formFile {
            border: none !important;
            box-shadow: none;
        }

        .regis_tration p {
            font-size: 14px;
        }

        .regis_tration td {
            font-size: 16px;
        }

        .regis_tration input#birthday {
            border: none;
            border-bottom: 1px solid #cccccc;
        }

        .regis_tration input[type=checkbox],
        input[type=radio] {
            width: auto;
            height: auto;
            border-radius: 100% !important;
            float: left;
            margin: 7px;
            margin-top: 0px;
        }


        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                /* border-bottom: 3px solid #ddd; */
                display: block;
                margin-bottom: .625em;
                float: left;
                width: 100%;
            }

            table td {
                border: none;
                display: block;
                font-size: 14px;
                text-align: left;
            }

            table td::before {
                /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }

            .regis_tration span.phot_o img {
                height: auto;
            }

            .kbw-signature {
                width: 100% !important;
            }

        }





        .kbw-signature {
            width: 100% !important;
            height: 143px;
        }

        #sig canvas {
            width: 100% !important;
            height: 140px;
        }




        input[type="date"]:before {
            content: attr(placeholder) !important;
            color: #aaa;
            margin-right: 0.5em;
        }

        input[type="date"]:focus:before,
        input[type="date"]:valid:before {
            content: "";
        }
    </style>

@endsection
@section('content')

    <div class="main-content">


        <div class="container">
            <div class="row">
                <div class="regis_tration">
                    <img src="logo.png" alt="THE SOLAR TATTOO">
                    <h2>Registration From</h2>
                    <form action="https://thesolartattoos.com/admission-form/process" class="needs-validation" novalidate
                        enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" name="csrf_modesy_token" value="7fdb9a74609e4636a16d9220f1e112db" />
                        <table>
                            <tr>
                                <td><input type="date" id="birthday" name="reg_date" value="2024-10-01" readonly></td>
                                <td>
                                    <span class="phot_o">
                                        <img src="https://thesolartattoos.com/assets/images/user-4.jpg" id="blah">
                                        <input class="form-control" type="file" name="file" id="formFile" required>
                                        <div class="invalid-feedback">This Field is Required</div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                <h2>Personal Information</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Frist Name</label>
                                    <input type="text" class="form-control" name="first_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Frist Name" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Last Name" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Gender</p>
                                </td>
                                <td><label for="exampleInputEmail1">Mael</label>
                                    <input class="form-check-input" name="gender" type="radio" value="Male"
                                        id="flexCheckDefault" required>
                                    <label for="exampleInputEmail1">Femail</label>
                                    <input class="form-check-input" name="gender" type="radio" value="Female"
                                        id="flexCheckDefault" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" placeholder="Date of Birth" required
                                        autocomplete="off">
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Place of Birth</label>
                                    <input type="text" class="form-control" name="place_of_birth"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Place of Dath"
                                        required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Father's Name"
                                        required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Mother's Name</label>
                                    <input type="text" name="mother_name" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mother's Name"
                                        required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Nationlity</label>
                                    <input type="text" name="nationality" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nationlity"
                                        required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Religion</label>
                                    <input type="text" name="religion" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Religion" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Resident Status</p>
                                </td>
                                <td><label for="exampleInputEmail1">Resident </label>
                                    <input class="form-check-input" name="resident_status" type="radio"
                                        value="Resident" id="flexCheckDefault" required>
                                    <label for="exampleInputEmail1">Non-Resident</label>
                                    <input class="form-check-input" name="resident_status" type="radio"
                                        value="Non-Resident" id="flexCheckDefault" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Marital Status</p>
                                </td>
                                <td><label for="exampleInputEmail1">Married </label>
                                    <input class="form-check-input" name="maritial_status" type="radio"
                                        value="Married" id="flexCheckDefault" required>
                                    <label for="exampleInputEmail1">Unmarried</label>
                                    <input class="form-check-input" name="maritial_status" type="radio"
                                        value="Unmarried" id="flexCheckDefault" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">National ID No</label>
                                    <input type="text" name="national_id_no" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="National ID No"
                                        required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Driving License No</label>
                                    <input type="text" name="driving_licence" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Driving License No">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Tin No </label>
                                    <input type="text" name="tin_no" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Tin No">
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Passport No</label>
                                    <input type="text" name="passport_no" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passport No">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                <h2>Contact Details</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--   <td colspan="2">-->
                            <!--      <table>-->
                            <!--         <tr>-->
                            <!--            <td>-->
                            <!--               <label for="exampleInputEmail1">Passport No</label>-->
                            <!--               <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passport No">-->
                            <!--            </td>-->
                            <!--         </tr>-->
                            <!--      </table>-->
                            <!--   </td>-->
                            <!--</tr>-->
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" name="city" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="City" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">State</label>
                                    <input type="text" name="state" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="State" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Postal Code</label>
                                    <input type="text" name="pincode" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Postal Code" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Country</label>
                                    <input type="text" name="country" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Country" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Phone" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                                <td>
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Email" required>
                                    <div class="invalid-feedback">This Field is Required</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex-row">



                                        <div class="wrapper">
                                            <div id="sig"></div>
                                            <textarea id="signature64" name="signature" style="display: none;" required></textarea>
                                            <div class="invalid-feedback">Signature is Required</div>
                                        </div>

                                        <div class="clear-btn">
                                            <button id="clear"><span> Clear </span></button> (Applicant Signature Here)
                                        </div>

                                        <!--<div class="col-12">-->
                                        <!--    <button class="btn btn-sm btn-warning" id="clear">&#x232B;Clear Signature</button>-->
                                        <!--</div>-->

                                        <!--<div class="wrapper">-->
                                        <!--   <canvas id="signature-pad" width="400" height="200"></canvas>-->
                                        <!--</div>-->
                                        <!--<div class="clear-btn">-->
                                        <!--   <button id="clear"><span> Clear </span></button>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<p>(Applicant Signature Here)</p>-->
                                </td>
                                <td><button type="submit" class="btn btn-primary">Submit</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')




@endsection
