@extends('layouts.app')

@section('content')

<div class="bg-register-desktop-container">
    <img
        src="{{ asset('desktop/bg-register-desktop.jpg')}}"
        class="bg-register-desktop-image"
        alt="Background"
    />

    <div class="login-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="login-title">@lang('login.title')<br />@lang('login.title2')</p>
                    <form id="loginForm" method="post" action="{{ route('login.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <label for="inputPassword5" class="form-label white-label">@lang('login.form.phonenumber')</label>
                                <input type="text" class="form-control custom-input" name="phonenumber" id="phonenumber" placeholder="08xx-xxxx-xxxx" required>
                            </div>
                            <div>
                                <button type="submit" id="submitLogin" class="button-login">@lang('login.button_check')</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="success-login-overlay" style="display:none">
        <p class="success-register-title">@lang('register.success_title')</p>
        <div id="qrCodeContainer" style="width:100%;">
        </div>
        <p class="success-register-msg">@lang('register.success_guest')<span class="success-register-msg" id="queue"></span></p>
        <p class="success-register-email">@lang('register.success_notif')</p>
    </div>


</div>
      

@endsection
