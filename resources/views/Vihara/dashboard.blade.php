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

    <div class="col-md-10 py-4 px-4">
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-warning d-flex align-items-center justify-content-between">
          <button class="btn btn-sm btn-light rounded-pill px-3" onclick="changeMonth(-1)">
            <i class="bi bi-chevron-left"></i>
          </button>
          <span class="fw-bold" id="calendarTitle"></span>
          <button class="btn btn-sm btn-light rounded-pill px-3" onclick="changeMonth(1)">
            <i class="bi bi-chevron-right"></i>
          </button>
        </div>
        <div class="card-body p-0">
          <table class="table table-bordered text-center mb-0">
            <thead class="table-warning">
              <tr>
                <th>Min</th><th>Sen</th><th>Sel</th><th>Rab</th><th>Kam</th><th>Jum</th><th>Sab</th>
              </tr>
            </thead>
            <tbody id="calendarBody"></tbody>
          </table>
          <div class="px-3 py-2">
            <small class="text-muted">🟡 = Ada acara &nbsp; 🔵 = Hari ini</small>


            <div class="card shadow-sm border-0 mt-4">
  <div class="card-header bg-warning fw-bold">
    📋 Daftar Acara
  </div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Nama Acara</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Perayaan Waisak 2025</td>
          <td>12 Mei 2025</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td><a href="#" class="btn btn-warning btn-sm rounded-pill px-3">Lihat</a></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Doa Bersama</td>
          <td>21 Mei 2025</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td><a href="#" class="btn btn-warning btn-sm rounded-pill px-3">Lihat</a></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Meditasi Pagi</td>
          <td>1 Juni 2025</td>
          <td><span class="badge bg-warning text-dark">Segera</span></td>
          <td><a href="#" class="btn btn-warning btn-sm rounded-pill px-3">Lihat</a></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Bakti Sosial</td>
          <td>15 Juni 2025</td>
          <td><span class="badge bg-secondary">Akan Datang</span></td>
          <td><a href="#" class="btn btn-warning btn-sm rounded-pill px-3">Lihat</a></td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>

 
</div>
</div>
  
 


@endsection