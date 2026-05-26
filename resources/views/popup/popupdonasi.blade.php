<div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="donateModalLabel">🙏 Dana / Donasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center px-4 pb-4">
        <p class="text-muted mb-4">Terima kasih atas kebaikan hati Anda. Silakan transfer ke rekening berikut:</p>

        <div class="bg-light rounded-3 p-3 mb-4 text-start">
          <div class="mb-2">
            <small class="text-muted">Bank</small>
            <div class="fw-bold">BCA</div>
          </div>
          <div class="mb-2">
            <small class="text-muted">Nomor Rekening</small>
            <div class="fw-bold d-flex align-items-center gap-2">
              1234567890
              <button class="btn btn-sm btn-outline-secondary py-0 px-2"
                      onclick="navigator.clipboard.writeText('1234567890'); this.textContent='✓ Copied'">
                Copy
              </button>
            </div>
          </div>
          <div>
            <small class="text-muted">Atas Nama</small>
            <div class="fw-bold">Vihara Maha Giri Buddha</div>
          </div>
        </div>

        <p class="text-muted small mb-2">Atau scan QR Code:</p>
        <img src="{{ asset('mainpage/qrcode.png') }}" alt="QR Code Donasi"
             class="img-fluid rounded-3 border" style="max-width: 200px;">

        <p class="text-muted small mt-4 mb-0">Semoga kebaikan Anda membawa berkah. 🙏</p>
      </div>

    </div>
  </div>
</div>