@extends('layouts.appadmin')

@section('content')

<div class="bg-cover-container">
    <img
        src="{{ asset('desktop/bg-register-desktop.jpg')}}"
        class="bg-cover"
        alt="Background"
    />

    <div class="headeradmin-overlay">
        <div class="row justify-content-between align-items-center">
            <img src="{{ asset('images/anniversary.png') }}" class="headeradmin-anniversary" />
            <img src="{{ asset('images/logo-white.png') }}" class="headeradmin-logo" />
        </div>
    </div>

    <div class="adminlogin-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="adminlogin-title">@lang('adminlogin.login')</p>
                    <form id="loginForm" class="adminLoginForm" method="post" action="{{ route('login-admin-post') }}">
                        @csrf
                        <div class="row rowLogin">
                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label white-label">@lang('adminlogin.form.username')</label>
                                <input type="text" class="form-control custom-input" name="username" id="username" placeholder="@lang('adminlogin.form.username')" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label white-label">@lang('adminlogin.form.password')</label>
                                <input type="password" class="form-control custom-input" name="password" id="password" placeholder="@lang('adminlogin.form.password')" required>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" id="submitLogin" class="button-adminlogin">@lang('adminlogin.login')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
      

@endsection
