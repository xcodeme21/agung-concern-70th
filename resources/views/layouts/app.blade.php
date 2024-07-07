<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="SPARKING INNOVATION,ENPOWERING THE FURUTE">
    <meta name=”robots” content="index, follow">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rundown.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlogin.css') }}" rel="stylesheet">
</head>

<body>
    @if (Request::url() !== url('/'))
        @include('layouts.navbar')
    @endif

    <div id="app">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/0b8cde56d5.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>


<script>
    $(document).ready(function() {
        $('#registrationForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var $submitButton = $('#submitRegistration');

            $submitButton.prop('disabled', true);
            $submitButton.html('<i class="fa fa-spinner fa-spin"></i>');

            $.ajax({
                url: '{{ route('registration') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#queue').text(response.data.queue);
                    $('.register-overlay').hide();
                    $('.success-register-overlay').show();

                    var qrCodeValue = response.data.queue;
                    var qrCodeSrc = '{{ url('qrcodes') }}/' + qrCodeValue + '.svg';
                    var qrCodeHtml = '<img src="' + qrCodeSrc + '" alt="QR Code">';
                    $('#qrCodeContainer').html(qrCodeHtml);

                    $submitButton.prop('disabled', false);
                    $submitButton.html('@lang('register.button_next')');
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON.error_message;
                    alert('Registrasi gagal: ' + errorMessage);

                    $submitButton.prop('disabled', false);
                    $submitButton.html('@lang('register.button_next')');
                }
            });
        });


        $('#loginForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var $submitButton = $('#submitLogin');

            $submitButton.prop('disabled', true);
            $submitButton.html('<i class="fa fa-spinner fa-spin"></i>');

            $.ajax({
                url: '{{ route('login.post') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#queue').text(response.data.queue);
                    $('.login-overlay').hide();
                    $('.success-login-overlay').show();

                    var qrCodeValue = response.data.queue;
                    var qrCodeSrc = '{{ url('qrcodes') }}/' + qrCodeValue + '.svg';
                    var qrCodeHtml = '<img src="' + qrCodeSrc + '" alt="QR Code">';
                    $('#qrCodeContainer').html(qrCodeHtml);

                    $submitButton.prop('disabled', false);
                    $submitButton.html('@lang('register.button_next')');
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON.error_message;
                    $submitButton.prop('disabled', false);
                    $submitButton.html('@lang('register.button_next')');
                    alert('Login gagal: ' + errorMessage);
                }
            });
        });

        $('#submitRegistration').click(function() {
            $('#registrationForm').submit();
        });

        $('#submitLogin').click(function() {
            $('#loginForm').submit();
        });
    });

    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
            // Toggle antara icon menu dan close
            $(this).find('i').toggleClass('fa-bars fa-times');
        });

        $('.navbar-collapse').on('hidden.bs.collapse', function() {
            $('.navbar-toggler i').removeClass('fa-times').addClass('fa-bars');
        });

        $('.navbar-collapse').on('shown.bs.collapse', function() {
            $('.navbar-toggler i').removeClass('fa-bars').addClass('fa-times');
        });
    });

    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            allowClear: true
        });

        // Apply styles after Select2 initialization
        $('.select2-selection__rendered').css({
            'color': 'white',
            'line-height': '4em',
            'display': 'flex',
            'align-items': 'center'
        });
    });

    $(document).ready(function() {
        var $sections = $('section');
        var currentIndex = 0;
        var animating = false;

        function scrollToSection(index) {
            if (index >= 0 && index < $sections.length && !animating) {
                animating = true;
                $('html, body').animate({
                    scrollTop: $sections.eq(index).offset().top
                }, 0, function() { // Durasi 0 untuk smooth tanpa delay
                    animating = false;
                });
            }
        }

        $(window).on('wheel', function(e) {
            if (animating) return; // prevent multiple scroll events
            if (e.originalEvent.deltaY > 0) {
                // Scroll down
                currentIndex = Math.min(currentIndex + 1, $sections.length - 1);
            } else {
                // Scroll up
                currentIndex = Math.max(currentIndex - 1, 0);
            }
            scrollToSection(currentIndex);
        });
    });
</script>

</html>
