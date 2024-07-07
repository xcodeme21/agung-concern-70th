@extends('layouts.appadmin')

@section('content')
    <div class="bg-cover-container">

        @include('layouts.navbar-admin')
        <img src="{{ asset('desktop/bg-register-desktop.jpg') }}" class="bg-cover" alt="Background" />

        <div class="headeradmin-overlay">
            <div class="row justify-content-between align-items-center">
                <img src="{{ asset('images/anniversary.png') }}" class="headeradmin-anniversary" />
                <img src="{{ asset('/images/event-text-image.png') }}" class="main-image-dashboard" />
                <img src="{{ asset('images/logo-white.png') }}" class="headeradmin-logo" />
            </div>
        </div>

        <div class="attendance-overlay  box-scroll">
            <div class="container container-attendances">
                <div class="row rowLabelReport" align="center">
                    <button class="btn btn-btnLabelReport">@lang('attendance.title')</button>
                </div>
                <div class="row rowAttendances">
                    <div class="col-md-6 col-6 total-register">
                        <div class="card">
                            <div class="card-body card-left">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <div>
                                        <p class="total-title">@lang('attendance.total_registrations')<br /><span>@lang('attendance.all_data')</span></p>
                                    </div>
                                    <div class="text-right person">
                                        <p>{{ @$totalRegister }} @lang('attendance.person')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 total-register">
                        <div class="card">
                            <div class="card-body card-right">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <div>
                                        <p class="total-title">@lang('attendance.total_claims')<br /><span>@lang('attendance.all_data')</span></p>
                                    </div>
                                    <div class="text-right person">
                                        <p>{{ @$totalClaim }} @lang('attendance.person')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="attendancesDatatables" class="table table-sm table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">No. HP</th>
                                <th scope="col" class="text-center">Antendance</th>
                                <th scope="col" class="text-center">Confirmation</th>
                                <th scope="col" class="text-center">Seating Arrangement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (@$antendances as $antendance)
                                <tr>
                                    <th scope="row">{{ @$antendance->queue }}</th>
                                    <td class="text-left">{{ @$antendance->firstname }} {{ @$antendance->lastname }}</td>
                                    <td>{{ @$antendance->email }}</td>
                                    <td class="text-center">{{ @$antendance->phonenumber }}</td>
                                    <td class="text-center">
                                        @if (@$antendance->attend)
                                            YES
                                        @else
                                            NO
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (@$antendance->confirmation)
                                            YES
                                        @else
                                            NO
                                        @endif
                                    </td>
                                    <td class="text-center">{{ @$antendance->seat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="box-attd-back" align="right">
            <a href="{{ url('/admin/dashboard') }}"><button class="button-back">@lang('adminlogin.back')</button></a>
        </div>


    </div>
@endsection
