<div style="background-color: #e0f7f7;" class="py-4 px-4">
  <div class="container">
    <div id="heroCarousel" class="carousel slide rounded-4 overflow-hidden shadow-lg"
         data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('mainpage/slide1.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; filter:brightness(60%);">
          <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
            <p class="text-warning fw-bold text-uppercase">Selamat Datang Di</p>
            <h1 class="display-4 fw-bold text-white">Vihara Maha Giri Buddha</h1>
            <p class="text-white">Kami mengajak Anda untuk bergabung bersama kami.</p>
            <div class="d-flex gap-2 mt-2">
              <button class="btn btn-warning rounded-pill px-4" onclick="smoothTo('about')">Tentang Kami</button>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; filter:brightness(60%);">
          <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
            <p class="text-warning fw-bold text-uppercase">Kegiatan Terbaru</p>
            <h1 class="display-4 fw-bold text-white">Events</h1>
            <p class="text-white">Ikuti berbagai kegiatan dan acara bersama komunitas Vihara.</p>
            <div class="d-flex gap-2 mt-2">
              <button class="btn btn-warning rounded-pill px-4" onclick="smoothTo('events')">Lihat Events</button>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('mainpage/slide2.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; filter: brightness(60%);">
          <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
            <p class="text-warning fw-bold text-uppercase">Tempat Peristirahatan</p>
            <h1 class="display-4 fw-bold text-white">Rumah Abu</h1>
            <p class="text-white">Layanan rumah abu yang tenang dan terhormat untuk orang-orang terkasih.</p>
            <div class="d-flex gap-2 mt-2">
              <button class="btn btn-warning rounded-pill px-4" onclick="smoothTo('rumah-abu')">Selengkapnya</button>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; filter: brightness(60%);">
          <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
            <p class="text-warning fw-bold text-uppercase">Apakah anda ingin</p>
            <h1 class="display-4 fw-bold text-white">Dana?</h1>
            <p class="text-white">Setiap donasi Anda membawa berkah bagi sesama.</p>
            <div class="d-flex gap-2 mt-2">
              <button class="btn btn-warning rounded-pill px-4" onclick="smoothTo('donation')">Donate</button>
              <button class="btn btn-outline-light rounded-pill px-4" onclick="smoothTo('campaigns')">Lihat Kampanye</button>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('mainpage/slide3.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; filter:brightness(60%);">
          <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
            <p class="text-warning fw-bold text-uppercase">Momen Bersama</p>
            <h1 class="display-4 fw-bold text-white">Gallery</h1>
            <p class="text-white">Kenangan indah bersama komunitas Vihara Maha Giri Buddha.</p>
            <div class="d-flex gap-2 mt-2">
              <button class="btn btn-warning rounded-pill px-4" onclick="smoothTo('gallery')">Lihat Gallery</button>
            </div>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</div>

<script>
function smoothTo(sectionId) {
  var el = document.getElementById(sectionId);
  if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>