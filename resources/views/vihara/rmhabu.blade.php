@extends('template.abu')

@section('abucontent')


 <div class="col-md-10 py-4 px-4">

      <h5 class="fw-bold mb-4">🪦 Pilih Nomor Slot</h5>

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

{{-- BOOKING MODAL --}}
<div class="modal fade" id="bookingModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-header border-0 justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h4 class="fw-bold mb-1">Nomor Slot <span id="modalSlotNum" class="text-warning"></span></h4>
        <p class="text-muted">Apakah Anda ingin melakukan booking pada slot ini?</p>
      </div>
      <div class="modal-footer border-0 justify-content-center gap-3">
        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-warning rounded-pill px-4" id="confirmBookingBtn">Ya, Booking</button>
      </div>
    </div>
  </div>
</div>
@endsection
