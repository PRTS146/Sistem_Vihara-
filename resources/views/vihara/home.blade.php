@extends('template.home')

@section('content')


      

    

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

  <div class="carousel-indicators">
    @if($events->count() > 0)
      @foreach($events as $i => $event)
        <button type="button" data-bs-target="#heroCarousel"
                data-bs-slide-to="{{ $i }}"
                {{ $i === 0 ? 'class=active' : '' }}></button>
      @endforeach
    @else
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
    @endif
  </div>

  <div class="carousel-inner">

    @if($events->count() > 0)
      @foreach($events as $i => $event)
        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
          <img src="{{ asset('mainpage/slide1.jpg') }}" class="d-block w-100"
               style="height: 100vh; object-fit: cover;">
          <div class="carousel-caption d-flex flex-column align-items-start text-start"
               style="top: 50%; transform: translateY(-50%); bottom: auto;">
            <p class="text-warning fw-bold text-uppercase">{{ $event->event_date }}</p>
            <h1 class="display-4 fw-bold text-white">{{ $event->event_name }}</h1>
            <p class="text-white">{{ $event->event_description }}</p>
            <div class="d-flex gap-2 mt-2">
              <a href="#" class="btn btn-warning rounded-pill px-4"
                 data-bs-toggle="modal"
                 data-bs-target="#joinModal"
                 data-name="{{ $event->event_name }}"
                 data-date="{{ $event->event_date }}"
                 data-id="{{ $event->event_id }}">
                Daftar Sekarang
              </a>
            </div>
          </div>
        </div>
      @endforeach

    @else
      <div class="carousel-item active">
        <img src="{{ asset('mainpage/slide1.jpg') }}" class="d-block w-100"
             style="height: 100vh; object-fit: cover;">
        <div class="carousel-caption d-flex flex-column align-items-start text-start"
             style="top: 50%; transform: translateY(-50%); bottom: auto;">
          <p class="text-warning fw-bold text-uppercase">Selamat Datang Di</p>
          <h1 class="display-4 fw-bold text-white">Vihara Maha Giri Buddha</h1>
          <p class="text-white">Kami mengajak Anda untuk bergabung bersama kami.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ asset('mainpage/placeholder.jpg') }}" class="d-block w-100"
             style="height: 100vh; object-fit: cover;">
        <div class="carousel-caption d-flex flex-column align-items-start text-start"
             style="top: 50%; transform: translateY(-50%); bottom: auto;">
          <p class="text-warning fw-bold text-uppercase">Apakah anda ingin</p>
          <h1 class="display-4 fw-bold text-white">Dana?</h1>
          <div class="d-flex gap-2 mt-2">
            <a href="#" class="btn btn-warning rounded-pill px-4"
               data-bs-toggle="modal" data-bs-target="#donateModal">Donate</a>
          </div>
        </div>
      </div>
    @endif

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>



<section id="about" class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill">EVENTS</span>
    </div>


  <div class="position-relative px-5">

    <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">

      {{-- Indicators --}}
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="0" class="active bg-warning"></button>
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="1" class="bg-warning"></button>
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="2" class="bg-warning"></button>
      </div>

      <div class="carousel-inner pb-5">
          <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
      </button>

        {{-- SLIDE 1 --}}
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
                  data-bs-toggle="modal"
                  data-bs-target="#joinModal"
                  data-name="Perayaan Waisak 2025"
                  data-date="12 Mei 2025"
                  data-id="1">
                  Daftar Sekarang
                </a>

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
                       data-bs-toggle="modal"
                       data-bs-target="#joinModal"
                       data-name="Doa Bersama"
                       data-date="21 Mei 2025"
                       data-id="2">
                      Daftar Sekarang
                    </a>
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
                       data-bs-toggle="modal"
                       data-bs-target="#joinModal"
                       data-name="Meditasi Pagi"
                       data-date="1 Juni 2025"
                       data-id="3">
                      Daftar Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        {{-- SLIDE 2 --}}
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
                       data-bs-toggle="modal"
                       data-bs-target="#joinModal"
                       data-name="Bakti Sosial"
                       data-date="15 Juni 2025"
                       data-id="4">
                      Daftar Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                  <span class="badge bg-warning text-dark mb-2">15 Juni 2025</span>
                  <h5 class="fw-bold">Bakti Sosial</h5>
                  <p class="text-muted small">Kegiatan bakti sosial bersama masyarakat sekitar Vihara.</p>
                  <div class="mt-auto">
                    <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                       data-bs-toggle="modal"
                       data-bs-target="#joinModal"
                       data-name="Bakti Sosial"
                       data-date="15 Juni 2025"
                       data-id="4">
                      Daftar Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                  <span class="badge bg-warning text-dark mb-2">15 Juni 2025</span>
                  <h5 class="fw-bold">Bakti Sosial</h5>
                  <p class="text-muted small">Kegiatan bakti sosial bersama masyarakat sekitar Vihara.</p>
                  <div class="mt-auto">
                    <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                       data-bs-toggle="modal"
                       data-bs-target="#joinModal"
                       data-name="Bakti Sosial"
                       data-date="15 Juni 2025"
                       data-id="4">
                      Daftar Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>

              

          </div>
        </div>

      </div>

      {{-- Controls --}}
      <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" style="filter: invert(1); justify-content: flex-start;"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" style="filter: invert(1); justify-content: flex-end;"></span>
      </button>

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
<button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev" style="width: -50px; left: 0;">
  <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next" style="width: -50px; right: 0;">
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

