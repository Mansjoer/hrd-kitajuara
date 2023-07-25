@extends('app.layouts.master')

@section('title')
    {{ $user->name }} Profile
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                <a href="{{ route('app-dashboard') }}">App</a> / <a href="{{ route('app-employees') }}">Karyawan</a> / {{ $user->name }}
            </div>
            <h2 class="page-title">
                Kehadiran
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
                        <a href="{{ route('app-users-profile', $user->slug) }}" class="list-group-item list-group-item-action d-flex align-items-center">Biodata</a>
                        <a href="{{ route('app-users-profile-attendance', $user->slug) }}" class="list-group-item list-group-item-action active">Kehadiran</a>
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">Pengajuan</a>
                    </div>
                    <h4 class="subheader mt-4">Privasi</h4>
                    <div class="list-group list-group-transparent">
                        <a href="{{ route('app-users-profile-change-password', $user->slug) }}" class="list-group-item list-group-item-action">Kata Sandi</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="subheader">Kehadiran</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-success-lt text-white avatar">
                                                <i class="ti ti-login icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $user->attendance->count() }}
                                            </div>
                                            <div class="text-muted">
                                                Total kehadiran
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-danger-lt text-white avatar">
                                                <i class="ti ti-logout icon"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $daysInMonth - $user->attendance->count() }}
                                            </div>
                                            <div class="text-muted">
                                                Total absen
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <h4 class="subheader">Kehadiran 1 Minggu Terakhir</h4>
                        </div>
                        <div class="list-group card-list-group col-lg-12">
                            @foreach ($attendances->sortByDesc('created_at') as $attendance)
                                <div class="list-group-item border mb-3">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-5">
                                            {{ \Carbon\Carbon::parse($attendance->created_at)->format('d F, Y') }} - {{ \Carbon\Carbon::parse($attendance->created_at)->format('H:i') }}
                                            <div class="text-muted ">
                                                @if ($attendance->branch_id != null)
                                                    <span class="text-success">
                                                        {{ $attendance->branch->name }}
                                                    </span>
                                                @else
                                                    <span class="text-danger">
                                                        Luar Kantor
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="col-auto text-muted">
                                            {{ \Carbon\Carbon::parse($attendance->created_at)->format('H:i') }}
                                        </div> --}}
                                        <div class="col-2">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat lebih detail...">
                                                <a href="#" class="link-secondary" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modalAttendanceInfo{{ $attendance->id }}">
                                                    <i class="ti ti-eye icon"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cmodal')
    @foreach ($user->attendance->sortByDesc('created_at') as $attendance)
        <div class="modal modal-blur fade" tabindex="-1" id="modalAttendanceInfo{{ $attendance->id }}">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-lokasi-masuk{{ $attendance->id }}" class="nav-link active" data-bs-toggle="tab">
                                        <i class="ti ti-login icon me-2"></i>
                                        Masuk
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-lokasi-pulang{{ $attendance->id }}" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-logout icon me-2"></i>
                                        Pulang
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-lokasi-masuk{{ $attendance->id }}">
                                    <div class="card card-sm mb-4">
                                        <div class="img-responsive" style="background-image: url('https://app.kitajuara.co.id/{{ $attendance->in_picturePath }}');"></div>
                                    </div>
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            {{-- <div class="card-title">Basic info</div> --}}
                                            <div class="mb-2">
                                                <strong>Jam :</strong> {{ $attendance->inTime }}
                                            </div>
                                            <div class="mb-2">
                                                @if ($attendance->branch != null)
                                                    <strong>Cabang :</strong> {{ $attendance->branch->name }}
                                                @else
                                                    <strong>Cabang :</strong> Luar Kantor
                                                @endif
                                            </div>
                                            <div class="mb-2">
                                                <strong>Latitude :</strong> {{ $attendance->in_latitude }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Longitude :</strong> {{ $attendance->in_longitude }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Gmaps :</strong> <a href="{{ $attendance->in_gmapsLink }}" target="_blank" rel="noopener noreferrer">Lihat</a>
                                            </div>
                                            <div class="mb-2">
                                                <strong>Note :</strong> {{ $attendance->in_note ? $attendance->in_note : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-lokasi-pulang{{ $attendance->id }}">
                                    @if ($attendance->outTime != null)
                                        <div class="card card-sm mb-4">
                                            <div class="img-responsive" style="background-image: url('https://app.kitajuara.co.id/{{ $attendance->out_picturePath }}');"></div>
                                        </div>
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                {{-- <div class="card-title">Basic info</div> --}}
                                                <div class="mb-2">
                                                    <strong>Jam :</strong> {{ $attendance->outTime }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Latitude :</strong> {{ $attendance->out_latitude }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Longitude :</strong> {{ $attendance->out_longitude }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Gmaps :</strong> <a href="{{ $attendance->in_gmapsLink }}" target="_blank" rel="noopener noreferrer">Lihat</a>
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Note :</strong> {{ $attendance->in_note ? $attendance->in_note : '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card card-sm">
                                            <div class="empty">
                                                <div class="empty-img"><img src="{{ asset('app/assets/static/illustrations/undraw_quitting_time_dm8t.svg') }}" height="128" alt="">
                                                </div>
                                                <p class="empty-title">Data tidak ditemukan</p>
                                                <p class="empty-subtitle text-muted">
                                                    Sepertinya karyawan ini belum melakukan absen pulang.
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
