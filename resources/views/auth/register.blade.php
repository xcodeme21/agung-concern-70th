@extends('layouts.app')

@section('content')

<div class="bg-register-desktop-container">
    <img
        src="{{ asset('desktop/bg-register-desktop.jpg')}}"
        class="bg-register-desktop-image"
        alt="Background"
    />

    <div class="register-overlay">
        <div class="container">
            <div class="row justify-content-center box-scroll-register">
                <div class="col-md-8">
                    <p class="login-title">@lang('register.title')<br />@lang('register.title2')</p>
                    <form id="registrationForm" method="post" action="{{ route('registration') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label white-label">@lang('register.form.firstname')</label>
                                <input type="text" class="form-control custom-input" name="firstname" placeholder="@lang('register.form.firstname')" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label white-label">@lang('register.form.lastname')</label>
                                <input type="text" class="form-control custom-input" name="lastname" placeholder="@lang('register.form.lastname')" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label white-label">@lang('register.form.email')</label>
                                <input type="email" class="form-control custom-input" name="email" id="email" placeholder="@lang('register.form.email')" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label white-label">@lang('register.form.phonenumber')</label>
                                <input type="text" class="form-control custom-input" name="phonenumber" id="phonenumber" placeholder="08xx-xxxx-xxxx" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="companyName" class="white-label">@lang('register.form.companyname')</label>
                                <div class="input-group">
                                    <select class="custom-select custom-input select2" id="companyName" name="company_name" required>
                                        <option value="" disabled selected>@lang('register.form.optioncompany')</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent border-0"><i class="bi bi-chevron-down" style="color: white;"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label white-label" style="margin-bottom:30px;">@lang('register.form.foodpreferences')</label>
                                <div class="form-check">
                                    <input class="form-check-input custom-radio" type="radio" name="food_preferences" value="No Preference" id="flexRadioDefault1" checked>
                                    <label class="form-check-label white-label" for="flexRadioDefault1">
                                    No Preference
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input custom-radio" type="radio" name="food_preferences" value="Vegetarian" id="flexRadioDefault2">
                                    <label class="form-check-label white-label" for="flexRadioDefault2">
                                    Vegetarian
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword5" class="form-label white-label" style="margin-bottom:30px;">@lang('register.form.attend')</label>
                                <div class="form-check">
                                    <input class="form-check-input custom-radio" type="radio" name="attend" value="1" id="flexRadioDefault1" checked>
                                    <label class="form-check-label white-label" for="flexRadioDefault1">
                                        @lang('register.form.attendyes')
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input custom-radio" type="radio" name="attend" value="0" id="flexRadioDefault2">
                                    <label class="form-check-label white-label" for="flexRadioDefault2">
                                        @lang('register.form.attendno')
                                    </label>
                                </div>
                            </div>
                            <div align="right">
                                <button type="submit" id="submitRegistration" class="button-register">@lang('register.button_next')</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="success-register-overlay" style="display:none">
        <p class="success-register-title">@lang('register.success_title')</p>
        <div id="qrCodeContainer" style="width:100%;">
        </div>
        <p class="success-register-msg">@lang('register.success_guest')<span class="success-register-msg" id="queue"></span></p>
        <p class="success-register-email">@lang('register.success_notif')</p>
    </div>
</div>
      

@endsection
