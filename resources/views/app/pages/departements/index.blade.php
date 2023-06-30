<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>@yield('title') - kitajuara</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('app.includes.style')
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    @include('app.includes.header')

    <!-- App Capsule -->
    <div id="appCapsule">

        @include('app.includes.toastr')
        @include('app.includes.dialogs')
        @yield('content')

    </div>
    <!-- * App Capsule -->

    @include('app.includes.panels')


    @if (Request::is('home'))
        @include('app.includes.navigation')
    @endif

    @include('app.includes.sidebar')

    @include('app.includes.script')

    <script>
        $('#avatar').on('click', function() {
            $('#dialogProfilePhoto').modal('show');
        });

        $('#buttonViewProfilePicture').on('click', function() {
            $('#dialogProfilePhoto').modal('hide');
            $('#dialogViewProfilePicture').modal('show');
        });
    </script>

    <script>
        $('#buttonUploadProfilePicture').on('click', function() {
            $('#inputProfilePicture').click();
        });

        $('#inputProfilePicture').on('change', function() {
            $('#formChangeProfilePicture').submit();
            $('#loader').show();
        });

        $('#formChangeProfilePicture').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('app-change-profile-picture') }}",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    $('#loader').fadeOut('slow');
                    $('#dialogProfilePhoto').modal('hide');
                    $('#dialogChangeProfilePictureSuccess').modal('show');
                    setTimeout(() => {
                        $('#dialogChangeProfilePictureSuccess').modal('hide');
                    }, 3000);
                    setTimeout(() => {
                        location.reload();
                    }, 3250);
                }
            });
        });
    </script>

    <script>
        function thisFileUpload() {
            document.getElementById("inputCamera").click();
        };

        $('#inputCamera').on('change', function() {
            $('#formAttendance').submit();
            $('#loader').show();
        });

        $(document).on('submit', '#formAttendance', function(e) {
            e.preventDefault();
            $('#modalAbsen').modal('hide');
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('app-user-attendance') }}",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    $('#loader').fadeOut('slow');
                    $('#dialogAbsenSuksesText').text(response.message + ' ' + response.branch);
                    $('#dialogAbsenSukses').modal('show');
                    // console.log(response);
                    setTimeout(() => {
                        $('#dialogAbsenSukses').modal('hide');
                    }, 3000);
                    setTimeout(() => {
                        location.reload();
                    }, 3250);
                },
                error: function(response) {
                    $('#dialogAbsenGagal').modal('show');
                    setTimeout(() => {
                        $('#dialogAbsenGagal').modal('hide');
                    }, 2000);
                }
            });
        });

        $(document).ready(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // console.log(position);
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var inputLatitude = $('#inputLatitude').val(latitude);
                    var inputLongitude = $('#inputLongitude').val(longitude);
                });
            };


            $('#buttonAttendance').on('click', function() {
                navigator.permissions.query({
                    name: 'geolocation'
                }).then(function(result) {
                    if (result.state == 'granted') {
                        $('#modalAbsen').modal('show');
                    } else {
                        $('#dialogAbsenDenied').modal('show');
                        setInterval(() => {
                            $('#dialogAbsenDenied').modal('hide');
                        }, 3000);
                    }
                });
            });
        });
    </script>
</body>

</html>
