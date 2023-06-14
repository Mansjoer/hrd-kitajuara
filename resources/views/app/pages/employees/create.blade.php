@extends('app.layouts.master')

@section('title')
    Tambah Karyawan
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App / Karyawan
            </div>
            <h2 class="page-title">
                Tambah karyawan
            </h2>
        </div>
        <!-- Page title actions -->
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
    <form action="{{ route('app-employees-post-create') }}" method="POST" spellcheck="false" autocomplete="off">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Informasi Umum</h3>
                        <div class="row row-cards">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" name="name" placeholder="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group input-group-flat">
                                        <input type="text" name="email" class="form-control text-end pe-0" value="" autocomplete="off" />
                                        <span class="input-group-text">
                                            @dbeautyhouse.co.id
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">No Handphone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <div class="input-group input-group-flat">
                                        <span class="input-group-text">
                                            DBH
                                        </span>
                                        <input name="nik" type="text" class="form-control ps-0" placeholder="0000" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select name="religion" type="text" class="form-select tomSelect" placeholder="Pilih agama...">
                                        <option value=""></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Lainnya">Lainya...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="form-label">Kelamin</label>
                                    <select name="gender" type="text" class="form-select tomSelect" placeholder="Pilih kelamin...">
                                        <option value=""></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Lainnya">Lainya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="placeBirth" placeholder="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control mb-2" name="dateBirth" id="datepicker" value="2023" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat Sesuai KTP</label>
                                    <textarea name="address" class="form-control" data-bs-toggle="autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 56px;"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat Domisili (Optional)</label>
                                    <textarea name="address2" class="form-control" data-bs-toggle="autosize" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 56px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Informasi Personal</h3>
                            <div class="row row-cards">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor KTP</label>
                                        <input type="text" class="form-control" name="ktp" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor NPWP</label>
                                        <input type="text" class="form-control" name="npwp" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Bank</label>
                                        <select name="bank" type="text" class="form-select tomSelect" placeholder="Pilih bank...">
                                            <option value=""></option>
                                            @foreach ($bankList as $bank)
                                                <option value="{{ $bank['sandi_bank'] }}">{{ $bank['nama_bank'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Rekening</label>
                                        <input type="text" class="form-control" name="bank_number" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Informasi Pekerjaan</h3>
                            <div class="row row-cards">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Cabang</label>
                                        <select name="branch" type="text" class="form-select tomSelect" placeholder="Pilih cabang...">
                                            <option value=""></option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Departemen</label>
                                        <select name="departement" type="text" class="form-select tomSelect" placeholder="Pilih departemen...">
                                            <option value=""></option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <select name="position" type="text" class="form-select tomSelect" placeholder="Pilih jabatan...">
                                            <option value=""></option>
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Masuk</label>
                                        <input class="form-control mb-2" name="joined_at" id="datepicker2" value="2023" />
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" type="text" class="form-select tomSelect" placeholder="Pilih status...">
                                            <option value=""></option>
                                            <option value="Kontrak">Kontrak</option>
                                            <option value="Permanen / Tetap">Permanen / Tetap</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Periode Kontrak</label>
                                        <select name="period" type="text" class="form-select tomSelect" placeholder="Pilih periode...">
                                            <option value=""></option>
                                            <option value="1">1 Bulan</option>
                                            <option value="2">2 Bulan</option>
                                            <option value="3">3 Bulan</option>
                                            <option value="4">4 Bulan</option>
                                            <option value="5">5 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="7">7 Bulan</option>
                                            <option value="8">8 Bulan</option>
                                            <option value="9">9 Bulan</option>
                                            <option value="10">10 Bulan</option>
                                            <option value="11">11 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="card mb-3 placeholder-glow">
                    <div class="card-body">
                        <h3 class="card-title">Lainnya <span class="form-help " data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Abaikan jika kamu tidak tahu apa yang akan kamu lakukan.</p>">?</span></h3>
                        @if (!Auth::user()->isAdmin == 1)
                            <div class="row row-cards">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select name="role" type="text" class="form-select tomSelect" placeholder="Pilih role...">
                                            <option value=""></option>
                                            @foreach ($roles->sortBy('name') as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sebagai Administrator?</label>
                                        <select name="isAdmin" type="text" class="form-select tomSelect">
                                            <option value="1">Ya</option>
                                            <option value="0" selected>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row row-cards text-center mt-3">
                                <div class="empty-img">
                                    <img src="https://hrd.kitajuara.test/app/assets/static/illustrations/Security-cuate.svg" height="128" alt="">
                                </div>
                            </div>
                            <div class="row row-cards text-center ">
                                <p class="empty-title">
                                    Terkunci
                                </p>
                                <p class="empty-subtitle text-muted">
                                    Sepertinya kamu bukan admin?
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-end">
                        <div class="d-flex">
                            <button type="reset" class="btn btn-outline-danger">Batal</button>
                            <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('cscript')
    <script>
        new Litepicker({
            element: document.getElementById('datepicker'),
            format: 'D MMMM, YYYY',
            buttonText: {
                previousMonth: '<i role="button" class="ti ti-arrow-narrow-left icon"></i>',
                nextMonth: '<i role="button" class="ti ti-arrow-narrow-right icon"></i>',
            },
        });
        new Litepicker({
            element: document.getElementById('datepicker2'),
            format: 'D MMMM, YYYY',
            buttonText: {
                previousMonth: '<i role="button" class="ti ti-arrow-narrow-left icon"></i>',
                nextMonth: '<i role="button" class="ti ti-arrow-narrow-right icon"></i>',
            },
        });
    </script>
@endsection
