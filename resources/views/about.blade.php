@extends('layouts.app')

@section('content')

<div class="bg-register-desktop-container">
    <img
        src="{{ asset('desktop/bg-rundown.jpg')}}"
        class="bg-rundown-desktop"
        alt="Background"
    />
    <img
        src="{{ asset('mobile/bg-rundown.jpg')}}"
        class="bg-rundown-mobile"
        alt="Background"
    />

    <div class="register-overlay" align="center">
        <img src="{{ asset('images/event-text-image.png') }}" class="about-image" />
        <p class="text-about">Entering the age 70 for Agung Concern is very long business journey.<br />As a form of gratitude for the achievements that have ben achieved, at this moment Agung Concern wants the commemorate its 70th anniversary and hopes strengthen relationships with business partners.
    </p>
    </div>
</div>
      

@endsection
