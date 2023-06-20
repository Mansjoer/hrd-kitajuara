@extends('app.layouts.master')

@section('title')
    {{ $user->name }} Profile
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App / Karyawan / {{ $user->name }}
            </div>
            <h2 class="page-title">
                Biodata
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
                    <h4 class="subheader mt-4">Privasi</h4>
                    <div class="list-group list-group-transparent">
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">Kata Sandi</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <h3 class="card-title">Foto Karyawan</h3>
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            @if ($user->employee->profile_path == null)
                                <span class="avatar avatar-xl" style="background-image: url('https://app.kitajuara.co.id/custom/img/user-default.webp')"></span>
                            @else
                                <span class="avatar avatar-xl" style="background-image: url('{{ $user->employee->profile_path }}')"></span>
                            @endif
                        </div>
                        <div class="col-auto"><a href="#" class="btn">
                                Ubah Foto
                            </a>
                        </div>
                        <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                Hapus Foto
                            </a></div>
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
                            <div class="datagrid-title">No Handphone</div>
                            <div class="datagrid-content">{{ $user->employee->phone ? $user->employee->phone : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Umur</div>
                            <div class="datagrid-content">{{ \Carbon\Carbon::parse($user->employee->date_of_birth)->age }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tempat Lahir</div>
                            <div class="datagrid-content">{{ $user->employee->place_of_birth ? $user->employee->place_of_birth : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Lahir</div>
                            <div class="datagrid-content">{{ $user->employee->date_of_birth ? $user->employee->date_of_birth : '-' }}</div>
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
                            <div class="datagrid-title">KTP</div>
                            <div class="datagrid-content">{{ $user->employee->ktp ? $user->employee->ktp : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">NPWP</div>
                            <div class="datagrid-content">{{ $user->employee->npwp ? $user->employee->npwp : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Bank</div>
                            <div class="datagrid-content">{{ $user->employee->bank ? $user->employee->bank : '-' }}</div>
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
                            <div class="datagrid-content">{{ $user->employee->branch->name ? $user->employee->branch->name : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Departemen</div>
                            <div class="datagrid-content">{{ $user->employee->departement->name ? $user->employee->departement->name : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Jabatan</div>
                            <div class="datagrid-content">{{ $user->employee->position->name ? $user->employee->position->name : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Masuk</div>
                            <div class="datagrid-content">{{ $user->employee->joined_at ? $user->employee->joined_at : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content">{{ $user->employee->status ? $user->employee->status : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Periode</div>
                            <div class="datagrid-content">{{ $user->employee->period ? $user->employee->period . ' Bulan' : '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Lama Bekerja</div>
                            <div class="datagrid-content">{{ \Carbon\Carbon::parse($user->employee->joined_at)->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan %d Hari') }}</div>
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
