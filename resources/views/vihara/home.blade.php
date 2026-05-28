@extends('template.home')

@section('content')


      

    

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

  <div class="carousel-indicators">
    @if($events->count() > 0)
      @foreach($events as $i => $event)
        <button type="button" 
                data-bs-target="#heroCarousel"
                data-bs-slide-to="{{ $i }}"
                class="{{ $i === 0 ? 'active' : '' }}"></button>
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
          <img src="{{ asset('mainpage/slide1.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
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
        <img src="{{ asset('mainpage/slide1.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;">
        <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
          <p class="text-warning fw-bold text-uppercase">Selamat Datang Di</p>
          <h1 class="display-4 fw-bold text-white">Vihara Maha Giri Buddha</h1>
          <p class="text-white">Kami mengajak Anda untuk bergabung bersama kami.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ asset('mainpage/placeholder.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;">
        <div class="carousel-caption d-flex flex-column align-items-start text-start" style="top: 50%; transform: translateY(-50%); bottom: auto;">
          <p class="text-warning fw-bold text-uppercase">Apakah anda ingin</p>
          <h1 class="display-4 fw-bold text-white">Dana?</h1>
          <div class="d-flex gap-2 mt-2">
            <a href="#" class="btn btn-warning rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#donateModal">
              Donate
            </a>
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
  </div>


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

<section id="donation" class="py-5">
  <div class="container">
    
    <div class="text-center mb-5">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill shadow-sm shadow p-3 mb-5">Donation</span>
      <h2 class="mt-4 fw-bold">Dana Public</h2>
      <p class="text-muted">Terima kasih atas kebaikan hati Anda. Bantuan Anda sangat berarti bagi kami.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
          <h4 class="fw-bold mb-3">Dana public</h4>
          <p class="text-muted mb-4">Dana public.</p>
          
          <p class="small text-muted mb-4">Setiap donasi, sekecil apapun, sangat berharga. Semoga kebaikan Anda membawa berkah. 🙏</p>
          
          <div class="text-center mt-2">
            <button type="button" class="btn btn-warning rounded-pill px-5 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#donateModal">
              Mulai Berdonasi
            </button>
          </div>
        </div>
      </div>
    </div>
   
<br></br>
<section id="campaigns" class="py-5 bg-light">
  <div class="container">
    
    <div class="mb-5 text-start">
      <h2 class="fw-bold">Bantu Mewujudkan Harapan</h2>
      <p class="text-muted">Pilih kampanye donasi di bawah ini untuk mulai berkontribusi.</p>
    </div>

    <div class="row g-4">
      
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden" 
             role="button" data-bs-toggle="modal" data-bs-target="#donateModal" 
             style="cursor: pointer; transition: transform 0.2s;" 
             onmouseover="this.style.transform='translateY(-5px)'" 
             onmouseout="this.style.transform='translateY(0)'">
          
          <div class="position-relative">
            <img src="{{ asset('mainpage/slide1.jpg') }}" class="card-img-top w-100" alt="Pembangunan" style="height: 220px; object-fit: cover;">
          
          </div>

          <div class="card-body p-4 d-flex flex-column">
            <h5 class="card-title fw-bold mb-4">Pembangunan Gedung Serbaguna Vihara</h5>
            
            <div class="mt-auto">
              <div class="progress mb-2 bg-secondary bg-opacity-25" style="height: 6px; border-radius: 10px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              
              <div class="fw-bold fs-6 text-dark">
                Rp 75.000.000 <span class="text-muted fw-normal small">raised</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden" 
             role="button" data-bs-toggle="modal" data-bs-target="#donateModal" 
             style="cursor: pointer; transition: transform 0.2s;" 
             onmouseover="this.style.transform='translateY(-5px)'" 
             onmouseout="this.style.transform='translateY(0)'">
          
          <div class="position-relative">
            <img src="{{ asset('mainpage/slide2.jpg') }}" class="card-img-top w-100" alt="Operasional" style="height: 220px; object-fit: cover;">
          </div>

          <div class="card-body p-4 d-flex flex-column">
            <h5 class="card-title fw-bold mb-4">Dana Operasional & Kegiatan Sosial Tahunan</h5>
            
            <div class="mt-auto">
              <div class="progress mb-2 bg-secondary bg-opacity-25" style="height: 6px; border-radius: 10px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="fw-bold fs-6 text-dark">
                Rp 45.000.000 <span class="text-muted fw-normal small">raised</span>
              </div>
            </div>
          </div>
        </div>
      </div>

       <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden" 
             role="button" data-bs-toggle="modal" data-bs-target="#donateModal" 
             style="cursor: pointer; transition: transform 0.2s;" 
             onmouseover="this.style.transform='translateY(-5px)'" 
             onmouseout="this.style.transform='translateY(0)'">
          
          <div class="position-relative">
            <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top w-100" alt="Bantuan" style="height: 220px; object-fit: cover;">
            <span class="position-absolute bottom-0 start-0 m-2 badge bg-dark bg-opacity-75 rounded-pill px-3 py-2 fw-normal">
              
            </span>
          </div>

          <div class="card-body p-4 d-flex flex-column">
            <h5 class="card-title fw-bold mb-4">Bantuan Kasih Sembako untuk Warga Sekitar</h5>
            
            <div class="mt-auto">
              <div class="progress mb-2 bg-secondary bg-opacity-25" style="height: 6px; border-radius: 10px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="fw-bold fs-6 text-dark">
                Rp 18.000.000 <span class="text-muted fw-normal small">raised</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

  </div>
</section>
        
          
        </div>
      </div>

    </div>
  </div>
</section>

<section id="gallery" class="py-5">
  <div class="container-fluid px-4">
    <h2 class="text-center mb-4 fw-bold">Gallery</h2>
   
    <div class="d-flex gap-2" style="height: 420px;">
      
      <!-- Item 1 -->
      <label class="gallery-item position-relative overflow-hidden">
        <input type="radio" name="gallery" id="g1" hidden checked>
        <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Vihara Utama" class="gallery-img">
        <span class="gallery-label">Vihara Utama</span>
        <div class="gallery-button-wrapper">
          <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold">Open?</a>
        </div>
      </label>

      <!-- Item 2 -->
      <label class="gallery-item position-relative overflow-hidden">
        <input type="radio" name="gallery" id="g2" hidden>
        <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Gerbang Masuk" class="gallery-img">
        <span class="gallery-label">Gerbang Masuk</span>
        <div class="gallery-button-wrapper">
          <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold">Open?</a>
        </div>
      </label>

      <!-- Item 3 -->
      <label class="gallery-item position-relative overflow-hidden">
        <input type="radio" name="gallery" id="g3" hidden>
        <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Taman Vihara" class="gallery-img">
        <span class="gallery-label">Taman Vihara</span>
        <div class="gallery-button-wrapper">
          <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold">Open?</a>
        </div>
      </label>

      <!-- Item 4 -->
      <label class="gallery-item position-relative overflow-hidden">
        <input type="radio" name="gallery" id="g4" hidden>
        <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Aula Utama" class="gallery-img">
        <span class="gallery-label">Aula Utama</span>
        <div class="gallery-button-wrapper">
          <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold">Open?</a>
        </div>
      </label>

      <!-- Item 5 -->
      <label class="gallery-item position-relative overflow-hidden">
        <input type="radio" name="gallery" id="g5" hidden>
        <img src="{{ asset('mainpage/placeholder.jpg') }}" alt="Patung Buddha" class="gallery-img">
        <span class="gallery-label">Patung Buddha</span>
        <div class="gallery-button-wrapper">
          <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold">Open?</a>
        </div>
      </label>

    </div>
  </div>
</section>



 
@endsection

