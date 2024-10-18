
<!DOCTYPE html>
<html lang="en"><head>
     <!-- Required meta tags -->
      <title>BSSA</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!-- ====================== Css file ================== -->
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
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" ></script>
      <style>
         table {
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
         }
         td, th {
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
        .regis_tration input[type=checkbox], input[type=radio] {
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
         height: auto;}
         
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
      
      <script> 
        function printDiv() { 
            var divContents = document.getElementById("GFG").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body > <h1>Div contents are <br>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
        
        

        
        
    </script> 

<!-- Toast message -->
  <style>

   .loader {
    border: 2px dotted #000000;
    border-radius: 50%;
    border-top: 2px dotted #ffffff;
    width: 20px;
    height: 20px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    position: absolute;
    left: 68px;
    bottom: 56px;
    display:none;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}



.loader2 {
    border: 2px dotted #ff940b;
    border-radius: 50%;
    border-top: 2px dotted #ffffff;
    width: 26px;
    height: 25px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    position: absolute;
    left: 68px;
    bottom: 12px;
    display:none;
}</style></head>

<body class="landing">

       <!--<input type="button" value="click" onclick="printDiv()"> -->
      <div class="container" >
         <div class="row">
            <div class="regis_tration">
                <img src="logo.png" alt="THE BSSA">
               <h2>Admission From</h2>
                 <form action="https://thesolartattoos.com/admission-form/process" class="needs-validation" novalidate enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <input type="hidden" name="csrf_modesy_token" value="7fdb9a74609e4636a16d9220f1e112db" />                                                                                        
                  <table>
                     <tr>
                        <td><input type="text" id="birthday" name="application_id" value="{{$data->application_id}}" readonly></td>
                        <td> 
                            <span class="phot_o">
                               <img src="{{ isset($data->profile_image_media) ? asset('storage/' . $data->profile_image_media->file_path) : '' }}" id="blah">
            
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
                           <input type="text" class="form-control" value="{{$data->full_name}}" name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Frist Name" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Guardian’s Name</label>
                           <input type="text" class="form-control" value="{{$data->guardian_name}}" name="last_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <p>Gender</p>
                        </td>
                        <td><label for="exampleInputEmail1">Male</label>
                           <input class="form-check-input" name="gender" {{ $data->sex == 'Male' ? 'checked' : '' }} type="radio" value="Male" id="flexCheckDefault1" required>
                           <label for="exampleInputEmail1">Female</label>
                           <input class="form-check-input" name="gender"  {{ $data->sex == 'Female' ? 'checked' : '' }} type="radio" value="Female" id="flexCheckDefault2" required>
                           <label for="exampleInputEmail1">Others</label>
                           <input class="form-check-input" name="gender" {{ $data->sex == 'Others' ? 'checked' : '' }} type="radio" value="Female" id="flexCheckDefault3" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Date of Birth</label>
                           <input type="date" id="dob" value="{{$data->dob}}" name="dob" placeholder="Date of Birth" required autocomplete="off">
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                        <td>
                           <label for="exampleInputEmail1">Age</label>
                           <input type="text" class="form-control" value="{{$data->age}} " name="place_of_birth" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Place of Dath" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Mobile Number</label>
                           <input type="text" name="mobile_number" value="{{$data->mobile_number}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Father's Name" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Whatsapp Number</label>
                           <input type="text" name="whatsapp_number" value="{{$data->whatsapp_number}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mother's Name" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Email</label>
                           <input type="text" name="nationality" value="{{ $data->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nationlity" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Aadhaar Card No</label>
                           <input type="text" name="religion" value="{{ $data->aadhar_card_no }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Religion" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                     
                     <tr>
                        <td> 
                            <label for="exampleInputEmail1">Class</label>
                            <input type="text" name="religion" value="{{ $data->class->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Religion" required>
                             <div class="invalid-feedback">This Field is Required</div>
                         </td>
                        <td>
                           <label for="exampleInputEmail1">School Portal Id</label>
                           <input type="text" name="national_id_no" value="{{$data->school_portal_id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="National ID No" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                       
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Sports Category</label>
                           <input type="text" name="tin_no" value="{{$data->category->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tin No">
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Special Interest</label>
                           <input type="text" name="passport_no" value="{{$data->special_interest->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passport No">
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Height(cm)</label>
                           <input type="text" name="tin_no" value="{{$data->height}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tin No">
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Weight (kg)</label>
                           <input type="text" name="passport_no" value="{{$data->weight}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passport No">
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Uniform Size(Upper)</label>
                           <input type="text" name="tin_no" value="{{$data->uniform_size}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tin No">
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
               
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">District</label>
                           <input type="text" name="city" value="{{$data->district->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Subdivisions</label>
                           <input type="text" name="state"value="{{$data->subdivision->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="State" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label for="exampleInputEmail1">Residential Address</label>
                           <input type="text" name="pincode" value="{{$data->residential_address}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Postal Code" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                        <td> 
                           <label for="exampleInputEmail1">Permanent Address</label>
                           <input type="text" name="country" value="{{$data->permanent_address}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country" required>
                            <div class="invalid-feedback">This Field is Required</div>
                        </td>
                     </tr>
                 
                     <tr>
                        <td colspan="2">
                           <table>
                              <tr>
                                 <td>
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
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
                        <td></td>
                     </tr>
                  </table>
                 </form>            </div>
         </div>
      </div>
      <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
        
        formFile.onchange = evt => {
           const [file] = formFile.files
           if (file) {
           blah.src = URL.createObjectURL(file);
           }
        }
        
        canvas.addEventListener( 'touchstart', onTouchStart, true);
       
        //  var canvas = document.getElementById("signature-pad");
         
        //       function resizeCanvas() {
        //           var ratio = Math.max(window.devicePixelRatio || 1, 1);
        //           canvas.width = canvas.offsetWidth * ratio;
        //           canvas.height = canvas.offsetHeight * ratio;
        //           canvas.getContext("2d").scale(ratio, ratio);
        //       }
        //       window.onresize = resizeCanvas;
        //       resizeCanvas();
         
        //       var signaturePad = new SignaturePad(canvas, {
        //         backgroundColor: 'rgb(250,250,250)'
        //       });
         
        //       document.getElementById("clear").addEventListener('click', function(){
        //         signaturePad.clear();
        //       })
        
        
        
        var windowWidth = $(window).width();
$(window).resize(function(){
if ($(window).width() != windowWidth) {
window.onresize = resizeCanvas;
resizeCanvas();
}
});
window.orientation = resizeCanvas;
resizeCanvas();
        
        
        
        (function () {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{
          // $(".animate-container").addClass("animation-added");
            setInterval(function() { 
          //  $('#stepForm1').submit();
        }, 4000);  
        }
        
        form.classList.add('was-validated')
        
      }, false)
    })

})()

      </script>
   </body>
