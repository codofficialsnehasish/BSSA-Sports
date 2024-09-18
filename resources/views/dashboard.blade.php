@extends('layouts.admin_layout')

@section('title') Dashboard @endsection


@section('content')

    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Dashboard</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Home</a>
                <a href="#!" class="breadcrumb">Dashboard</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Earnings -->
        <!-- ============================================================== -->
        <div class="row">
            
            
            <div class="col l3 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="blue-text display-6"><i class="ti-bar-chart-alt"></i></span>
                        </div>
                        <div>
                            <h4>62,600</h4>
                            <h6 class="blue-text font-medium m-b-0">Top Sales</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="cyan-text display-6"><i class="ti-receipt"></i></span>
                        </div>
                        <div>
                            <h4>12,270</h4>
                            <h6 class="cyan-text font-medium m-b-0">Top Feeds</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="red-text display-6"><i class="ti-map-alt"></i></span>
                        </div>
                        <div class="">
                            <h4>21,090</h4>
                            <h6 class="red-text font-medium m-b-0">Top Locations</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="yellow-text text-darken-2 display-6"><i class="ti-check-box"></i></span>
                        </div>
                        <div>
                            <h4>20,120</h4>
                            <h6 class="yellow-text text-darken-2 font-medium m-b-0">Top Activity Pages</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Notifications, Chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="card-title">Monthly Overview</h5>
                                <h6 class="card-subtitle">Overview of latest Month</h6>
                            </div>
                            <div class="ml-auto">
                                    <div class="input-field dl support-select">
                                    <select>
                                        <option value="0" selected>10 Mar- 10 Apr</option>
                                        <option value="1">20 Mar- 10 Apr</option>
                                        <option value="2">10 Mar- 20 Apr</option>
                                        <option value="3">11 Mar- 10 Apr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Sales Summery -->
                        <div class="p-t-20">
                            <div class="row">
                                <!-- column -->
                                <div class="col s12">
                                    <div id="profit"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 l4">
                <div id="current-month" class="">
                    <div class="card e-campaign c3-border ">
                        <div class="p-15 warning-gradient">
                            <h5 class="card-title white-text">Revanue</h5>
                            <h6 class="card-subtitle white-text">Today</h6>
                            <div class="center-align">
                                <div style="height:219px; width:100%;" class="m-t-20 rate"></div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m6 center-align">
                                    <span>Goal</span>
                                    <h5 class="font-medium m-b-0">$4769.08</h5>
                                </div>
                                <div class="col s12 m6 center-align">
                                    <span>Current</span>
                                    <h5 class="font-medium m-b-0">$3280.98</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l8">
                <!-- ============================================================== -->
                <!-- Product Sales -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="p-15 p-b-0 info-gradient"> 
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title white-text">Product Earnings</h5>
                                        <h6 class="card-subtitle white-text m-b-0">Today</h6>
                                    </div>
                                    <div class="ml-auto">
                                        <h3 class="white-text m-b-0">$6,890.68</h3>
                                    </div>
                                </div>
                                <div id="day">
                                    <div class="product-earning" style="height:250px; width:100%;"></div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="m-r-10"><a class="btn-floating btn light-blue accent-2">EA</a></div>
                                            <div>
                                                <span class="">Product A</span>
                                                <h5 class="font-16 font-medium">$16,122.08</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m4">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="m-r-10"><a class="btn-floating btn light-blue accent-2">MP</a></div>
                                            <div>
                                                <span class="">Product B</span>
                                                <h5 class="font-16 font-medium">$26,122.08</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m4">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="m-r-10"><a class="btn-floating btn light-blue accent-2">AW</a></div>
                                            <div>
                                                <span class="">Product C</span>
                                                <h5 class="font-16 font-medium">$45,122.08</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    

@endsection