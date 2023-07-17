@extends('app.layouts.master')

@section('title')
    Strucktural
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App
            </div>
            <h2 class="page-title">
                Structural
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                {{-- <div class="me-1 d-none d-md-block">
                    <form action="" method="GET" autocomplete="off" novalidate spellcheck="false" autocomplete="off">
                        <div class="input-icon">
                            <input type="text" name="search" class="form-control" placeholder="Cari Karyawan..." value="{{ $data }}" @if ($data) autofocus @endif />
                            <span class="input-icon-addon">
                                <i class="ti ti-search icon"></i>
                            </span>
                        </div>
                    </form>
                </div> --}}
                <a href="{{ route('app-employees-create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="ti ti-plus icon"></i>
                    Tambah Structural
                </a>
                <a href="{{ route('app-employees-create') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Tambah karyawan">
                    <i class="ti ti-plus icon"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 mb-3">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Departemens</h3>
                        <div class="card-actions">
                            <a href="#" class="btn-outline-primary btn btn-sm w-100 btn-icon" title="Tambah Departements" data-bs-toggle="tooltip" data-bs-placement="left">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th style="width: 5%;">Jumlah Karyawan</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departemens->sortBy('name') as $departemen)
                                    <tr>
                                        <td>
                                            <div class="progressbg">
                                                <div class="progress progressbg-progress">
                                                    <div class="progress-bar bg-primary-lt" style="width: 82.54%" role="progressbar" aria-valuenow="82.54" aria-valuemin="0" aria-valuemax="100" aria-label="82.54% Complete">
                                                        <span class="visually-hidden">82.54% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="progressbg-text">{{ $departemen->name }}</div>
                                            </div>
                                        </td>
                                        <td class="w-1 fw-bold text-center">{{ $departemen->employee_count }}</td>
                                        <td class="d-flex justify-content-center d-print-none">
                                            <a href="{{ route('app-structural-update', $departemen->slug) }}" class="text-warning me-2" aria-label="Ubah">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0);" class="text-danger btnHapus" data-name="{{ $departemen->name }}" aria-label="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7h16"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    <path d="M10 12l4 4m0 -4l-4 4"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub Departemens</h3>
                        <div class="card-actions">
                            <a href="#" class="btn-outline-primary btn btn-sm w-100 btn-icon" title="Tambah Sub Departemens" data-bs-toggle="tooltip" data-bs-placement="left">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th style="width: 5%;">Jumlah Karyawan</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subDepartemens->sortBy('name') as $subDepartemen)
                                <tr>
                                    <td>
                                        <div class="progressbg">
                                            <div class="progress progressbg-progress">
                                                <div class="progress-bar bg-primary-lt" style="width: 82.54%" role="progressbar" aria-valuenow="82.54" aria-valuemin="0" aria-valuemax="100" aria-label="82.54% Complete">
                                                    <span class="visually-hidden">82.54% Complete</span>
                                                </div>
                                            </div>
                                            <div class="progressbg-text">{{ $subDepartemen->name }}</div>
                                        </div>
                                    </td>
                                    <td class="w-1 fw-bold text-center">{{ $subDepartemen->employee_count }}</td>

                                    <td class="d-flex justify-content-center d-print-none">
                                        <a href="{{ route('app-structural-update', $subDepartemen->slug) }}" class="text-warning me-2" aria-label="Ubah">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);" class="text-danger btnHapus" data-name="{{ $subDepartemen->name }}"aria-label="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7h16"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                <path d="M10 12l4 4m0 -4l-4 4"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub Departemens</h3>
                        <div class="card-actions">
                            <a href="#" class="btn-outline-primary btn btn-sm w-100 btn-icon" title="Tambah Sub Departemens" data-bs-toggle="tooltip" data-bs-placement="left">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th style="width: 5%;">Jumlah Karyawan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subDepartemens->sortBy('name') as $subDepartemen)
                                <tr>
                                    <td>
                                        <div class="progressbg">
                                            <div class="progress progressbg-progress">
                                                <div class="progress-bar bg-primary-lt" style="width: 82.54%" role="progressbar" aria-valuenow="82.54" aria-valuemin="0" aria-valuemax="100" aria-label="82.54% Complete">
                                                    <span class="visually-hidden">82.54% Complete</span>
                                                </div>
                                            </div>
                                            <div class="progressbg-text">{{ $subDepartemen->name }}</div>
                                        </div>
                                    </td>
                                    <td class="w-1 fw-bold text-center">Ea</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cscript')
    <script></script>
@endsection
