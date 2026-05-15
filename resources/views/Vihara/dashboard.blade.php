@extends('template.dash')

@section('dashcontent')

<div class="container-fluid">
  <div class="row min-vh-100">

    <div class="col-md-2 bg-light border-end py-4 px-3" style="height: 100vh; overflow-y: auto;">
      <h5 class="fw-bold mb-4">📅 Upcoming Events</h5>

      <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#joinModal" data-route="#">
        <div class="card mb-3 shadow-sm border-0 event-card">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
          </div>
        </div>
      </a>

      <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#joinModal" data-route="#">
        <div class="card mb-3 shadow-sm border-0 event-card">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
          </div>
        </div>
      </a>

      <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#joinModal" data-route="#">
        <div class="card mb-3 shadow-sm border-0 event-card">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
          </div>
        </div>
      </a>
        
      <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#joinModal" data-route="#">
        <div class="card mb-3 shadow-sm border-0 event-card">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
          </div>
        </div>
      </a>

      <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#joinModal" data-route="#">
        <div class="card mb-3 shadow-sm border-0 event-card">
          <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
            <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
          </div>
        </div>
      </a>

    </div>

 <div class="col-md-6">
   <div class="card shadow-sm border-0 mb-4">
     <div class="card-header bg-warning fw-bold">
       📆 Kalender Acara
     </div>
     <div class="card-body">
       <div id="calendar"></div>
     </div>
  </div>
 </div>

<div class="col-md-4">
  <div class="card shadow-sm border-0 h-100">
    <div class="card-header bg-warning fw-bold">
      🙏 Donasi
    </div>

    <img src="{{ asset('mainpage/placeholder.jpg') }}" 
         class="w-100" 
         style="height: 180px; object-fit: cover;">

    <div class="card-body">
      <h6 class="fw-bold">Donasi untuk Vihara</h6>
      <p class="text-muted small">Bantu kami menjaga dan mengembangkan Vihara Maha Giri Buddha untuk generasi mendatang.</p>

      <div class="mb-2">
        <div class="d-flex justify-content-between small mb-1">
          <span>Terkumpul</span>
          <span class="fw-bold">Rp 5.000.000</span>
        </div>
        <div class="progress" style="height: 8px;">
          <div class="progress-bar bg-warning" style="width: 50%;"></div>
        </div>
        <small class="text-muted">Target: Rp 10.000.000</small>
      </div>

      <a href="#" class="btn btn-warning w-100 rounded-pill mt-2 fw-bold"  data-bs-toggle="modal" data-bs-target="#donasi">
        💛 Donasi Sekarang
      </a>
    </div>
  </div>
</div>
  
  
 <div class="card shadow-sm border-0 mt-4">
  <div class="card-header bg-warning fw-bold">
    📋 Acara Yang Anda Ikuti
  </div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Nama Acara</th>
          <th>Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="joinedEventsTable">
        <tr id="emptyRow">
          <td colspan="4" class="text-center text-muted py-4">
            Belum ada acara yang diikuti.
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


@endsection