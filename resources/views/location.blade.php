@extends('layouts.app')

@section('content')

<div class="bg-register-desktop-container">
    <img
        src="{{ asset('images/bg-location-desktop.jpg')}}"
        class="bg-location-desktop-image"
        alt="Background"
    />
    <img
        src="{{ asset('images/bg-location-mobile.jpg')}}"
        class="bg-location-mobile-image"
        alt="Background"
    />

    <div class="location-overlay">
        <div class="container" align="center">
            <div class="row rowLocation">
                <div class="col-md-6 col-xs-12">
                    <img src="{{ asset('images/anniversary.png') }}" class="anniversary" />
                    <h1 class="location_title">@lang('location.title')</h1>
                    <h3 class="location_sub_title">RAFFLES HOTEL JAKARTA BALLROOM B-C</h3>
                    <p class="location_address">CIPUTRA WORLD, JL. PROF. DR. SATRIO NO. KAV. 3-5, RT.18/RW.5, KUNINGAN, KARET KUNINGAN, KECAMATAN SETIABUDI, KOTA JAKARTA SELATAN, DAERAH KHUSUS IBUKOTA JAKARTA 12940</p>
                </div>
                <div class="col-md-6 col-xs-12 d-flex flex-column justify-content-center">
                    <a href="https://www.google.com/maps/place/Raffles+Jakarta/@-6.2242353,106.8234808,17z/data=!4m9!3m8!1s0x2e69f3fc66813af1:0x739094cdcbcb594d!5m2!4m1!1i2!8m2!3d-6.223926!4d106.8245108!16s%2Fg%2F11b6_rfyyb?entry=ttu">
                        <img src="{{ asset('images/location.png') }}" class="location" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
      

@endsection
