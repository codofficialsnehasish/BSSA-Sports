<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/assets/images/bssa.jpg') }}">
    <title>@yield('title') | BSSA</title>
    <link href="{{ asset('admin_assets/dist/css/style.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <link href="{{ asset('admin_assets/assets/libs/morris.js/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('admin_assets/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ asset('admin_assets/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin_assets/dist/css/pages/data-table.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('style')
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">BSSA</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        @include('include.top_bar')
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        
        @include('include.left_side_bar')
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
            @include('include.footer')
        </div>
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        @include('include.right_side_bar')
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin_assets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/materialize.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Apps -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin_assets/dist/js/app.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app.init.light-sidebar.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app-style-switcher.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Custom js -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin_assets/dist/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <!--c3 JavaScript -->
    <script src="{{ asset('admin_assets/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/pages/dashboards/dashboard5.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('admin_assets/assets/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('admin_assets/assets/extra-libs/Datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @yield('script')
</body>

</html>