@extends('template.monitoring')

@section('contentmon')

<div class="container-fluid">
  <div class="row vh-100">

    <!-- SIDEBAR -->
    <div class="col-2 border-end bg-white p-0 d-flex flex-column">

      <div class="p-3 border-bottom">
        <h5 class="mb-0">Vihara Admin</h5>
        <small class="text-muted">Monitoring Room</small>
      </div>

      <div class="list-group list-group-flush rounded-0">

        <button class="list-group-item list-group-item-action active">
          <i class="bi bi-speedometer2 me-2"></i>
          Overview
        </button>

        <button class="list-group-item list-group-item-action">
          <i class="bi bi-calendar-event me-2"></i>
          Events
        </button>

        <button class="list-group-item list-group-item-action">
          <i class="bi bi-heart me-2"></i>
          Donasi
        </button>

      </div>

      <div class="mt-auto border-top">
        <button class="list-group-item list-group-item-action border-0 w-100 text-start">
          <i class="bi bi-gear me-2"></i>
          Pengaturan
        </button>
      </div>

    </div>

    <!-- MAIN -->
    <div class="col-10 d-flex flex-column p-0">

      <!-- TOPBAR -->
      <div class="border-bottom bg-white px-4 py-3 d-flex justify-content-between align-items-center">

        <div>
          <h4 class="mb-0">Overview</h4>
        </div>

        <div class="d-flex gap-2">

          <button class="btn btn-warning">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah
          </button>

          <button class="btn btn-outline-secondary">
            <i class="bi bi-box-arrow-up-right me-1"></i>
            Lihat Website
          </button>

        </div>

      </div>

      <!-- CONTENT -->
      <div class="p-4 overflow-auto">

        <!-- STATS -->
        <div class="row g-3 mb-4">

          <div class="col-md-3">
            <div class="card h-100">
              <div class="card-body">
                <small class="text-muted">Total Events</small>
                <h3 class="mb-0">3</h3>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card h-100">
              <div class="card-body">
                <small class="text-muted">Total Kampanye</small>
                <h3 class="mb-0">3</h3>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card h-100">
              <div class="card-body">
                <small class="text-muted">Dana Terkumpul</small>
                <h3 class="mb-0">Rp 138jt</h3>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card h-100">
              <div class="card-body">
                <small class="text-muted">Pendaftar Event</small>
                <h3 class="mb-0">248</h3>
              </div>
            </div>
          </div>

        </div>

        <!-- QUICK ACTION -->
        <div class="row g-3 mb-4">

          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">

                <div class="mb-3">
                  <i class="bi bi-calendar-event fs-3 text-warning"></i>
                </div>

                <h5>Kelola Events</h5>

                <p class="text-muted mb-0">
                  Edit, tambah, atau hapus event di halaman utama.
                </p>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">

                <div class="mb-3">
                  <i class="bi bi-heart fs-3 text-success"></i>
                </div>

                <h5>Kelola Donasi</h5>

                <p class="text-muted mb-0">
                  Update kampanye dan progress donasi.
                </p>

              </div>
            </div>
          </div>

        </div>

        <!-- TABLE -->
        <div class="card">

          <div class="card-header bg-white">
            <h5 class="mb-0">Daftar Event</h5>
          </div>

          <div class="card-body p-0">

            <div class="table-responsive">

              <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                  <tr>
                    <th>Tanggal</th>
                    <th>Nama Event</th>
                    <th>Status</th>
                    <th>Progress</th>
                    <th>Aksi</th>
                  </tr>

                </thead>

                <tbody>

                  <tr>

                    <td>12 Mei 2025</td>

                    <td>
                      <div class="fw-semibold">
                        Perayaan Waisak
                      </div>

                      <small class="text-muted">
                        Perayaan umat vihara bersama
                      </small>
                    </td>

                    <td>
                      <span class="badge text-bg-warning">
                        Upcoming
                      </span>
                    </td>

                    <td style="width:220px">

                      <div class="progress">
                        <div class="progress-bar w-75">
                          75%
                        </div>
                      </div>

                    </td>

                    <td>

                      <div class="d-flex gap-2">

                        <button class="btn btn-sm btn-outline-primary">
                          <i class="bi bi-pencil"></i>
                        </button>

                        <button class="btn btn-sm btn-outline-danger">
                          <i class="bi bi-trash"></i>
                        </button>

                      </div>

                    </td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</div>

@endsection