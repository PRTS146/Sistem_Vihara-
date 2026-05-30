<section id="gallery" style="background-color: #e0f7f7;" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill fs-5">Gallery</span>
    </div>
    <div class="bg-white rounded-4 p-4 shadow-lg" style="box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important;">

      <div class="lightbox-overlay" id="lightbox" onclick="closeLightbox(event)">
        <div class="lightbox-inner">
          <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
          <img src="" alt="" id="lightbox-img">
          <p class="lightbox-caption" id="lightbox-caption"></p>
        </div>
      </div>

      <div class="row g-2">
        <div class="col-12 col-md-3">
          <div class="gallery-card" onclick="openLightbox('{{ asset('mainpage/placeholder.jpg') }}', 'Vihara Utama')">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Vihara Utama">
            <p class="gallery-text">Vihara Utama</p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="gallery-card" onclick="openLightbox('{{ asset('mainpage/placeholder.jpg') }}', 'Gerbang Masuk')">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Gerbang Masuk">
            <p class="gallery-text">Gerbang Masuk</p>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="gallery-card" onclick="openLightbox('{{ asset('mainpage/placeholder.jpg') }}', 'Taman Vihara')">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Taman Vihara">
            <p class="gallery-text">Taman Vihara</p>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="gallery-card" onclick="openLightbox('{{ asset('mainpage/placeholder.jpg') }}', 'Aula Utama')">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Aula Utama">
            <p class="gallery-text">Aula Utama</p>
          </div>
        </div>
        <div class="col-12 col-md-5">
          <div class="gallery-card" onclick="openLightbox('{{ asset('mainpage/placeholder.jpg') }}', 'Patung Buddha')">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Patung Buddha">
            <p class="gallery-text">Patung Buddha</p>
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="gallery-card" onclick="openLightbox('{{ asset('mainpage/placeholder.jpg') }}', 'Area Meditasi')">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Area Meditasi">
            <p class="gallery-text">Area Meditasi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>