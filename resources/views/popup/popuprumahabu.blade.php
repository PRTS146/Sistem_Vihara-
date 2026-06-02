<div class="modal fade" id="rumahAbuModal" tabindex="-1" aria-labelledby="rumahAbuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="modal-title fw-bold mb-0 d-flex align-items-center" id="rumahAbuModalLabel">
          🏛️ Pemesanan Slot Rumah Abu
        </h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center px-4 pb-4">
        
        <p class="mb-1 text-muted small mt-2">Anda memilih untuk memesan:</p>
        <h5 class="fw-bold mb-4 text-success" id="selectedSlotName">-</h5>

        <div class="bg-light rounded-3 p-3 mb-4 text-start">
          <div class="mb-2">
            <small class="text-muted">Bank</small>
            <div class="fw-bold">BCA</div>
          </div>
          <div class="mb-2">
            <small class="text-muted">Nomor Rekening</small>
            <div class="fw-bold d-flex align-items-center gap-2">
              <span id="rekNumberAbu">1234567890</span>
              <button class="btn btn-sm btn-outline-secondary py-0 px-2"
                      onclick="navigator.clipboard.writeText(document.getElementById('rekNumberAbu').innerText); this.textContent='✓ Copied'; setTimeout(() => this.textContent='Copy', 2000);">
                Copy
              </button>
            </div>
          </div>
          <div>
            <small class="text-muted">Atas Nama</small>
            <div class="fw-bold">Vihara Maha Giri Buddha</div>
          </div>
        </div>

        <p class="text-muted small mb-2">Atau scan QRIS di bawah ini:</p>
        <div class="d-inline-block position-relative mb-3">
          <img src="{{ asset('mainpage/qrcode.png') }}" alt="QRIS Vihara"
               class="img-fluid rounded-3 border shadow-sm" style="max-width: 200px;">
        </div>

        <div class="mt-3 border-top pt-3">
            <p class="text-muted small mb-2">Setelah transfer, klik tombol di bawah untuk konfirmasi ke Admin dan mendapatkan <b>Kode Klaim</b> Anda.</p>
            <a href="#" id="waAdminBtn" target="_blank" class="btn btn-success w-100 rounded-pill fw-bold" style="background-color: #25D366; border-color: #25D366;">
              <i class="bi bi-whatsapp"></i> Hubungi Admin di WA
            </a>
        </div>

      </div>
    </div>
  </div>
</div>