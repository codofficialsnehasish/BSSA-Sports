@extends('layouts.auth_layout')


@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('admin_assets/assets/images/big/auth-background.jpg') }}) no-repeat left center;">
    <div class="container">
        
        <div class="auth-box auth-sidebar">
            <div id="loginform">
                <div class="p-l-10">
                    <h5 class="font-medium m-b-0 m-t-40">Sign In to Admin</h5>
                    <small>Just login to your account</small>
                </div>
                <!-- Form -->
                <div class="row">
                    <form class="col s12" action="{{ route('login.process') }}" method="post">
                        @csrf
                        <!-- email -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-5">
                            <div class="col s7">
                                <label>
                                    <input type="checkbox" />
                                    <span>Remember Me?</span>
                                </label>
                            </div>
                            <div class="col s5 right-align"><a href="javascript:void(0);" class="link" id="to-recover">Forgot Pwd?</a></div>
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-40">
                            <div class="col s12">
                                <button class="btn-large w100 blue accent-4" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="recoverform">
                <div class="p-l-10">
                    <h5 class="font-medium m-b-0 m-t-40">Recover password</h5>
                    <small>Enter your Email and instructions will be sent to you!</small>
                </div>
                <div class="row">
                    <!-- Form -->
                    <form class="col s12" action="">
                        <!-- email -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email1" type="email" class="validate" required>
                                <label for="email1">Email</label>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-20">
                            <div class="col s12">
                                <button class="btn-large w100 red" type="submit" name="action">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection