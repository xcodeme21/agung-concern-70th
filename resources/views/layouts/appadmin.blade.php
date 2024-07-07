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


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/appdashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlogin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>

<body>
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
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script>


<script>
    $(document).ready(function() {
        // Check if dataUser exists in local storage
        // if(Request::url() !== url('/login/admin')) {
        //     if (localStorage.getItem('dataUser')) {
        //         window.location.href = "{{ url('/admin/dashboard') }}";
        //     }
        // }
        // if(Request::url() !== url('/admin/dashboard')) {
        //     if (!localStorage.getItem('dataUser')) {
        //         window.location.href = "{{ url('/login/admin') }}";
        //     }
        // }

        $('#loginForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var $submitButton = $('#submitLogin');

            $submitButton.prop('disabled', true);
            $submitButton.html('<i class="fa fa-spinner fa-spin"></i>');

            $.ajax({
                url: '{{ route('login-admin-post') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response); // For debugging

                    // Only save data and redirect if the response status is 200
                    if (response.status === 200) {
                        localStorage.setItem('dataUser', JSON.stringify(response.data));
                        window.location.href = "{{ url('/admin/dashboard') }}";
                    } else {
                        var errorMessage = response.error_message || 'Unknown error';
                        alert('Login gagal: ' + errorMessage);
                        $submitButton.prop('disabled', false);
                        $submitButton.html('@lang('register.button_next')');
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.error_message : 'Unknown error';
                    $submitButton.prop('disabled', false);
                    $submitButton.html('@lang('register.button_next')');
                    alert('Login gagal: ' + errorMessage);
                }
            });
        });

        $('#submitLogin').click(function() {
            $('#loginForm').submit();
        });
         
        $(document).ready(function() {
            $('#attendancesDatatables').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 5,
                language: {
                    search: "Cari:",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        });

    });

</script>


@if (Request::url() === url('/admin/login'))
    <script>
        if (localStorage.getItem('dataUser')) {
            window.location.href = '/admin/dashboard';
        }
    </script>
@endif


@if (Request::url() === url('/admin/dashboard') || Request::url() === url('/admin/attendances'))
    <script>
        if (!localStorage.getItem('dataUser')) {
            window.location.href = '/admin/login';
        }
    </script>
@endif

@if (Request::url() === url('/admin/attendances'))
    <script>
        var dataUser = JSON.parse(localStorage.getItem('dataUser'));
        if (dataUser && dataUser.username !== 'superadmin') {
            window.location.href = '/admin/dashboard';
        }
    </script>
@endif

<script>
    $(document).ready(function() {
        $('a.nav-link[href="#logoutAdmin"]').click(function(e) {
            e.preventDefault();

            localStorage.removeItem('dataUser');

            window.location.href = "{{ url('/admin/login') }}";
        });
        $('a[href="#logoutFromMenu"]').click(function(e) {
            e.preventDefault();

            localStorage.removeItem('dataUser');

            window.location.href = "{{ url('/admin/login') }}";
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dataUser = JSON.parse(localStorage.getItem('dataUser'));
        if (dataUser && dataUser.username !== 'superadmin') {
            var attendancesLink = document.getElementById('attendancesLink');
            if (attendancesLink) {
                attendancesLink.style.display = 'none';
            }
        }
    });
</script>


@if (Request::url() === url('/admin/qr'))
<!-- <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        console.log('QR code content:', qrCodeMessage);
        window.location.href = 'qr/' + qrCodeMessage;
    }

    function onScanError(errorMessage) {
        console.error('QR code scan error:', errorMessage);
    }

    function startQrCodeScanner() {
        let html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start(
            { facingMode: "environment" },
            {
                fps: 10,    
                qrbox: { width: 250, height: 250 }  
            },
            onScanSuccess,
            onScanError
        ).catch(err => {
            console.error('Error starting QR code scanner:', err);
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            console.log('mediaDevices and getUserMedia are supported');
            navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                console.log('Camera access granted');
                stream.getTracks().forEach(track => track.stop());
                startQrCodeScanner();
            })
            .catch(function(err) {
                console.error('Camera permission error:', err);
                alert('Camera permission is required to scan the QR code. Please allow camera access.');
            });
        } else {
            console.error('getUserMedia is not supported in this browser.');
            alert('getUserMedia is not supported in this browser. Please use a modern browser.');
        }
    });
</script> -->


<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
        console.log('QR code content:', content);
        window.location.href = 'qr/' + content;
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            let rearCamera = cameras.find(camera => camera.name.toLowerCase().includes('back')) || cameras[0];
            console.log('Using camera:', rearCamera.name);
            scanner.start(rearCamera);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error('Error getting cameras:', e);
        if (e.name === 'NotAllowedError') {
            alert('Permission to access camera denied. Please allow camera access and try again.');
        } else if (e.name === 'NotFoundError') {
            alert('No camera found on this device.');
        } else {
            alert('Error accessing camera: ' + e.message);
        }
    });
</script>

@endif


</html>
