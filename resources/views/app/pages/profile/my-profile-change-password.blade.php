@extends('app.layouts.master')

@section('title')
    My Profile
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App / My Profile / Privasi
            </div>
            <h2 class="page-title">
                Kata Sandi
            </h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="row g-0">
            <div class="col-3 d-none d-md-block border-end">
                <div class="card-body">
                    <h4 class="subheader">Umum</h4>
                    <div class="list-group list-group-transparent">
                        <a href="{{ route('app-my-profile') }}" class="list-group-item list-group-item-action d-flex align-items-center">Biodata</a>
                    </div>
                    <h4 class="subheader mt-4">Privasi</h4>
                    <div class="list-group list-group-transparent">
                        <a href="{{ route('app-my-profile-change-password', Auth::user()->slug) }}" class="list-group-item list-group-item-action active">Kata Sandi</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible" role="alert" style="display: none;" id="alertSuccess">
                        <div class="d-flex">
                            <div>
                                <strong>Sukses!</strong> <span id="alertSuccessText"></span>
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;" id="alertError">
                        <div class="d-flex">
                            <div>
                                <strong>Gagal!</strong> <span id="alertErrorText"></span>
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    <h2 class="mb-4">Kata Sandi</h2>
                    <h3 class="card-title mb-3">Setel Ulang</h3>
                    <div class="row g-3 mb-3">
                        <div class="col-lg">
                            <a class="btn" id="buttonResetPassword" data-slug="{{ Auth::user()->slug }}">
                                Kembalikan ke awal
                            </a>
                        </div>
                    </div>
                    <div class="border mb-3"></div>
                    <h3 class="card-title mb-3">Ubah Kata Sandi</h3>
                    <div class="row g-3 mb-3">
                        <div class="col-lg">
                            <div class="form-label">Kata Sandi Baru</div>
                            <input type="password" class="form-control" value="" id="inputNewPassword">
                        </div>
                        <div class="col-lg">
                            <div class="form-label">Konfirmasi Kata Sandi Baru</div>
                            <input type="password" class="form-control" value="" id="inputConfirmNewPassword">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg">
                            <div class="col-lg">
                                <a class="btn" id="buttonChangePassword" data-slug="{{ Auth::user()->slug }}">
                                    Ubah kata sandi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cscript')
    <script>
        $('#buttonResetPassword').on('click', function() {
            var slug = $(this).data('slug');

            $.ajax({
                type: "POST",
                url: "{{ route('app-post-reset-password') }}",
                data: {
                    slug: slug
                },
                dataType: "JSON",
                success: function(response) {
                    $('#alertSuccessText').html('Kata sandi berhasil di setel ulang!');
                    $('#alertSuccess').fadeIn('slow').delay(2000).fadeOut('slow');
                }
            });
        });

        $(document).on('click', '#buttonChangePassword', function() {
            var slug = $(this).data('slug');
            var newPassword = $('#inputNewPassword').val();
            var confirmNewPassword = $('#inputConfirmNewPassword').val();

            if (confirmNewPassword !== newPassword) {
                $('#inputNewPassword').focus(function() {
                    $(this).val('');
                });
                $('#inputConfirmNewPassword').focus(function() {
                    $(this).val('');
                });
                $('#alertErrorText').html('Kata sandi tidak sama!');
                $('#alertError').fadeIn('slow').delay(2000).fadeOut('slow');
            } else if (newPassword == '' || confirmNewPassword == '') {
                $('#inputNewPassword').focus(function() {
                    $(this).val('');
                });
                $('#inputConfirmNewPassword').focus(function() {
                    $(this).val('');
                });
                $('#alertErrorText').html('Kata sandi tidak boleh kosong!');
                $('#alertError').fadeIn('slow').delay(2000).fadeOut('slow');
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{ route('app-post-change-password') }}",
                    data: {
                        slug: slug,
                        password: newPassword
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#inputNewPassword').val('');
                        $('#inputConfirmNewPassword').val('');
                        $('#alertSuccessText').html('Kata sandi berhasil di ubah!');
                        $('#alertSuccess').fadeIn('slow').delay(2000).fadeOut('slow');
                    }
                });
            }
        });
    </script>
@endsection
