<div class="modal modal-blur fade" tabindex="-1" id="modalImportEmployees">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('app-import-employees') }}" method="POST" id="formImportEmployees" autocomplete="off" spellcheck="false" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                <div class="modal-body">
                    <div>
                        <div class="form-label required">Import Karyawan</div>
                        <input name="file" type="file" class="form-control">
                        <div class="text-danger"><small>Hanya menerima .pdf, .xlsx, .csv</small></div>
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
