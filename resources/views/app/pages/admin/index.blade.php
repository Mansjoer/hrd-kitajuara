@extends('app.layouts.master')

@section('title')
    Admin
@endsection

@section('breadcumb')
    <div class="row g-2 align-items-center">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                App
            </div>
            <h2 class="page-title">
                Admin
            </h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="row g-4 ">
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 16px;">
                <div class="col-auto ">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Pengaturan Aplikasi</h3>
                        </div>
                    </div>
                </div>
                <div class="col-auto mt-3">
                    <div class="card">
                        <form action="{{ route('app-admin-post-update-settings') }}" method="POST" spellcheck="false" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="inputTitle">Title</label>
                                    <input id="inputTitle" name="title" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="1" value="{{ $settingTitle->value }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputSubTitle">Subtitle</label>
                                    <input id="inputSubTitle" name="subtitle" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="2" value="{{ $settingSubtitle->value }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputFooterCopyrightName">Footer Copyright Name</label>
                                    <input id="inputFooterCopyrightName" name="footerName" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="3" value="{{ $settingFooterCopyrightName->value }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputFooterCopyrightYear">Footer Copyright Year</label>
                                    <input id="inputFooterCopyrightYear" name="footerYear" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="4" value="{{ $footerCopyrightYear->value }}">
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="col-auto ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Change Logs</h3>
                        <div class="card-actions">
                            <a role="button" class="btn btn-icon btn-primary" id="" data-bs-toggle="modal" data-bs-target="#modalNewChangeLog">
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
            </div>
            @foreach ($changelogs as $changelog)
                <div id="divChangeLog">
                    <div class="col-auto mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $changelog->name }} v{{ $changelog->version }}</h3>
                                <div class="card-actions btn-actions">
                                    <a href="#" class="btn-action text-info" data-bs-toggle="modal" data-bs-target="#{{ $changelog->slug }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="btn-action text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7h16"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            <path d="M10 12l4 4m0 -4l-4 4"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal modal-blur fade" id="{{ $changelog->slug }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $changelog->name }} v{{ $changelog->version }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! $changelog->data !!}
                                </div>
                                <div class="modal-body d-flex">
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                        {{ $changelog->totalView }}
                                    </span>
                                    <span class="ms-auto">{{ \Carbon\Carbon::parse($changelog->created_at)->translatedFormat('d F, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal modal-blur fade" id="modalNewChangeLog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form action="{{ route('app-admin-change-log-add') }}" method="POST" spellcheck="false" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <a class="navbar-brand navbar-brand-autodark">
                                <h2>Change Log Baru</h2>
                            </a>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputNama">Nama</label>
                            <input id="inputNama" name="name" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputVersi">Versi</label>
                            <input id="inputVersi" name="version" type="text" class="form-control" placeholder="" autocomplete="off" tabindex="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputData">Data</label>
                            <textarea class="form-control" name="data" id="inputData" cols="30" rows="10"></textarea>
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
    <script src="{{ asset('app/assets/libs/tinymce/tinymce.min.js?1684106062') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let options = {
                selector: '#inputData',
                menubar: false,
                statusbar: false,
                toolbar: 'undo redo | formatselect blockquote forecolor | ' +
                    'bold italic | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            tinyMCE.init(options);
        })
    </script>
@endsection