</html>     
  

   

   
    <!-- FOOTER -->
  
   <script src="https://thesolartattoos.com/assets/js/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://thesolartattoos.com/assets/js/bootstrap.min.js"></script>
    <script src="https://thesolartattoos.com/assets/js/lightbox.js"></script>
    <script src="https://thesolartattoos.com/assets/js/owl.carousel.js"></script>

   <!-- toast message -->
<script src="https://thesolartattoos.com/assets/admin/libs/toast/toastr.js"></script>
<script src="https://thesolartattoos.com/assets/admin/js/pages/toastr.init.js"></script>
<!-- toast message -->

    <script type="text/javascript">

        $(document).ready(function(){
            $( function() {
                $( "#datepicker" ).datepicker();
                $( "#dobdatepicker" ).datepicker();
            } );
            if ($(window).width() <= 1024) {
                $("#owl-demo1").owlCarousel({
                    autoPlay: false,
                    items : 4,
                    rows: 2,
                // Responsive
                    responsive: true,
                    items : 1,
                    rows: 1,
                    itemsDesktop : [1199,4],
                    itemsDesktopSmall : [980,3],
                    itemsTablet: [768,2],
                    itemsMobile : [479,1],
                    navigation:false,
                    pagination:true,
                    navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                });
                $("#owl-demo2").owlCarousel({
                    autoPlay: false,
                    items : 4,
                    rows: 1,
                // Responsive
                    responsive: true,
                    items : 1,
                    rows: 1,
                    itemsDesktop : [1199,4],
                    itemsDesktopSmall : [980,3],
                    itemsTablet: [768,2],
                    itemsMobile : [479,1],
                    navigation:false,
                    pagination:true,
                    navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                });
            }   
            $("#owl-demo").owlCarousel({
                autoPlay: true,
                items : 1,
            // Responsive
                responsive: true,
                items : 1,
                itemsDesktop : [1199,1],
                itemsDesktopSmall : [980,1],
                itemsTablet: [768,1],
                itemsMobile : [479,1],
                navigation:false,
                pagination:true,
                navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
            });
            $("#slider").owlCarousel({
                autoPlay: true,
                items : 1,
            // Responsive
                responsive: true,
                items : 1,
                itemsDesktop : [1199,1],
                itemsDesktopSmall : [980,1],
                itemsTablet: [768,1],
                itemsMobile : [479,1],
                navigation:false,
                pagination:true,
                navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
            });
            
             $("#owl-demo11").owlCarousel({
                    autoPlay: false,
                    items : 4,
                    rows: 2,
                // Responsive
                    responsive: true,
                    items : 3,
                    rows: 1,
                    itemsDesktop : [1199,4],
                    itemsDesktopSmall : [980,3],
                    itemsTablet: [768,2],
                    itemsMobile : [479,1],
                    navigation:false,
                    pagination:true,
                    navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                });
                
                 $("#owl-demo12").owlCarousel({
                    autoPlay: false,
                    items : 1,
                    rows: 2,
                // Responsive
                    responsive: true,
                    items : 1,
                    rows: 1,
                    itemsDesktop : [1199,1],
                    itemsDesktopSmall : [980,1],
                    itemsTablet: [768,1],
                    itemsMobile : [479,1],
                    navigation:false,
                    pagination:true,
                    navigationText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                });
                
                
                
                
                
            $('.imageGallery1 a').simpleLightbox();
            $('.menu_toggle').on('click',function () {
                $('#mySidenav').addClass('nav_show');   
            });
            $('.closebtn').on('click',function () {
                $('#mySidenav').removeClass('nav_show');   
            });
        $(window).scroll(function(){
                if ($(this).scrollTop() > 50) {
                $('.header_top').addClass('shrink');
                } else {
                $('.header_top').removeClass('shrink');
                }
            });
        });

    </script>
    
    <script>
   $(window).load(function(){  
           }); 
    </script>

