<section id="events" style="background-color: #e0f7f7;" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill">EVENTS</span>
    </div>
    <div class="bg-white rounded-4 p-4 shadow-lg" style="box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important;">
      <div class="position-relative px-4">
        <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="0" class="active bg-warning"></button>
            <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="1" class="bg-warning"></button>
          </div>
          <div class="carousel-inner pb-4">
            <div class="carousel-item active">
              <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                  <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                      <span class="badge bg-warning text-dark mb-2">12 Mei 2025</span>
                      <h5 class="fw-bold">Perayaan Waisak 2025</h5>
                      <p class="text-muted small">Kami mengajak anda untuk mengikuti perayaan Waisak bersama komunitas Vihara.</p>
                      <div class="mt-auto">
                        <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                           data-bs-toggle="modal" data-bs-target="#joinModal"
                           data-name="Perayaan Waisak 2025" data-date="12 Mei 2025" data-id="1">Daftar Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                      <span class="badge bg-warning text-dark mb-2">21 Mei 2025</span>
                      <h5 class="fw-bold">Doa Bersama</h5>
                      <p class="text-muted small">Kegiatan doa bersama seluruh umat Vihara Maha Giri Buddha.</p>
                      <div class="mt-auto">
                        <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                           data-bs-toggle="modal" data-bs-target="#joinModal"
                           data-name="Doa Bersama" data-date="21 Mei 2025" data-id="2">Daftar Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                      <span class="badge bg-warning text-dark mb-2">1 Juni 2025</span>
                      <h5 class="fw-bold">Meditasi Pagi</h5>
                      <p class="text-muted small">Sesi meditasi pagi untuk menemukan ketenangan jiwa dan raga.</p>
                      <div class="mt-auto">
                        <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                           data-bs-toggle="modal" data-bs-target="#joinModal"
                           data-name="Meditasi Pagi" data-date="1 Juni 2025" data-id="3">Daftar Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                  <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                      <span class="badge bg-warning text-dark mb-2">15 Juni 2025</span>
                      <h5 class="fw-bold">Bakti Sosial</h5>
                      <p class="text-muted small">Kegiatan bakti sosial bersama masyarakat sekitar Vihara.</p>
                      <div class="mt-auto">
                        <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                           data-bs-toggle="modal" data-bs-target="#joinModal"
                           data-name="Bakti Sosial" data-date="15 Juni 2025" data-id="4">Daftar Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev" style="width: 40px; left: 0;">
            <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next" style="width: 40px; right: 0;">
            <span class="carousel-control-next-icon" style="filter: invert(1);"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>