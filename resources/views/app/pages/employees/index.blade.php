@extends('app.layouts.master')

@section('title')
    Karyawan
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center mb-4">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App
            </div>
            <h2 class="page-title">
                Karyawan
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <button class="btn btn-outline-warning d-none d-sm-inline-block me-1" data-bs-toggle="modal" data-bs-target="#modalImportEmployees" disabled>
                    <i class="ti ti-tool icon"></i>
                    Import & Export is Under Maintenance
                </button>
                {{-- <button class="btn btn-outline-lime d-none d-sm-inline-block me-1" data-bs-toggle="modal" data-bs-target="#modalImportEmployees">
                    <i class="ti ti-cloud-upload icon"></i>
                    Upload
                </button>
                <div class="dropdown me-1 d-none d-md-block">
                    <a href="#" class="btn btn-outline-teal dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="ti ti-cloud-download icon"></i>
                        Download
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('app-download-format-employees') }}">Format / Template</a>
                        <a class="dropdown-item" href="{{ route('app-export-csv-employees') }}">Csv</a>
                        <a class="dropdown-item" href="{{ route('app-export-excel-employees') }}">Excel</a>
                    </div>
                </div> --}}
                <div class="me-1 d-none d-md-block">
                    <form action="" method="GET" autocomplete="off" novalidate spellcheck="false" autocomplete="off">
                        <div class="input-icon">
                            <input type="text" name="search" class="form-control" placeholder="Cari Karyawan..." @if (Session::get('search')) autofocus @endif />
                            <span class="input-icon-addon">
                                <i class="ti ti-search icon"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <a href="{{ route('app-employees-create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="ti ti-plus icon"></i>
                    Tambah karyawan
                </a>
                <a href="{{ route('app-employees-create') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Tambah karyawan">
                    <i class="ti ti-plus icon"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-yellow-lt avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Total Karyawan
                                    </div>
                                    <div class="text-muted">
                                        {{ $users->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-teal-lt avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                            <path d="M15 19l2 2l4 -4"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Total Karyawan Aktif
                                    </div>
                                    <div class="text-muted">
                                        {{ $countActiveUser->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-danger-lt avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                                            <path d="M22 22l-5 -5"></path>
                                            <path d="M17 22l5 -5"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Total Karyawan Tidak Aktif
                                    </div>
                                    <div class="text-muted">
                                        {{ $countUnactiveUser->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div id="table-employee" class="table-responsive">
                    <table class="table" id="tableEmployees">
                        <thead>
                            <tr>
                                <th class="text-center"><button class="table-sort" data-sort="sort-nik">NIK</th>
                                <th><button class="table-sort" data-sort="sort-nama">Nama</button></th>
                                <th class="d-none d-sm-block"><button class="table-sort" data-sort="sort-cabang">Cabang</button></th>
                                <th><button class="table-sort" data-sort="sort-departemen">Departemen</button></th>
                                <th><button class="table-sort" data-sort="sort-jabatan">Jabatan</button></th>
                                <th class="text-center d-print-none" style="width: 5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody">
                            @forelse ($employees as $employee)
                                <tr class="data">
                                    <td class="text-center sort-nik {{ $employee->user->status == 1 ? 'text-success' : 'text-danger' }}" title="{{ $employee->user->status == 1 ? Str::upper('Aktif') : Str::upper('Tidak Aktif') }}" data-bs-toggle="tooltip" data-bs-placement="top">{{ Str::upper($employee->nik) }}</td>
                                    <td class="sort-nama" title="{{ Str::upper($employee->user->name) }}" data-bs-toggle="tooltip" data-bs-placement="top"><strong>{{ Str::upper(Str::limit($employee->user->name, 20, '...')) }}</strong></td>
                                    @if ($employee->branch != null)
                                        <td class="sort-cabang d-nontitle="{{ Str::upper($employee->user->name) }}" data-bs-toggle="tooltip" data-bs-placement="top"e d-sm-block">{{ $employee->branch->name }}</td>
                                    @else
                                        <td class="sort-cabang d-none d-sm-block">-</td>
                                    @endif

                                    @if ($employee->departement != null)
                                        <td class="sort-departemen" title="{{ $employee->departement->name }}" data-bs-toggle="tooltip" data-bs-placement="top">{{ Str::limit($employee->departement->name, 20, '...') }}</td>
                                    @else
                                        <td class="sort-departemen">-</td>
                                    @endif

                                    @if ($employee->position != null)
                                        <td class="sort-jabatan" title="{{ $employee->position }}" data-bs-toggle="tooltip" data-bs-placement="top">{{ Str::limit($employee->position, 20, '...') }}</td>
                                    @else
                                        <td class="sort-jabatan">-</td>
                                    @endif

                                    @if ($employee->nik == Auth::user()->nik)
                                        <td class="d-flex justify-content-center d-print-none">
                                            <a href="{{ route('app-users-profile', $employee->user->slug) }}" class="text-primary me-2" aria-label="Lihat">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('app-employees-edit', $employee->user->slug) }}" class="text-warning me-2" aria-label="Ubah">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    @else
                                        <td class="d-flex justify-content-center d-print-none">
                                            <a href="{{ route('app-users-profile', $employee->user->slug) }}" class="text-primary me-2" aria-label="Lihat">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('app-employees-edit', $employee->user->slug) }}" class="text-warning me-2" aria-label="Ubah">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0);" class="text-danger btnHapus" data-name="{{ $employee->user->name }}" data-nik="{{ $employee->nik }}" aria-label="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7h16"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    <path d="M10 12l4 4m0 -4l-4 4"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">
                                        <div class="empty">
                                            <p class="empty-title">Karyawan tidak ditemukan</p>
                                            <p class="empty-subtitle text-muted">
                                                Try adjusting your search or filter to find what you're looking for.
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($employees->hasPages())
                    <div class="col-lg-12 mt-3">
                        <div class="d-flex justify-content-end">
                            {{ $employees->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('app.modals.uploadFiles')
@endsection

@section('cscript')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const list = new List('table-employee', {
                sortClass: 'table-sort',
                listClass: 'table-tbody',
                valueNames: ['sort-nik', 'sort-nama', 'sort-cabang', 'sort-departemen', 'sort-jabatan']
            });
        });
    </script>

    <script>
        $(document).on('click', '.btnHapus', function() {
            var nama = $(this).data('name');
            var nik = $(this).data('nik');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: nama + ' akan dihapus untuk selamanya',
                icon: 'question',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#206bc4',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#d63939'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('app-employees-delete') }}",
                        data: {
                            nik: nik,
                        },
                        dataType: "JSON",
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
