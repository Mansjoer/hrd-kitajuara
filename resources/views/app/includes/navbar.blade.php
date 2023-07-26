<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-home icon"></i>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('attendances*') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('app-attendance') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-calendar-stats icon"></i>
                            </span>
                            <span class="nav-link-title">
                                Kehadiran
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ (Request::is('employees*') ? 'active' : '' || Request::is('users*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app-employees') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-users icon"></i>
                            </span>
                            <span class="nav-link-title">
                                Karyawan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('structural*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app-structural') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-briefcase icon"></i>
                            </span>
                            <span class="nav-link-title">
                                Struktural
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-building icon"></i>
                            </span>
                            <span class="nav-link-title">
                                Cabang
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-adjustments-alt icon"></i>
                            </span>
                            <span class="nav-link-title">
                                Pengaturan
                            </span>
                        </a>
                    </li>
                    {{-- @if (Auth::user()->isAdmin == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-settings-2 icon"></i>
                                </span>
                                <span class="nav-link-title">
                                    Admin
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" rel="noopener">
                                    <i class="ti ti-shield-cog icon icon-inline me-1"></i>
                                    Roles
                                </a>
                                <a class="dropdown-item" href="#" rel="noopener">
                                    <i class="ti ti-user-cog icon icon-inline me-1"></i>
                                    Users
                                </a>
                            </div>
                        </li>
                    @endif --}}
                </ul>
                {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <a class="nav-link">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-clock icon"></i>
                        </span>
                        <span class="nav-link-title" id="#date">

                        </span>
                    </a>
                </div> --}}
                {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="" method="GET" autocomplete="off" novalidate spellcheck="false" autocomplete="off">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <i class="ti ti-search icon"></i>
                            </span>
                            <input type="text" name="cari" class="form-control" placeholder="Cari sesuatu..." aria-label="Cari sesuatu...">
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</header>
