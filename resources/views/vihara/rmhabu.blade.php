@extends('template.abu')

@section('abucontent')



   <div class="row g-4">
    <div class="col-md-4">
    <h5 class="fw-bold mb-4">📋 Slot Yang Dipilih</h5>
    <div class="card shadow-sm border-0">
      <div class="card-header bg-warning fw-bold">
        Daftar Booking Anda
      </div>
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Nomor Slot</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="bookedSlotsTable">
            <tr id="emptyBookRow">
              <td colspan="3" class="text-center text-muted py-4">
                Belum ada slot dipilih.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<div class="col-md-10 py-4 px-4">

  <h5 class="fw-bold mb-4">🪦 Pilih Nomor Slot</h5>

  <div class="row g-4">

    {{-- LEFT: Slots --}}
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-warning fw-bold d-flex align-items-center justify-content-between">
          <span>Available Slots</span>
          <div class="d-flex gap-3">
            <small><span class="badge bg-success">&nbsp;</span> Tersedia</small>
            <small><span class="badge bg-danger">&nbsp;</span> Tidak Tersedia</small>
            <small><span class="badge bg-warning border">&nbsp;</span> Dipilih</small>
          </div>
        </div>
        <div class="card-body">
          <div class="row g-2">
            @for ($i = 1; $i <= 50; $i++)
              <div class="col-auto">
                <button
                  class="btn btn-outline-success slot-btn"
                  style="width: 60px; height: 60px; font-weight: 700; font-size: 1rem;"
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