<script>
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

///////redirect checkout
$(document).on("click", "#pills-login", function () {
    $(this).addClass('active');
    $('#pills-register').removeClass('active');
    $('#tab-login').addClass('show active');
    $('#tab-register').removeClass('show active');
    $('#tab-login').fadeIn();
    $('#tab-register').fadeOut();
});

$(document).on("click", "#pills-register", function () {
    $(this).addClass('active');
    $('#pills-login').removeClass('active');
    $('#tab-register').addClass('show active');
    $('#tab-login').removeClass('show active');
    $('#tab-register').fadeIn();
    $('#tab-login').fadeOut();

});

$(document).on("click", ".loginFormCheck", function () {
    $(this).addClass('active');
    opt =$("input[name='loginoption']:checked").val();
   // console.log(opt);
    if(opt=="mobile"){
        $('#emailLogin').hide();
        $('#mobileLogin').show();
    }else{
        $('#mobileLogin').hide();
        $('#emailLogin').show();
    }
});

$(document).on("click", ".registerFormCheck", function () {
    $(this).addClass('active');
    opt =$("input[name='registeroption']:checked").val();
   // console.log(opt);
    if(opt=="mobile"){
        $('#emailRegister').hide();
        $('#mobileRegister').show();
    }else{
        $('#mobileRegister').hide();
        $('#emailRegister').show();
    }
});


