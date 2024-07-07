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

    <div class="camera-overlay">
        <div class="row rowLabelReport" align="center">
            <button class="btn btn-btnScan">@lang('menuadmin.scan')</button>
        </div>
        <div class="camera-container">
            <div class="camera">
                <video id="preview" class="preview"></video>
            </div>
        </div>
        <div class="row" align="right">
            <a href="{{ url('/admin/dashboard') }}"><button class="button-back">@lang('adminlogin.back')</button></a>
        </div>
    </div>


</div>
      

@endsection
