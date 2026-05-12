@extends('template.main')

@section('content')

   @extends('components.homenavbar')

      

    

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

  
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
  </div>

  
  <div class="carousel-inner">

     <!-- 1st -->
      
    <div class="carousel-item active">
      <img src="{{ asset('mainpage/slide1.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Vihara">
      <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
        <p class="text-warning fw-semibold text-uppercase ls-wide mb-1 fw-bold fs-1">Selamat Datang Di</p>
        <h1 class="display-4 fw-bold text-white">Vihara Maha Giri Buddha</h1>
        <p class=".text-secondary">Kami Dari Vihara Maha Giri Buddha Mengajak Anda Untuk Bergabung, Silakan Ketahui Lebih Banyak Tentang Kami</p>
        <div class="d-flex gap-2 mt-2">
          <a href="{{ route('dashboard') }}" class="btn btn-warning rounded-pill px-4">About Us</a>
          <a href="#" class="btn btn-outline-light rounded-pill px-4">Contact Us</a>
        </div>
      </div>
    </div>

    <!-- second -->
    <div class="carousel-item">
     <img src="{{ asset('mainpage/slide2.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Vihara 2">
      <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;" >
        <p class="text-warning fw-semibold text-uppercase mb-1">Temukan Kedamaian</p>
        <h1 class="display-4 fw-bold text-white">Ketenangan & Spiritualitas</h1>
        <p class=".text-secondary">Sebuah tempat suci untuk meditasi dan refleksi spiritual bersama komunitas kami.</p>
        <div class="d-flex gap-2 mt-2">
          <a href="#" class="btn btn-warning rounded-pill px-4">Kalender Acara</a>
          <a href="#" class="btn btn-outline-light rounded-pill px-4">Lokasi Kami</a>
        </div>
      </div>
    </div>

    <!-- third impact -->
    <div class="carousel-item">
      <img src="{{ asset('mainpage/slide3.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Vihara 3">
      <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
        <p class="text-warning fw-semibold text-uppercase mb-1 fw-bold">Bergabung Bersama Kami</p>
        <h1 class="display-4 fw-bold text-white">Komunitas yang Hangat</h1>
        <p class=".text-secondary">Jadilah bagian dari keluarga besar Vihara Maha Giri Buddha.</p>
        <div class="d-flex gap-2 mt-2">
          <a href="#" class="btn btn-warning rounded-pill px-4">Daftar Sekarang</a>
          <a href="#" class="btn btn-outline-light rounded-pill px-4">Hubungi Kami</a>
        </div>
      </div>
    </div>

  </div>

  <!-- this is button the <      > of the page -->
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>


<section id="Titleabout" class="py-5 bg-warning">
  <div class="container">

    <h2 class="text-center mb-5">About Vihara</h2>

  </section>
   <section id="about" class="py-5">
    <div class="container">
    <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" >
      </div>
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt ut mi ac dignissim</p>
      </div>
    </div>

   
    <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
      </div>
      <div class="col-md-6">
        <div class="row g-2">
          <div class="col-6"><img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" ></div>
          <div class="col-6"><img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" ></div>
          <div class="col-6"><img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" ></div>
          <div class="col-6"><img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" ></div>
        </div>
      </div>
    </div>

  
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="row g-2">
          <div class="col-6"><img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" ></div>
          <div class="col-6"><img src="{{ asset('mainpage/placeholder.jpg') }}" class="img-fluid rounded" ></div>
        </div>
      </div>
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
      </div>
    </div>

  </div>
</section>

<section id="gallery" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Gallery</h2>

    <div id="galleryCarousel" class="carousel slide position-relative" data-bs-ride="carousel" style="padding: 0 40px;">
      <div class="carousel-inner">

        <!-- Slide 1: shows 4 images -->
        <div class="carousel-item active">
          <div class="d-flex gap-3">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
          </div>
        </div>

        <!-- Slide 2: next 4 images -->
        <div class="carousel-item">
          <div class="d-flex gap-3">
            <img src="{{ asset('mainpage/slide1.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
            <img src="{{ asset('mainpage/slide2.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 220px; width: calc(25% - 12px); object-fit: cover;">
          </div>
        </div>

      </div>

      <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev" style="width: 40px; left: 0;">
    <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next" style="width: 40px; right: 0;">
    <span class="carousel-control-next-icon" style="filter: invert(1);"></span>
  </button>


    </div>
  </div>
</section>


<section>
  <div>
</div>
</section>
  


 
@endsection

