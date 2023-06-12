@extends('app.layouts.master')

@section('title')
    Lihat Karyawan
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App / Karyawan
            </div>
            <h2 class="page-title">
                {{ $user->name }}
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
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <strong>{{ $user->name }}</strong> berhasil di ubah
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    <form action="{{ route('app-employees-update', $user->slug) }}" method="POST" spellcheck="false" autocomplete="off">
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
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">No Handphone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->employee->phone }}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input name="nik" type="text" class="form-control" placeholder="0000" value="{{ $user->nik }}" readonly />
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select name="religion" type="text" class="form-select tomSelect" placeholder="Pilih agama...">
                                        <option value=""></option>
                                        <option value="Islam" {{ $user->employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen Protestan" {{ $user->employee->religion == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                        <option value="Kristen Katolik" {{ $user->employee->religion == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                        <option value="Hindu" {{ $user->employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ $user->employee->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Konghucu" {{ $user->employee->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                        <option value="Lainnya" {{ $user->employee->religion == 'Lainnya' ? 'selected' : '' }}>Lainya...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="form-label">Kelamin</label>
                                    <select name="gender" type="text" class="form-select tomSelect" placeholder="Pilih kelamin...">
                                        <option value=""></option>
                                        <option value="Laki-Laki" {{ $user->employee->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $user->employee->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        <option value="Lainnya" {{ $user->employee->gender == 'Lainnya' ? 'selected' : '' }}>Lainya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="placeBirth" value="{{ $user->employee->place_of_birth }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control mb-2" name="dateBirth" id="datepicker" value="{{ $user->employee->date_of_birth }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat Sesuai KTP</label>
                                    <textarea name="address" class="form-control" data-bs-toggle="autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 56px;" value="{{ $user->employee->address }}"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat Domisili (Optional)</label>
                                    <textarea name="address2" class="form-control" data-bs-toggle="autosize" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 56px;" value="{{ $user->employee->address2 }}"></textarea>
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
                                        <input type="text" class="form-control" name="ktp" value="{{ $user->employee->ktp }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor NPWP</label>
                                        <input type="text" class="form-control" name="npwp" value="{{ $user->employee->npwp }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Bank</label>
                                        <select name="bank" type="text" class="form-select tomSelect" placeholder="Pilih bank...">
                                            <option value=""></option>
                                            <option value="BCA" {{ $user->employee->bank == 'BCA' ? 'selected' : '' }}>Bank Central Asia</option>
                                            <option value="Mandiri" {{ $user->employee->bank == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Bank</label>
                                        <input type="text" class="form-control" name="bank_number" value="{{ $user->employee->bank_number }}" />
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
                                                <option value="{{ $branch->id }}" {{ $user->employee->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
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
                                                <option value="{{ $departement->id }}" {{ $user->employee->division_id == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
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
                                                <option value="{{ $position->id }}" {{ $user->employee->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Masuk</label>
                                        <input class="form-control mb-2" name="joined_at" id="datepicker2" value="{{ $user->employee->joined_at }}" />
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" type="text" class="form-select tomSelect" placeholder="Pilih status...">
                                            <option value=""></option>
                                            <option value="Kontrak" {{ $user->employee->status == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                            <option value="Permanen / Tetap" {{ $user->employee->status == 'Permanen / Tetap' ? 'selected' : '' }}>Permanen / Tetap</option>
                                            <option value="Lainnya" {{ $user->employee->status == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Periode Kontrak</label>
                                        <select name="period" type="text" class="form-select tomSelect" placeholder="Pilih periode...">
                                            <option value=""></option>
                                            <option value="1" {{ $user->employee->period == '1' ? 'selected' : '' }}>1 Bulan</option>
                                            <option value="2" {{ $user->employee->period == '2' ? 'selected' : '' }}>2 Bulan</option>
                                            <option value="3" {{ $user->employee->period == '3' ? 'selected' : '' }}>3 Bulan</option>
                                            <option value="4" {{ $user->employee->period == '4' ? 'selected' : '' }}>4 Bulan</option>
                                            <option value="5" {{ $user->employee->period == '5' ? 'selected' : '' }}>5 Bulan</option>
                                            <option value="6" {{ $user->employee->period == '6' ? 'selected' : '' }}>6 Bulan</option>
                                            <option value="7" {{ $user->employee->period == '7' ? 'selected' : '' }}>7 Bulan</option>
                                            <option value="8" {{ $user->employee->period == '8' ? 'selected' : '' }}>8 Bulan</option>
                                            <option value="9" {{ $user->employee->period == '9' ? 'selected' : '' }}>9 Bulan</option>
                                            <option value="10" {{ $user->employee->period == '10' ? 'selected' : '' }}>10 Bulan</option>
                                            <option value="11" {{ $user->employee->period == '11' ? 'selected' : '' }}>11 Bulan</option>
                                            <option value="12" {{ $user->employee->period == '12' ? 'selected' : '' }}>12 Bulan</option>
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
                        @if (Auth::user()->isAdmin == 1)
                            <div class="row row-cards">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select name="role" type="text" class="form-select tomSelect" placeholder="Pilih role...">
                                            <option value=""></option>
                                            @foreach ($roles->sortBy('name') as $role)
                                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sebagai Administrator?</label>
                                        <select name="isAdmin" type="text" class="form-select tomSelect">
                                            <option value="1" {{ $user->isAdmin == 1 ? 'selected' : '' }}>Ya</option>
                                            <option value="0" {{ $user->isAdmin == 0 ? 'selected' : '' }}>Tidak</option>
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
