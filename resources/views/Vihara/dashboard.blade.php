@extends('template.dash')

@section('dashcontent')



<div class="col-md-2 bg-light border-end py-4 px-3" style="height: 100vh; overflow-y: auto;">
  <h5 class="fw-bold mb-4">📅 Upcoming Events</h5>


       <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">
        <div class="card mb-3 shadow-sm border-0 event-card">
           <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
          </div>
        </div>
</a>
        <a href="#" class="text-decoration-none text-dark">
          <div class="card mb-3 shadow-sm border-0 event-card">
           <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
            <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2026</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">115 Mei 2025</p>
          </div>
        </div>
</a>


        <a href="#" class="text-decoration-none text-dark">
          <div class="card mb-3 shadow-sm border-0 event-card">
           <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
            <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2026</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">115 Mei 2025</p>
          </div>
        </div>
</a>



      <a href="#" class="text-decoration-none text-dark">
          <div class="card mb-3 shadow-sm border-0 event-card">
           <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
            <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2026</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">115 Mei 2025</p>
          </div>
        </div>
</a>

      <a href="#" class="text-decoration-none text-dark">
          <div class="card mb-3 shadow-sm border-0 event-card">
           <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
            <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2026</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">115 Mei 2025</p>
          </div>
        </div>
</a>

    <a href="#" class="text-decoration-none text-dark">
          <div class="card mb-3 shadow-sm border-0 event-card">
           <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
            <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2026</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">115 Mei 2025</p>
          </div>
        </div>
</a>

</div>




@endsection
