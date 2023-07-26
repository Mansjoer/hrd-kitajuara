@extends('app.layouts.master')

@section('title')
    Struktural
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
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Departemen</h3>
                        <div class="card-actions">
                            <a class="btn-outline-primary btn btn-sm w-100 btn-icon" title="Tambah Departements" data-bs-toggle="tooltip" data-bs-placement="left" id="btnAddDepartemen">
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
                        <div id="table-departemen" class="table-responsive">
                            <table class="table table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th><button class="table-sort" data-sort="sort-nama-departemen">Nama</button></th>
                                        <th style="width: 5%;">Karyawan</th>
                                        <th class="text-center" style="width: 5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($departemens->sortBy('name') as $departemen)
                                        <tr class="data">
                                            <td class="sort-nama-departemen">{{ $departemen->name }}</td>
                                            <td class="w-1 fw-bold text-center">{{ $departemen->employee_count }}</td>
                                            <td class="d-flex justify-content-center d-print-none">
                                                {{-- <a href="" class="text-warning me-2" aria-label="Ubah">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </a> --}}
                                                <a role="button" class="text-danger btnHapusDepartemen" data-slug="{{ $departemen->slug }}" aria-label="Hapus">
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
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub Departemen</h3>
                        <div class="card-actions">
                            <a href="#" class="btn-outline-primary btn btn-sm w-100 btn-icon" title="Tambah Sub Departemen" data-bs-toggle="tooltip" data-bs-placement="left" id="btnAddSubDepartemen">
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
                        <div id="table-sub-departemen" class="table-responsive">
                            <table class="table table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th><button class="table-sort" data-sort="sort-nama-sub-departemen">Nama</button></th>
                                        <th style="width: 5%;">Karyawan</th>
                                        <th class="text-center" style="width: 5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($subDepartemens->sortBy('name') as $subDepartemen)
                                        <tr class="data">
                                            <td class="sort-nama-sub-departemen">{{ $subDepartemen->name }}</td>
                                            <td class="w-1 fw-bold text-center">{{ $subDepartemen->employee_count }}</td>
                                            <td class="d-flex justify-content-center d-print-none">
                                                {{-- <a href="" class="text-warning me-2" aria-label="Ubah">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </a> --}}
                                                <a role="button" class="text-danger btnHapusSubDepartemen" data-slug="{{ $subDepartemen->slug }}"aria-label="Hapus">
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
        </div>
    </div>
    <div class="modal modal-blur fade" tabindex="-1" id="modalAddDepartemen" data-bs-backdrop="static">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="formTambahDepartemen" autocomplete="off" spellcheck="false" novalidate>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <a class="navbar-brand navbar-brand-autodark">
                                <h2>Departemen Baru</h2>
                            </a>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputNamaDepartemen">Nama Departemen</label>
                            <input id="inputNamaDepartemen" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitLoginForm" tabindex="4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" tabindex="-1" id="modalAddSubDepartemen" data-bs-backdrop="static">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="formTambahSubDepartemen" autocomplete="off" spellcheck="false" novalidate>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <a class="navbar-brand navbar-brand-autodark">
                                <h2>Sub Departemen Baru</h2>
                            </a>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputNamaSubDepartemen">Nama Sub Departemen</label>
                            <input id="inputNamaSubDepartemen" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitLoginForm" tabindex="4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('cscript')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            departementList();
            subDepartementList();
        });

        function departementList() {
            new List('table-departemen', {
                sortClass: 'table-sort',
                listClass: 'table-tbody',
                valueNames: ['sort-nama-departemen']
            });
        };

        function subDepartementList() {
            new List('table-sub-departemen', {
                sortClass: 'table-sort',
                listClass: 'table-tbody',
                valueNames: ['sort-nama-sub-departemen']
            });
        };
    </script>
    <script>
        $('#btnAddDepartemen').on('click', function() {
            $('#modalAddDepartemen').modal('show');
        });

        $('#formTambahDepartemen').on('submit', function(e) {
            e.preventDefault();
            var namaDepartement = $('#inputNamaDepartemen').val();
            $.ajax({
                type: "POST",
                url: "{{ route('app-structural-add-departement') }}",
                data: {
                    name: namaDepartement
                },
                dataType: "JSON",
                success: function(data) {
                    $('#modalAddDepartemen').modal('hide');
                    $('#table-departemen').load(document.URL + ' #table-departemen', function() {
                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Departemen baru berhasil ditambahkan.',
                            position: 'topRight',
                        });
                        departementList();
                    });
                },
                error: function(data) {
                    departementList();
                    $('#modalAddDepartemen').modal('hide');
                    iziToast.error({
                        title: 'Gagal!',
                        message: namaDepartement + ' sudah terdaftar',
                        position: 'topRight',
                    });
                }
            });
        });

        $(document).on('click', '.btnHapusDepartemen', function() {
            var slug = $(this).data('slug');
            $.ajax({
                type: "POST",
                url: "{{ route('app-structural-delete-departement') }}",
                data: {
                    slug: slug,
                },
                dataType: "JSON",
                success: function(response) {
                    $('#table-departemen').load(document.URL + ' #table-departemen', function() {
                        iziToast.success({
                            title: 'Sukses!',
                            message: response.name + ' berhasil dihapus.',
                            position: 'topRight',
                        });
                        departementList();
                    });
                }
            });
        });
    </script>

    <script>
        $('#btnAddSubDepartemen').on('click', function() {
            $('#modalAddSubDepartemen').modal('show');
        });

        $(document).on('submit', '#formTambahSubDepartemen', function(e) {
            e.preventDefault();
            var namaSubDepartement = $('#inputNamaSubDepartemen').val();
            $.ajax({
                type: "POST",
                url: "{{ route('app-structural-add-sub-departement') }}",
                data: {
                    name: namaSubDepartement,
                },
                dataType: "JSON",
                success: function(response) {
                    $('#modalAddSubDepartemen').modal('hide');
                    $('#table-sub-departemen').load(document.URL + ' #table-sub-departemen', function() {
                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Sub departemen baru berhasil ditambahkan.',
                            position: 'topRight',
                        });
                        subDepartementList();
                    });
                },
                error: function(data) {
                    departementList();
                    $('#modalAddDepartemen').modal('hide');
                    iziToast.error({
                        title: 'Gagal!',
                        message: namaDepartement + ' sudah terdaftar',
                        position: 'topRight',
                    });
                }
            });
        });

        $(document).on('click', '.btnHapusSubDepartemen', function() {
            var slug = $(this).data('slug');
            $.ajax({
                type: "POST",
                url: "{{ route('app-structural-delete-sub-departement') }}",
                data: {
                    slug: slug,
                },
                dataType: "JSON",
                success: function(response) {
                    $('#table-sub-departemen').load(document.URL + ' #table-sub-departemen', function() {
                        iziToast.success({
                            title: 'Sukses!',
                            message: response.name + ' berhasil dihapus.',
                            position: 'topRight',
                        });
                        departementList();
                    });
                }
            });
        });
    </script>
@endsection
