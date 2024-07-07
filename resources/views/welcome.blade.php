@extends('layouts.app')

@section('content')
    <div class="scroll-container">
        <section id="home" class="section bg-home-desktop-container">
            <img src="{{ asset('desktop/bg-home.jpg') }}" class="bg-home-desktop" alt="Background" />
            {{-- <p class="dresscode d-none d-md-block">DRESSCODE: FORMAL (BLACK / PLATINUM)</p> --}}

            <div class="position-relative">
                <img src="{{ asset('mobile/bg-home.jpg') }}" class="bg-home-mobile" alt="Background" />
                {{-- <p class="dresscode d-block d-md-none">DRESSCODE: FORMAL (BLACK / PLATINUM)</p> --}}
            </div>
            <div class="home-overlay">
                <p class="home-text-1">PLATINUM ANNIVERSARY</p>
                <p class="home-text-2">SPARKING INNOVATION,<br />EMPOWERING THE FUTURE</p>
                <p class="home-text-3">24 JULY 2024</p>
                <p class="home-text-4 mb-4">RAFFLES HOTEL JAKARTA, BALLROOM B-C<br />(OPEN GATE 17.30)</p>
                <p class="home-text-5">DRESSCODE : FORMAL (BLACK / PLATINUM)</p>
            </div>
        </section>

        <section id="register" class="section bg-location-desktop-container">
            <img src="{{ asset('images/bg-location-desktop.jpg') }}" class="bg-location-desktop-image" alt="Background" />
            <img src="{{ asset('images/bg-location-mobile.jpg') }}" class="bg-location-mobile-image" alt="Background" />
            <div class="location-overlay">
                <div class="container" align="center">
                    <div class="row rowLocation">
                        <div class="col-md-6 col-xs-12">
                            <img src="{{ asset('images/anniversary.png') }}" class="anniversary" />
                            <h1 class="location_title">@lang('location.title')</h1>
                            <h3 class="location_sub_title">RAFFLES HOTEL JAKARTA<br />BALLROOM B-C</h3>
                            <p class="location_address">CIPUTRA WORLD, JL. PROF. DR. SATRIO NO. KAV. 3-5, RT.18/RW.5,
                                KUNINGAN, KARET KUNINGAN, KECAMATAN SETIABUDI, KOTA JAKARTA SELATAN, DAERAH KHUSUS IBUKOTA
                                JAKARTA 12940</p>
                        </div>
                        <div class="col-md-6 col-xs-12 d-flex flex-column justify-content-center">
                            <a
                                href="https://www.google.com/maps/place/Raffles+Jakarta/@-6.2242353,106.8234808,17z/data=!4m9!3m8!1s0x2e69f3fc66813af1:0x739094cdcbcb594d!5m2!4m1!1i2!8m2!3d-6.223926!4d106.8245108!16s%2Fg%2F11b6_rfyyb?entry=ttu">
                                <img src="{{ asset('images/location.png') }}" class="location" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
