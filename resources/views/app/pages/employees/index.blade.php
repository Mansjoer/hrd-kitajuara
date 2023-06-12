@extends('app.layouts.master')

@section('title')
    Karyawan
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
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
                <div class="me-3 d-none d-md-block">
                    <form action="" method="GET" autocomplete="off" novalidate spellcheck="false" autocomplete="off">
                        <div class="input-icon">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Karyawan..." value="{{ $data }}" @if ($data) autofocus @endif />
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
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div id="table-employee" class="table-responsive">
                    <table class="table" id="tableEmployees">
                        <thead>
                            <tr>
                                <th class="text-center"><button class="table-sort" data-sort="sort-nik">NIK</th>
                                <th><button class="table-sort" data-sort="sort-nama">Nama</button></th>
                                <th><button class="table-sort" data-sort="sort-cabang">Cabang</button></th>
                                <th><button class="table-sort" data-sort="sort-departemen">Departemen</button></th>
                                <th><button class="table-sort" data-sort="sort-jabatan">Jabatan</button></th>
                                <th class="text-center" style="width: 5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody">
                            @forelse ($employees as $employee)
                                <tr class="data">
                                    <td class="text-center sort-nik">{{ Str::upper($employee->nik) }}</td>
                                    <td class="sort-nama"><strong>{{ $employee->user->name }}</strong></td>
                                    <td class="sort-cabang">{{ $employee->branch->name }}</td>
                                    <td class="sort-departemen">{{ $employee->departement->name }}</td>
                                    <td class="sort-jabatan">{{ $employee->position->name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="javascript:void(0);" class="text-primary me-2" id="btnHapus" aria-label="Lihat atau Ubah">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-edit btnEdit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M11.192 17.966c-3.242 -.28 -5.972 -2.269 -8.192 -5.966c2.4 -4 5.4 -6 9 -6c3.326 0 6.14 1.707 8.442 5.122"></path>
                                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
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
            </div>
        </div>
        {{-- <div class="col-lg-4">
            <div class="card">
                ea
            </div>
        </div> --}}
    </div>
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