////////question
        $(document).on("click", "#questionBtn", function () {
            let hasChild = $('#has_child').val();
            let validateStatus = $('#validateStatus').val();
            if(hasChild>0){
                for(i=1;i<=hasChild;i++){
                    if(validateStatus==1){
                        questionFormSubmit();
                    }else{
                        if ($('input[name="opt_id'+ i +'"]:checked').length != 0) {
                            questionFormSubmit();
                    }else{
                        // $('#optBtn' + i).attr("style", "color:#dc3545 !important");
                        // $('.optIcon' + i).attr("style", "color:#dc3545 !important");
                        $('#quesContent' + $('#ques_id').val()).addClass('error');
                        $('.errMsg').removeClass('d-none');
                        $('.errMsg').addClass('d-block');
                       // alert('Sub Error');
                        return false;
                    }   

                    }
                }
            }else{
                if ($('input[name="opt_id"]:checked').length != 0) {
                        //submit form
                        questionFormSubmit();
                    }else{
                        $('#quesContent' + $('#ques_id').val()).addClass('error');
                        $('.errMsg').removeClass('d-none');
                        $('.errMsg').addClass('d-block');
                        return false;
                    }
            }
        });



    function questionFormSubmit(){
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        var form = $("#form_question_option");
        var serializedData = form.serializeArray();
        serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "question-post",
                type: "post",
                data: serializedData,
                success: function (response) {

                    // form[0].reset();
                    var obj = JSON.parse(response);
                    // console.log(obj.result);
                    if (obj.result == 1) {
                        if(obj.complete == 1){
                                                               // $('#login_type,#register_type').val('question');
                                    //$('#register_type').val('question');
                                   // $('#exampleModal').modal('show');
                                                                window.location.href="https://thesolartattoos.com/questions/result"
                                                      }else{
                        document.getElementById("form_question_option").innerHTML = obj.html_content;
                        let totalQuestion = parseInt($('#totalQuestions').val());
                        let progressBarWidth = 100/totalQuestion;
                        let progressBar = parseInt($('#progressBar').val()) + progressBarWidth;
                        console.log(progressBarWidth);
                      $('#progressBar').val(progressBar);
                      $('.progressBarWdth').attr('style','width:' + $('#progressBar').val() + '%');
                        }

                    }
                }
        });
    }

    function clearError(id){
       // console.log(id);
            // $('#optBtn' + id).attr("style", "");
            // $('.optIcon' + id).attr("style", "");
            $('#quesContent' + id).removeClass('error');
            $('.errMsg').removeClass('d-block');
            $('.errMsg').addClass('d-none');
            $('#validateStatus').val(1);
        }


        $(document).on("click", "#backBtn", function () {
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            let ques_no = $('#ques_no').val();
            let ques_id = $('#ques_id').val();
            let ans_id = $('#ans_id').val();
           postData = {
            'ques_no' : ques_no,
            'ques_id' : ques_id,
            'ans_id'  : ans_id,
            'csrf_modesy_token' : getCookie('csrf_modesy_token'),
            'progressBar' : $('#progressBar').val()
           }

            $.ajax({
                url: base_url + "question-back-post",
                type: "post",
                data: postData,
                success: function (response) {

                    // form[0].reset();
                    var obj = JSON.parse(response);
                    // console.log(obj.result);
                    if (obj.result == 1) {
                        document.getElementById("form_question_option").innerHTML = obj.html_content;
                        
                        let totalQuestion = parseInt($('#totalQuestions').val());
                        let progressBarWidth = 100/totalQuestion;
                        let progressBar = parseInt($('#progressBar').val()) - progressBarWidth;
                        console.log(progressBarWidth);
                        console.log($('#progressBar').val());
                        
                        $('#progressBar').val(progressBar);
                        $('.progressBarWdth').attr('style','width:' + $('#progressBar').val() + '%');

                    }
                }
        });
        });

