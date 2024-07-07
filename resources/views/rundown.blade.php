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

    <div class="rundown-overlay">
        <div class="container-fluid">
            <div class="row justify-content-center box-scroll-rundown">
                <div class="col-md-8">
                    <div align="center">
                        <p class="rundown-title">@lang('rundown.title')<br />@lang('rundown.title2')</p>
                        <p class="rundown-title-2">24 JULY 2024</p>
                        <p class="rundown-title-3">RAFFLES HOTEL JAKARTA, BALLROOM B-C</p>
                    </div>
                    <hr class="hr-rundown" />
                    <div class="row mainRundown">
                        <div class="row custom-row-rundown">
                            @foreach($rundowns as $rundown)
                            <div class="col-md-2 col-4">
                                <p class="paragraph-rundown">{{ substr($rundown->start_time, 0, 5) }} - {{ substr($rundown->end_time, 0, 5) }}</p>
                            </div>
                            <div class="col-md-10 col-8 border-left">
                                <p class="paragraph-rundown">{{ $rundown->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div align="center">
                        <a href="{{ url('/') }}"><button type="button" class="button-rundown">@lang('rundown.close')</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
      

@endsection
