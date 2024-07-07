@extends('layouts.appadmin')

@section('content')

<div class="bg-cover-container">

@include('layouts.navbar-admin')
    <img
        src="{{ asset('desktop/bg-register-desktop.jpg')}}"
        class="bg-cover"
        alt="Background"
    />

    <div class="headeradmin-overlay">
        <div class="row justify-content-between align-items-center">
            <img src="{{ asset('images/anniversary.png') }}" class="headeradmin-anniversary" />
            <img src="{{ asset('/images/event-text-image.png') }}" class="main-image-dashboard" />
            <img src="{{ asset('images/logo-white.png') }}" class="headeradmin-logo" />
        </div>
    </div>

    <div class="dashboard-overlay">
        <div class="container">
            <div id="attendancesLink" class="row container-center" align="center">
                <a href="{{ url('/admin/attendances') }}" class="btn btn-menu-dashboard">@lang('menuadmin.list')</a>
            </div>
            <div class="row container-center" align="center">
                <a href="{{ url('/admin/qr') }}" class="btn btn-menu-dashboard">@lang('menuadmin.scan')</a>
            </div>
        </div>
        <div class="row" align="right">
            <a href="#logoutFromMenu"><button class="button-back">@lang('adminlogin.logout')</button></a>
        </div>
    </div>


</div>
      

@endsection