///profile edit
 $(document).on("click", ".editBtn", function () {
        $('.editBtn').hide();
        $('.submitBtn').show();
        $('.form-control').removeAttr("disabled");
        $('.form-control').removeAttr("readonly");
        $('.email').attr('disabled',true);
        $('.mobile').attr('disabled',true);
});

$(document).on("click", "#shwLogin", function () {
        $('#exampleModal').modal('show');
        $('#register_type').val('question');
        $('#login_type').val('question');
});


function reSetValidate(){
    let status = $('#validateStatus').val();
    if(status == 1){
        $('#validateStatus').val(0);
    }else{
        $('#validateStatus').val(1);
    }
}
</script><script>
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/tattoo/" ;

    $(document).ready(function() {

        $(document).on("submit", "#contactForm", function (event) {
            $('.loader2').show();
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#contactForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "contact-us/process",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.loader2').hide();
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                           // showToast('error','Error',response.msg);
                       var numbersArray = response.msg.split('\n');
                        $.each(numbersArray, function(index, value) { 
                         // console.log(index + ': ' + value);
                          showToast('error','Error',value);
                        });

                    }
                }
        });
        event.preventDefault();
    });
       



    // offerBookingForm  
    $(document).on("submit", "#offerBookingForm", function (event) {
           $('#offerbookingloader').show();
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#offerBookingForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "ajax/offer-booking-process",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#offerbookingloader').hide();
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            $('#offerBookingForm').hide();
                            $('.payment').show();
                            showToast('success','Success',response.msg);                         
                    }else{
                        var numbersArray = response.msg.split('\n');
                        $.each(numbersArray, function(index, value) { 
                        //  console.log(index + ': ' + value);
                          showToast('error','Error',value);
                        });
                        
                           // showToast('error','Error',response.msg);
                    }
                }
        });
        event.preventDefault();
    });





    // bookForm  
    $(document).on("submit", "#bookForm", function (event) {
           $('#bookingloader').show();
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#bookForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "ajax/booking-process",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#bookingloader').hide();
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            $('#bookForm').hide();
                            $('.payment').show();
                            showToast('success','Success',response.msg);                         
                    }else{
                        var numbersArray = response.msg.split('\n');
                        $.each(numbersArray, function(index, value) { 
                        //  console.log(index + ': ' + value);
                          showToast('error','Error',value);
                        });
                        
                           // showToast('error','Error',response.msg);
                    }
                }
        });
        event.preventDefault();
    });

    // consultationForm
    $(document).on("submit", "#consultationForm", function (event) {
        $('#consultloader').show();
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#consultationForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "ajax/consultation-process",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#consultloader').hide();
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                           // showToast('error','Error',response.msg);
                        var numbersArray = response.msg.split('\n');
                        $.each(numbersArray, function(index, value) { 
                          //console.log(index + ': ' + value);
                          showToast('error','Error',value);
                        });

                    }
                }
        });
        event.preventDefault();
    });


//////event booking form
    // bookForm
    $(document).on("submit", "#eventForm", function (event) {
         $('#evbookingloader').show();
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/";
            var form = $("#eventForm");
          //  var serializedData = new FormData(this);
           // serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "ajax/event-booking-process",
                type: "post",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (response) {
                    $('#evbookingloader').hide();
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                            form[0].reset();  
                            $('#eventForm').hide();
                            $('.payment').show();
                            showToast('success','Success',response.msg);                         
                    }else{
                        var numbersArray = response.msg.split('\n');
                        $.each(numbersArray, function(index, value) { 
                        //  console.log(index + ': ' + value);
                          showToast('error','Error',value);
                        });
                        
                           // showToast('error','Error',response.msg);
                    }
                }
        });
        event.preventDefault();
    });
    });

///////////////////////////////////////////////////////





function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function isMobile(mobile){
    var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
    return re.test(mobile);
}


</script>

</body>
</html>