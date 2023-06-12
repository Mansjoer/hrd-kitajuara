<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @hasSection('title')
        <title>@yield('title') - {{ $site_setting['title']->value }} {{ $site_setting['subtitle']->value }}</title>
    @else
        <title>{{ $site_setting['title']->value }} {{ $site_setting['subtitle']->value }}</title>
    @endif
    @include('app.includes.style')
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="{{ asset('app/custom/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('app/custom/js/theme.js') }}"></script>
    <div class="page page-center" id="loader">
        <div class="container container-slim py-4">
            <div class="text-center">
                <div class="mb-3">
                    <a class="navbar-brand navbar-brand-autodark">
                        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                            <a style="text-decoration: none;">
                                <div class="page-pretitle">
                                    {{ $site_setting['title']->value }}
                                </div>
                                <h2 class="page-title">
                                    {{ $site_setting['subtitle']->value }}
                                </h2>
                            </a>
                        </h1>
                    </a>
                </div>
                <div class="text-muted mb-3">Memuat Aplikasi...</div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-indeterminate"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page" id="mainPage" style="display: none;">
        @include('app.includes.header')
        @if (Auth::check())
            @include('app.includes.navbar')
        @endif
        <div class="page-wrapper">
            @hasSection('breadcumb')
                @if (Auth::check())
                    <div class="page-header d-print-none">
                        <div class="container-xl">
                            @yield('breadcumb')
                        </div>
                    </div>
                @endif
            @else
            @endif
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @if (Auth::check())
                        @yield('content')
                        @yield('cmodal')
                    @else
                        <div class="empty">
                            <div class="empty-img">
                                <img src="{{ asset('app/assets/static/illustrations/undraw_sign_in_e6hj.svg') }}" height="250" alt="">
                            </div>
                            <p class="empty-title">{{ $site_setting['title']->value }}</p>
                            <p class="empty-subtitle text-muted">
                                Sepertinya kamu belum login. Silahkan login terlebih dahuhlu.
                            </p>
                            <div class="empty-action">
                                <a role="button" class="btn btn-ghost" data-bs-toggle="modal" data-bs-target="#modalLogin">
                                    <i class="ti ti-login icon"></i>
                                    Login
                                </a>
                            </div>
                        </div>
                        @include('app.modals.auth')
                    @endif
                </div>
            </div>
            {{-- @include('app.includes.footer') --}}
        </div>
    </div>
    @include('app.includes.script')
</body>

</html>
