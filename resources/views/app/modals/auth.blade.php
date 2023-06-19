<div class="modal modal-blur fade" tabindex="-1" id="modalLogin" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formLogin" autocomplete="off" spellcheck="false" novalidate>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <a class="navbar-brand navbar-brand-autodark">
                            <h2>HRD Kitajuara</h2>
                        </a>
                        <p class="empty-subtitle text-muted">
                            Silahkan login menggunakan akun kamu!
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input id="inputLoginNik" type="text" class="form-control" placeholder="DBH0000" autocomplete="off" tabindex="1" style="text-transform: uppercase;">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Kata Sandi
                            {{-- <span class="form-label-desc
                            
                            ription">
                                <a href="./forgot-password.html">I forgot password</a>
                            </span> --}}
                        </label>
                        <div class="input-group input-group-flat">
                            <input id="inputLoginPassword" type="password" class="form-control" placeholder="******" autocomplete="off" tabindex="2">
                            <span class="input-group-text">
                                <a role="button" class="link-secondary toggle-password" data-bs-toggle="tooltip" data-animation="true" aria-label="Lihat Kata Sandi" data-bs-original-title="Lihat Kata Sandi" style="text-decoration: none;">
                                    <i class="ti ti-eye icon toggle-password-icon"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input id="inputLoginRemember" type="checkbox" class="form-check-input" tabindex="3">
                            <span class="form-check-label">Ingat saya?</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmitLoginForm" tabindex="4">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" tabindex="-1" id="modalLoginSuccess" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-status bg-success"></div>
            <div class="modal-body text-center py-4">
                <i class="ti ti-circle-check icon mb-3 text-success icon-lg"></i>
                <h3>LOGIN BERHASIL</h3>
                <div class="text-muted">Kamu akan diarahkan dalam 3 detik.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" tabindex="-1" id="modalLoginError" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <i class="ti ti-alert-triangle icon mb-3 text-danger icon-lg"></i>
                <h3>LOGIN GAGAL</h3>
                <div class="text-muted">NIK atau kata sandi salah.</div>
            </div>
        </div>
    </div>
</div>
