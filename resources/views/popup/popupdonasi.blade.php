<div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="modal-title fw-bold mb-0 d-flex align-items-center" id="donateModalLabel">
          🙏 Dana / Donasi
          
          <div class="position-relative ms-2" 
               onclick="showManualInfo()" 
               style="cursor: pointer; transition: transform 0.2s;" 
               onmouseover="this.style.transform='scale(1.15)'" 
               onmouseout="this.style.transform='scale(1)'" 
               title="Klik untuk info penting pendaftaran dana">
            
            <svg xmlns="http://www.w3.org/2000/svg" style= "padding: 8px" width="36px" height="36px" fill="#3e3e3e" class="bi bi-bell-fill" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
            </svg>

            <span id="notifDot" class="position-absolute top-0 start-100 translate-middle border border-2 border-white bg-danger rounded-circle" style="width: 11px; height: 11px;"></span>
          </div>

        </h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center px-4 pb-4">
        
        <p class="mb-1 text-muted small mt-2">Tujuan Donasi Anda:</p>
        <h6 class="fw-bold mb-4 text-dark" id="donationPurpose">Dana Public</h6>

        <div class="bg-light rounded-3 p-3 mb-4 text-start">
          <div class="mb-2">
            <small class="text-muted">Bank</small>
            <div class="fw-bold">BCA</div>
          </div>
          <div class="mb-2">
            <small class="text-muted">Nomor Rekening</small>
            <div class="fw-bold d-flex align-items-center gap-2">
              <span id="rekNumber">1234567890</span>
              <button class="btn btn-sm btn-outline-secondary py-0 px-2"
                      onclick="navigator.clipboard.writeText(document.getElementById('rekNumber').innerText); this.textContent='✓ Copied'; setTimeout(() => this.textContent='Copy', 2000);">
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
        <div class="d-inline-block position-relative mb-2">
          
          <img src="{{ asset('mainpage/qrcode.png') }}" alt="QRIS Vihara"
               class="img-fluid rounded-3 border shadow-sm" style="max-width: 220px;">
          
          <br>
          
          <a href="{{ asset('mainpage/qrcode.png') }}" download="QRIS-Vihara-Maha-Giri-Buddha.png" class="btn btn-sm btn-outline-info rounded-pill px-4 mt-3 fw-bold" style="border-color: #3c3c3c; color: #3c3c3c; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#616161'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#3c3c3c';">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download me-1 mb-1" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
            </svg>
            Donwload QRIS
          </a>
          <p class="text-muted small mt-4 mb-0">Semoga kebaikan Anda membawa berkah. 🙏</p>
        </div>
      </div>

    </div>
  </div>
</div>