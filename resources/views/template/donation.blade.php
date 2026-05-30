<section id="donation" style="background-color: #e0f7f7;" class="py-5">
  <div class="container">

    <div class="text-center mb-4">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill fs-5">Donation</span>
    </div>

    <div class="row justify-content-center mb-4">
      <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
          <h4 class="fw-bold mb-3">Dana Public</h4>
          <p class="text-muted mb-4">Dana public.</p>
          <p class="small text-muted mb-4">Setiap donasi, sekecil apapun, sangat berharga. Semoga kebaikan Anda membawa berkah. 🙏</p>
          <div class="text-center mt-2">
            <button type="button" class="btn btn-warning rounded-pill px-5 py-2 fw-bold shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#donateModal">Mulai Berdonasi</button>
          </div>
        </div>
      </div>
    </div>

    <section id="campaigns">
      <div class="mb-4 text-start">
        <h2 class="fw-bold">Bantu Mewujudkan Harapan</h2>
        <p class="text-muted">Pilih kampanye donasi di bawah ini untuk mulai berkontribusi.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden"
               role="button" data-bs-toggle="modal" data-bs-target="#donateModal"
               style="cursor:pointer; transition:transform 0.2s;"
               onmouseover="this.style.transform='translateY(-5px)'"
               onmouseout="this.style.transform='translateY(0)'">
            <img src="{{ asset('mainpage/slide1.jpg') }}" class="card-img-top w-100" style="height:220px;object-fit:cover;">
            <div class="card-body p-4 d-flex flex-column">
              <h5 class="card-title fw-bold mb-4">Pembangunan Gedung Serbaguna Vihara</h5>
              <div class="mt-auto">
                <div class="progress mb-2 bg-secondary bg-opacity-25" style="height:6px;border-radius:10px;">
                  <div class="progress-bar bg-success" style="width:75%;"></div>
                </div>
                <div class="fw-bold fs-6 text-dark">Rp 75.000.000 <span class="text-muted fw-normal small">raised</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden"
               role="button" data-bs-toggle="modal" data-bs-target="#donateModal"
               style="cursor:pointer; transition:transform 0.2s;"
               onmouseover="this.style.transform='translateY(-5px)'"
               onmouseout="this.style.transform='translateY(0)'">
            <img src="{{ asset('mainpage/slide2.jpg') }}" class="card-img-top w-100" style="height:220px;object-fit:cover;">
            <div class="card-body p-4 d-flex flex-column">
              <h5 class="card-title fw-bold mb-4">Dana Operasional & Kegiatan Sosial Tahunan</h5>
              <div class="mt-auto">
                <div class="progress mb-2 bg-secondary bg-opacity-25" style="height:6px;border-radius:10px;">
                  <div class="progress-bar bg-success" style="width:45%;"></div>
                </div>
                <div class="fw-bold fs-6 text-dark">Rp 45.000.000 <span class="text-muted fw-normal small">raised</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden"
               role="button" data-bs-toggle="modal" data-bs-target="#donateModal"
               style="cursor:pointer; transition:transform 0.2s;"
               onmouseover="this.style.transform='translateY(-5px)'"
               onmouseout="this.style.transform='translateY(0)'">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top w-100" style="height:220px;object-fit:cover;">
            <div class="card-body p-4 d-flex flex-column">
              <h5 class="card-title fw-bold mb-4">Bantuan Kasih Sembako untuk Warga Sekitar</h5>
              <div class="mt-auto">
                <div class="progress mb-2 bg-secondary bg-opacity-25" style="height:6px;border-radius:10px;">
                  <div class="progress-bar bg-success" style="width:90%;"></div>
                </div>
                <div class="fw-bold fs-6 text-dark">Rp 18.000.000 <span class="text-muted fw-normal small">raised</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</section>