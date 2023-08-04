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
                    @if (Auth::check() && Auth::user()->role_id == 2)
                        <li class="nav-item {{ Request::is('admin*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('app-admin') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-shield-chevron icon"></i>
                                </span>
                                <span class="nav-link-title">
                                    Admin
                                </span>
                            </a>
                        </li>
                    @endif
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
