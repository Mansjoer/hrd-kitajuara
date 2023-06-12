<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    {{-- <li class="list-inline-item">
                        <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                            <i class="ti ti-headset icon"></i>
                            Support / Help
                        </a>
                    </li> --}}
                    @if (Auth::check())
                        <li class="list-inline-item">
                            <a href="{{ route('app-auth-logout') }}" target="_blank" class="link-secondary" rel="noopener">
                                <i class="ti ti-logout icon text-pink "></i>
                                Logout
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; {{ $site_setting['footerCopyrightYear']->value }}
                        <a href="." class="link-secondary" style="text-decoration: none;">{{ $site_setting['footerCopyrightName']->value }}</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="./changelog.html" class="link-secondary" rel="noopener">
                            {{ Str::lower($version->name) }} v{{ $version->version }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
