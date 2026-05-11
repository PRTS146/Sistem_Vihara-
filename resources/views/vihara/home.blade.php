@extends('template.main')

@section('content')

<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>

      
      <a href="#" class="btn btn-warning rounded-pill px-4">Login</a>

    </div>

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


<section id="about" class="py-5">
  <div class="container">

    <h2 class="text-center mb-5">About Vihara</h2>

    
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

    <div class="d-flex gap-3 overflow-auto pb-2" style="cursor: grab;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}"  class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
      <img src="{{ asset('mainpages/placeholder.jpg') }}" class="rounded flex-shrink-0" style="height: 200px; width: 280px; object-fit: cover;">
    </div>

  </div>
</section>
@endsection

