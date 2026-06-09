<section id="events" style="background-color: #e0f7f7;" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill">EVENTS</span>
    </div>

    @if($events->isEmpty())
      <div class="text-center py-5">
        <p class="text-muted fs-5">Belum ada acara yang tersedia saat ini.</p>
      </div>
    @else
      <div class="bg-white rounded-4 p-4 shadow-lg" style="box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important;">
        <div class="position-relative px-4">
          <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">

            {{-- Carousel Indicators --}}
            <div class="carousel-indicators">
              @for($i = 0; $i < ceil($events->count() / 3); $i++)
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="{{ $i }}"
                  class="{{ $i === 0 ? 'active' : '' }} bg-warning"></button>
              @endfor
            </div>

            {{-- Carousel Items --}}
            <div class="carousel-inner pb-4">
              @foreach($events->chunk(3) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                  <div class="row g-4 justify-content-center">
                    @foreach($chunk as $event)
                      <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                          <div class="card-body d-flex flex-column">
                            <span class="badge bg-warning text-dark mb-2">
                              {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                            </span>
                            <h5 class="fw-bold">{{ $event->event_name }}</h5>
                            <p class="text-muted small">{{ Str::limit($event->event_description, 100) }}</p>
                            <div class="d-flex align-items-center gap-2 mb-2">
                              <span class="badge {{ $event->event_status === 'Active' ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                                {{ $event->event_status }}
                              </span>
                              <span class="text-muted small" id="counter-event-{{ $event->event_id }}">{{ $event->event_counter }} peserta</span>
                            </div>
                            <div class="mt-auto">
                              @if($event->event_status === 'Active')
                                <a href="#" class="btn btn-warning w-100 rounded-pill fw-bold"
                                   data-bs-toggle="modal" data-bs-target="#joinModal"
                                   data-name="{{ $event->event_name }}"
                                   data-date="{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}"
                                   data-id="{{ $event->event_id }}"
                                   data-route="{{ route('event.register', $event->event_id) }}">Daftar Sekarang</a>
                              @else
                                <button class="btn btn-secondary w-100 rounded-pill fw-bold" disabled>Pendaftaran Ditutup</button>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>

            @if($events->count() > 3)
              <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev" style="width: 40px; left: 0;">
                <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next" style="width: 40px; right: 0;">
                <span class="carousel-control-next-icon" style="filter: invert(1);"></span>
              </button>
            @endif
          </div>
        </div>
      </div>
    @endif
  </div>
</section>