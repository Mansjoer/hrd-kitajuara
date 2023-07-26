@extends('app.layouts.master')

@section('title')
    {{ $user->name }} Profile
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App / Karyawan / Profile
            </div>
            <h2 class="page-title">
                {{ $user->name }}
            </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('app-employees') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="ti ti-arrow-narrow-left icon"></i>
                    Kembali
                </a>
                <a href="{{ route('app-employees') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Kembali">
                    <i class="ti ti-arrow-narrow-left icon"></i>
                </a>
            </div>
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
                        <a href="{{ route('app-users-profile', $user->slug) }}" class="list-group-item list-group-item-action d-flex align-items-center active">Biodata</a>
                        <a href="{{ route('app-users-profile-attendance', $user->slug) }}" class="list-group-item list-group-item-action">Kehadiran</a>
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">Pengajuan</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <h3 class="card-title">Foto Karyawan</h3>
                    <div class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                        <div class="d-flex">
                            <div>
                                <strong>Sukses!</strong> foto karyawan berhasil di ubah.
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    <div class="row align-items-center mb-3">
                        <form id="formUploadPhoto" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="image" type="file" id="inputUploadPhoto" accept="image/*" style="display: none;">
                        </form>
                        <div class="col-auto">
                            @if (is_null($user->employee->profile_path))
                                <span class="avatar avatar-xl" id="avatarPlaceholder" style="background-image: url('https://app.kitajuara.co.id/custom/img/user-default.webp')"></span>
                            @else
                                <span class="avatar avatar-xl" id="avatarPlaceholder" style="background-image: url('https://app.kitajuara.co.id/{{ $user->employee->profile_path }}')"></span>
                            @endif
                        </div>
                        <div class="col-auto">
                            <a class="btn" id="uploadPhoto">
                                <span id="textUploadPhoto">Ubah Foto</span>
                            </a>
                        </div>
                        <div class="col-auto">
                            @if (is_null($user->employee->profile_path))
                                <a class="btn btn-ghost-danger" id="deletePhoto" data-photo="https://app.kitajuara.co.id/custom/img/user-default.webp" style="display: none;">
                                    <span id="textDeletePhoto">Hapus Foto</span>
                                </a>
                            @else
                                <a class="btn btn-ghost-danger" id="deletePhoto" data-photo="/{{ $user->employee->profile_path }}" style="display: none;">
                                    <span id="textDeletePhoto">Hapus Foto</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <h3 class="card-title">Informasi Umum</h3>
                    <div class="datagrid mb-3">
                        <div class="datagrid-item">
                            <div class="datagrid-title">NIK</div>
                            <div class="datagrid-content">{{ $user->nik }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nama</div>
                            <div class="datagrid-content">{{ $user->name }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nama Panggilan</div>
                            <div class="datagrid-content">{{ $user->employee->username }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status Pernikahan</div>
                            <div class="datagrid-content">{{ $user->employee->marital_status ? $user->employee->marital_status : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Pendidikan Terakhir</div>
                            <div class="datagrid-content">{{ $user->employee->education ? $user->employee->education : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">No Handphone</div>
                            <div class="datagrid-content">{{ $user->employee->phone ? $user->employee->phone : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tempat Lahir</div>
                            <div class="datagrid-content">{{ $user->employee->place_of_birth ? $user->employee->place_of_birth : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Lahir</div>
                            <div class="datagrid-content">{{ $user->employee->date_of_birth ? \Carbon\Carbon::parse($user->employee->date_of_birth)->translatedFormat('d F, Y') : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Umur</div>
                            <div class="datagrid-content">{{ \Carbon\Carbon::parse($user->employee->date_of_birth)->age }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Agama</div>
                            <div class="datagrid-content">{{ $user->employee->religion ? $user->employee->religion : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Alamat Sesuai KTP</div>
                            <div class="datagrid-content">
                                {{ $user->employee->address ? $user->employee->address : '-' }}
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Alamat Domisili</div>
                            <div class="datagrid-content">
                                {{ $user->employee->address2 ? $user->employee->address2 : '-' }}
                            </div>
                        </div>
                    </div>
                    <div class="border mb-3"></div>
                    <h3 class="card-title">Informasi Personal</h3>
                    <div class="datagrid mb-3">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nomor KTP</div>
                            <div class="datagrid-content">{{ $user->employee->ktp ? $user->employee->ktp : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nomor NPWP</div>
                            <div class="datagrid-content">{{ $user->employee->npwp ? $user->employee->npwp : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nomor BPJS</div>
                            <div class="datagrid-content">{{ $user->employee->ktp ? $user->employee->ktp : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nomor BPJAMSOSTEK</div>
                            <div class="datagrid-content">{{ $user->employee->npwp ? $user->employee->npwp : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Bank</div>
                            <div class="datagrid-content">{{ $user->employee->bank ? $user_bank['nama_bank'] : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nomor Rekening</div>
                            <div class="datagrid-content">{{ $user->employee->bank_number ? $user->employee->bank_number : '-' }}</div>
                        </div>
                    </div>
                    <div class="border mb-3"></div>
                    <h3 class="card-title">Informasi Pekerjaan</h3>
                    <div class="datagrid mb-3">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Cabang</div>
                            <div class="datagrid-content">{{ $user->employee->branch ? $user->employee->branch->name : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Masuk</div>
                            <div class="datagrid-content">{{ $user->employee->joined_at ? \Carbon\Carbon::parse($user->employee->joined_at)->translatedFormat('d F, Y') : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Lama Bekerja</div>
                            <div class="datagrid-content">{{ \Carbon\Carbon::parse($user->employee->joined_at)->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan %d Hari') }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Departemen</div>
                            <div class="datagrid-content">{{ $user->employee->departement ? $user->employee->departement->name : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Sub Departemen</div>
                            <div class="datagrid-content">{{ $user->employee->subDepartement ? $user->employee->subDepartement->name : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content">{{ $user->employee->status ? $user->employee->status : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Kontrak Awal</div>
                            <div class="datagrid-content">{{ $user->employee->start_contract_at ? \Carbon\Carbon::parse($user->employee->start_contract_at)->translatedFormat('d F, Y') : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Kontrak Berakhir</div>
                            <div class="datagrid-content">{{ $user->employee->end_contract_at ? \Carbon\Carbon::parse($user->employee->end_contract_at)->translatedFormat('d F, Y') : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Sisa Saldo Cuti</div>
                            <div class="datagrid-content">{{ $user->employee->saldoCuti }}</div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                        <a href="#" class="btn">
                            Cancel
                        </a>
                        <a href="#" class="btn btn-primary">
                            Submit
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('cscript')
    <script>
        $('#deletePhoto').on('click', function() {
            var photo = $(this).data('photo');
            $('#avatarPlaceholder').css('background-image', 'url("' + photo + '")');
            $('#textUploadPhoto').text('Ubah Foto');
            $('#uploadPhoto').removeClass('btn-outline-success');
            $(this).hide();
        });

        $('#uploadPhoto').on('click', function() {
            if ($('#textUploadPhoto').text() === 'Simpan Foto') {
                $('#formUploadPhoto').submit();
                $('#textUploadPhoto').text('Ubah Foto');
            } else {
                $('#inputUploadPhoto').trigger('click');
            }
        });

        $(document).on('submit', '#formUploadPhoto', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: document.URL + '/change-photo',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    $('.avatar').css('background-image', 'url("' + response.data + '")');
                    $('#deletePhoto').data('photo', response.data);
                    $('#deletePhoto').hide();
                    $('#uploadPhoto').removeClass('btn-outline-success');
                    $('.alert').fadeIn('slow').delay(2000).fadeOut('slow');
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $('#inputUploadPhoto').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#avatarPlaceholder').css('background-image', 'url("' + reader.result + '")');
                $('#uploadPhoto').addClass('btn-outline-success');
                $('#deletePhoto').show();
                $('#textUploadPhoto').text('Simpan Foto');
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {}
        });
    </script>
@endsection
