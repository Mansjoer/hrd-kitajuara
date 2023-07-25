@extends('app.layouts.master')

@section('title')
    Ubah Karyawan
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App / Karyawan / Edit
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

    <form action="{{ route('app-employees-update', $user->slug) }}" method="POST" spellcheck="false" autocomplete="off" id="formKaryawan">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Informasi Umum</h3>
                        <div class="row row-cards">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input name="nik" type="text" class="form-control" placeholder="" autocomplete="off" value="{{ $user->nik }}" style="text-transform: uppercase;" />
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" placeholder="" value="{{ $user->employee->name }}" />
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label class="form-label">Nama Panggilan</label>
                                    <input type="text" class="form-control" name="username" placeholder="" value="{{ $user->employee->username }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group input-group-flat">
                                        <input type="text" name="email" class="form-control text-end pe-0" value="{{ strstr($user->email, '@', true) }}" autocomplete="off" />
                                        <span class="input-group-text">
                                            @dbeautyhouse.co.id
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">No Handphone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="" value="{{ $user->employee->phone }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select name="religion" type="text" class="form-select tomSelect" placeholder="Pilih agama...">
                                        <option value="" {{ $user->employee->religion == null ? 'selected' : '' }}></option>
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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Kelamin</label>
                                    <select name="gender" type="text" class="form-select tomSelect" placeholder="Pilih kelamin...">
                                        <option value="" {{ $user->employee->gender == null ? 'selected' : '' }}></option>
                                        <option value="Laki-Laki" {{ $user->employee->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $user->employee->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        <option value="Lainnya" {{ $user->employee->gender == 'Lainnya' ? 'selected' : '' }}>Lainya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Status Pernikahan</label>
                                    <select name="maritalStatus" type="text" class="form-select tomSelect" placeholder="Pilih status pernikahan...">
                                        <option value="" {{ $user->employee->marital_status == null ? 'selected' : '' }}></option>
                                        <option value="Belum Menikah" {{ $user->employee->marital_status == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                        <option value="Menikah" {{ $user->employee->marital_status == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="Cerai Hidup" {{ $user->employee->marital_status == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ $user->employee->marital_status == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Pendidikan Terakhir</label>
                                    <select name="education" type="text" class="form-select tomSelect" placeholder="Pilih status pernikahan...">
                                        <option value="" {{ $user->employee->education == null ? 'selected' : '' }}></option>
                                        <option value="SD" {{ $user->employee->education == 'SD' ? 'selected' : '' }}>SD / Sederajat</option>
                                        <option value="SMP" {{ $user->employee->education == 'SMP' ? 'selected' : '' }}>SMP / Sederajat</option>
                                        <option value="SMA" {{ $user->employee->education == 'SMA' ? 'selected' : '' }}>SMA / Sederajat</option>
                                        <option value="D3" {{ $user->employee->education == 'D3' ? 'selected' : '' }}>D3 / Sederajat</option>
                                        <option value="S1" {{ $user->employee->education == 'S1' ? 'selected' : '' }}>S1 / Sederajat</option>
                                        <option value="S2" {{ $user->employee->education == 'S2' ? 'selected' : '' }}>S2 / Sederajat</option>
                                        <option value="S3" {{ $user->employee->education == 'S3' ? 'selected' : '' }}>S3 / Sederajat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="placeBirth" placeholder="" value="{{ $user->employee->place_of_birth }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control mb-2 datepicker" name="dateBirth" id="datepicker" value="{{ \Carbon\Carbon::parse($user->employee->date_of_birth)->format('d F, Y') }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat Sesuai KTP</label>
                                    <textarea name="address" class="form-control" data-bs-toggle="autosize" placeholder="" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 56px;">{{ $user->employee->address }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Alamat Domisili (Optional)</label>
                                    <textarea name="address2" class="form-control" data-bs-toggle="autosize" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 56px;">{{ $user->employee->address2 }}</textarea>
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
                                        <label class="form-label">Nomor BPJS Kesehatan</label>
                                        <input type="text" class="form-control" name="bpjs" value="{{ $user->employee->bpjs }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor BPJAMSOSTEK</label>
                                        <input type="text" class="form-control" name="bpjamsostek" value="{{ $user->employee->bpjamsostek }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Bank</label>
                                        <select name="bank" type="text" class="form-select tomSelect" placeholder="Pilih bank...">
                                            <option value="" {{ $user->employee->bank == null ? 'selected' : '' }}></option>
                                            @foreach ($bankList as $bank)
                                                <option value="{{ $bank['sandi_bank'] }}" {{ $user->employee->bank == $bank['sandi_bank'] ? 'selected' : '' }}>{{ $bank['nama_bank'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Rekening</label>
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
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" name="position" value="{{ $user->employee->position }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Departemen</label>
                                        <select name="departement" type="text" class="form-select tomSelect" placeholder="Pilih departemen...">
                                            <option value="" {{ $user->employee->departement_id == null ? 'selected' : '' }}></option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->id }}" {{ $user->employee->departement_id == $departement->id ? 'selected' : '' }}>{{ $departement->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Departemen</label>
                                        <select name="subDepartement" type="text" class="form-select tomSelect" placeholder="Pilih sub departemen...">
                                            <option value="" {{ $user->employee->sub_departement_id == null ? 'selected' : '' }}></option>
                                            @foreach ($subDepartements as $subdepartement)
                                                <option value="{{ $subdepartement->id }}" {{ $user->employee->departement_id == $subdepartement->id ? 'selected' : '' }}>{{ $subdepartement->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Perusahaan</label>
                                        <select name="company" type="text" class="form-select tomSelect" placeholder="Pilih perusahaan...">
                                            <option value=""></option>
                                            <option value="PT JUARA ELOK NUSANTARA" {{ $user->employee->company == 'PT JUARA ELOK NUSANTARA' ? 'selected' : '' }}>PT JUARA NUSANTARA</option>
                                            <option value="CV GEMILANG WIRATAMA NUSANTARA" {{ $user->employee->company == 'CV GEMILANG WIRATAMA NUSANTARA' ? 'selected' : '' }}>CV GEMILANG WIRATAMA NUSANTARA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Cabang</label>
                                        <select name="branch" type="text" class="form-select tomSelect" placeholder="Pilih cabang...">
                                            <option value="" {{ $user->employee->branch_id == null ? 'selected' : '' }}></option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}" {{ $user->employee->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Masuk</label>
                                        <input class="form-control mb-2 datepicker" name="joined_at" id="datepicker2" value="{{ \Carbon\Carbon::parse($user->employee->joined_at)->format('d F, Y') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status Kerja</label>
                                        <select name="status" type="text" class="form-select tomSelect" placeholder="Pilih status kerja...">
                                            <option value="" {{ $user->employee->status == null ? 'selected' : '' }}></option>
                                            <option value="TETAP/ PKWTT" {{ $user->employee->status == 'TETAP/ PKWTT' ? 'selected' : '' }}>TETAP/ PKWTT</option>
                                            <option value="KONTRAK/ PKWT" {{ $user->employee->status == 'KONTRAK/ PKWT' ? 'selected' : '' }}>KONTRAK/ PKWT</option>
                                            <option value="MITRA" {{ $user->employee->status == 'MITRA' ? 'selected' : '' }}>MITRA</option>
                                            <option value="PEKERJA HARIAN LEPAS" {{ $user->employee->status == 'PEKERJA HARIAN LEPAS' ? 'selected' : '' }}>PEKERJA HARIAN LEPAS</option>
                                            <option value="TRAINEE" {{ $user->employee->status == 'TRAINEE' ? 'selected' : '' }}>TRAINEE</option>
                                            <option value="Lainnya" {{ $user->employee->status == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kontrak Awal</label>
                                        <input class="form-control mb-2 datepicker" name="start_contract_at" id="datepicker3" value="{{ \Carbon\Carbon::parse($user->employee->start_contract_at)->format('d F, Y') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kontrak Berakhir</label>
                                        @if ($user->employee->status == 'TETAP/ PKWTT')
                                            <input class="form-control mb-2 datepicker" name="end_contract_at" value="" readonly />
                                        @else
                                            <input class="form-control mb-2 datepicker" name="end_contract_at" id="datepicker4" value="{{ \Carbon\Carbon::parse($user->employee->end_contract_at)->format('d F, Y') }}" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Saldo Cuti</label>
                                        <input type="number" class="form-control" name="saldoCuti" value="{{ $user->employee->saldoCuti }}" />
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
        datepicker = document.getElementById('datepicker');
        datepicker2 = document.getElementById('datepicker2');
        datepicker3 = document.getElementById('datepicker3');
        datepicker4 = document.getElementById('datepicker4');

        new Litepicker({
            element: datepicker,
            format: 'D MMMM YYYY',
            lang: 'id-ID',
            dropdowns: {
                minYear: new Date().getFullYear() - 80,
                maxYear: new Date().getFullYear() + 5,
                months: true,
                years: true
            },
            buttonText: {
                previousMonth: '<i role="button" class="ti ti-arrow-narrow-left icon"></i>',
                nextMonth: '<i role="button" class="ti ti-arrow-narrow-right icon"></i>',
            },
        });
        new Litepicker({
            element: datepicker2,
            format: 'D MMMM YYYY',
            lang: 'id-ID',
            dropdowns: {
                minYear: new Date().getFullYear() - 80,
                maxYear: new Date().getFullYear() + 5,
                months: true,
                years: true
            },
            buttonText: {
                previousMonth: '<i role="button" class="ti ti-arrow-narrow-left icon"></i>',
                nextMonth: '<i role="button" class="ti ti-arrow-narrow-right icon"></i>',
            },
        });
        new Litepicker({
            element: datepicker3,
            format: 'D MMMM YYYY',
            lang: 'id-ID',
            dropdowns: {
                minYear: new Date().getFullYear() - 80,
                maxYear: new Date().getFullYear() + 5,
                months: true,
                years: true
            },
            buttonText: {
                previousMonth: '<i role="button" class="ti ti-arrow-narrow-left icon"></i>',
                nextMonth: '<i role="button" class="ti ti-arrow-narrow-right icon"></i>',
            },
        });

        new Litepicker({
            element: datepicker4,
            format: 'D MMMM YYYY',
            lang: 'id-ID',
            dropdowns: {
                minYear: new Date().getFullYear() - 80,
                maxYear: new Date().getFullYear() + 5,
                months: true,
                years: true
            },
            buttonText: {
                previousMonth: '<i role="button" class="ti ti-arrow-narrow-left icon"></i>',
                nextMonth: '<i role="button" class="ti ti-arrow-narrow-right icon"></i>',
            },
        });
    </script>

    <script type="text/javascript">
        $('#formKaryawan').bind('keypress', function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
    </script>
@endsection
