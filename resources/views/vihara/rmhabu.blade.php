@extends('template.abu')

@section('abucontent')



  <div class="container-fluid py-4 px-4">
  <div class="row g-4">

    {{-- LEFT: Booking Table --}}
    <div class="col-md-3">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-header bg-warning fw-bold d-flex align-items-center justify-content-between">
          <span>Daftar Booking Anda</span>
          <i class="bi bi-list"></i>
        </div>
        <div class="card-body p-0">
          <table class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>No.</th>
                <th>Nomor Slot</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="bookedSlotsTable">
              <tr id="emptyBookRow">
                <td colspan="3" class="text-center text-muted py-4">
                  <i class="bi bi-x-circle d-block fs-3 mb-1"></i>
                  Belum Ada Slot Yang Dimiliki
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- RIGHT: Available Slots --}}
    <div class="col-md-9">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white fw-bold d-flex align-items-center justify-content-between border-bottom">
          <span>Available Slots</span>
          <div class="d-flex align-items-center gap-3">
            <small><span class="badge bg-danger">&nbsp;</span> Tidak Tersedia</small>
            <small><span class="badge bg-warning border">&nbsp;</span> Booking</small>
            <small><span class="badge bg-success">&nbsp;</span> Masih Tersedia</small>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-left"></i></button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row g-3">
            @for ($i = 1; $i <= 100; $i++)
              <div class="col-auto">
                <button
                  class="btn btn-outline-secondary slot-btn rounded-3"
                  style="width: 65px; height: 65px; font-weight: 700; font-size: 1.1rem;"
                  onclick="openBookingModal({{ $i }})">
                  {{ $i }}
                </button>
              </div>
            @endfor
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection
