
 <!--bootstrap js-->
 <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

 <!--plugins-->
 <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
 <!--plugins-->
 <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
 <script>
   $(".data-attributes span").peity("donut")
 </script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="{{ asset('assets/js/dashboard1.js') }}"></script>
 <script>
      new PerfectScrollbar(".user-list")
 </script>

<!--plugins-->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>


<!--notification js -->
<script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/plugins/select2/js/select2-custom.js') }}"></script>

<script src="{{ asset('assets/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/validation/validation-script.js') }}"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script>
    $(document).ready(function() {

        @if (session('success'))
            round_success_noti('{{ session('success') }}');
        @endif


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                round_error_noti('{{ $error }}');
            @endforeach
        @endif
    });
</script>

<script>
    $('#imgInp').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result).css('display', 'block');
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
@yield('scripts')
