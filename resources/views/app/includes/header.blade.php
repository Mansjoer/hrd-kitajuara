<!-- Navbar -->
<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        @if (Auth::check())
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endif
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/" style="text-decoration: none;">
                <div class="page-pretitle">
                    {{ $site_setting['title']->value }}
                </div>
                <h2 class="page-title">
                    {{ $site_setting['subtitle']->value }}
                </h2>
                <h5 class="page-pretitle">
                    Administrator
                </h5>
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            {{-- @if (Auth::check())
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                        <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                            <i class="ti ti-headset icon"></i>
                            Bantuan
                        </a>
                    </div>
                </div>
            @endif --}}
            <div class="d-none d-md-flex">
                <a role="button" class="nav-link px-0" id="buttonChangeTheme" title="Mode gelap" data-bs-toggle="tooltip" data-bs-placement="left">
                    <i class="icon ti ti-moon" id="themeIcon"></i>
                </a>
                @if (Auth::check())
                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <span data-bs-toggle="dropdown" tabindex="-1" aria-label="Notifikasi">
                            <a role="button" class="nav-link px-0" title="Notifikasi" data-bs-toggle="tooltip" data-bs-placement="left">
                                <i class="ti ti-bell icon"></i>
                                <span class="badge bg-red"></span>
                            </a>
                        </span>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Notifikasi</h3>
                                </div>
                                <div class="list-group list-group-flush list-group-hoverable">
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            {{-- <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div> --}}
                                            <div class="col text-truncate">
                                                {{-- <a href="#" class="text-body d-block">Absen Masuk</a> --}}
                                                <div class="d-block text-muted mt-n1">
                                                    Notifikasi akan bekerja disaat semua sistem selesai
                                                </div>
                                            </div>
                                            {{-- <div class="col-auto">
                                                <a role="button" class="list-group-item-actions" style="text-decoration: none;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="left">
                                                    <i class="ti ti-trash icon text-red"></i>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                            <div class="col text-truncate">
                                                <a href="#" class="text-body d-block">Absen Masuk</a>
                                                <div class="d-block text-muted text-truncate mt-n1">
                                                    Aditya Ramadhana baru saja melakukan absen masuk!
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a role="button" class="list-group-item-actions" style="text-decoration: none;" title="Delete" data-bs-toggle="tooltip" data-bs-placement="left">
                                                    <i class="ti ti-trash icon text-red"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if (Auth::check() && Auth::user()->isAdmin == 1)
                <div class="nav-item dropdown ms-3">
                    <a role="button" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        @if (Auth::user()->employee->profile_path == null)
                            <span class="avatar avatar-sm" style="background-image: url('https://app.kitajuara.co.id/custom/img/user-default.webp')"></span>
                        @else
                            <span class="avatar avatar-sm" style="background-image: url('https://app.kitajuara.co.id/{{ Auth::user()->employee->profile_path }}')"></span>
                        @endif
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ Auth::user()->name }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('app-my-profile') }}" class="dropdown-item">Profile</a>
                        {{-- <a href="./settings.html" class="dropdown-item">Settings</a> --}}
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('app-auth-logout') }}" class="dropdown-item">Logout</a>
                    </div>
                </div>
            @else
                <div class="nav-item dropdown ms-3">
                    <a role="button" class="btn btn-ghost" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        <i class="ti ti-login icon"></i>
                        Login
                    </a>
                </div>
            @endif
        </div>
    </div>
</header>
