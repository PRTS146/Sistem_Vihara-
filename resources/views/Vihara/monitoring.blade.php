@extends('template.dash')

@section('content')
<div class="container py-4">

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">🗂 Monitoring Events</h4>
    <button class="btn btn-warning rounded-pill px-4 fw-bold"
            data-bs-toggle="modal" data-bs-target="#addEventModal">
      + Tambah Event
    </button>
  </div>

  <div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-warning">
          <tr>
            <th class="ps-4">Gambar</th>
            <th>Nama Event</th>
            <th>Tanggal</th>
            <th>Carousel</th>
            <th class="text-center">Pendaftar</th>
            <th class="text-center pe-4">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($events as $event)
          <tr>
            <td class="ps-4">
              @if($event->event_image)
                <img src="{{ Storage::url($event->event_image) }}"
                     style="width:60px;height:50px;object-fit:cover;" class="rounded">
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td class="fw-bold">{{ $event->event_name }}</td>
            <td>{{ $event->event_date }}</td>
            <td>
              <span class="badge {{ $event->show_in_carousel ? 'bg-success' : 'bg-secondary' }}">
                {{ $event->show_in_carousel ? 'Ya' : 'Tidak' }}
              </span>
            </td>
            <td class="text-center">
              <button class="btn btn-sm btn-outline-info rounded-pill"
                      onclick="showRegistrants({{ $event->id }}, '{{ $event->event_name }}')">
                {{ $event->registrations_count }} orang
              </button>
            </td>
            <td class="text-center pe-4">
              <button class="btn btn-sm btn-outline-primary rounded-pill me-1"
                      data-bs-toggle="modal"
                      data-bs-target="#editModal{{ $event->id }}">Edit</button>
              <form action="{{ route('monitoring.events.destroy', $event) }}"
                    method="POST" class="d-inline"
                    onsubmit="return confirm('Hapus event ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger rounded-pill">Hapus</button>
              </form>
            </td>
          </tr>

          {{-- Edit Modal --}}
          <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                  <h5 class="modal-title fw-bold">Edit Event</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body px-4">
                  <form action="{{ route('monitoring.events.update', $event) }}"
                        method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                      <label class="form-label fw-bold">Nama Event</label>
                      <input type="text" name="event_name" class="form-control rounded-3"
                             value="{{ $event->event_name }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">Tanggal</label>
                      <input type="text" name="event_date" class="form-control rounded-3"
                             value="{{ $event->event_date }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">Deskripsi</label>
                      <textarea name="event_description" class="form-control rounded-3"
                                rows="3">{{ $event->event_description }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">Gambar</label>
                      <input type="file" name="event_image" class="form-control rounded-3">
                      @if($event->event_image)
                        <small class="text-muted">Gambar saat ini:
                          <a href="{{ Storage::url($event->event_image) }}" target="_blank">lihat</a>
                        </small>
                      @endif
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" name="show_in_carousel"
                             class="form-check-input" id="car{{ $event->id }}"
                             {{ $event->show_in_carousel ? 'checked' : '' }}>
                      <label class="form-check-label" for="car{{ $event->id }}">
                        Tampilkan di Hero Carousel
                      </label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                      <button type="button" class="btn btn-secondary rounded-pill"
                              data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-warning rounded-pill fw-bold px-4">
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          @empty
          <tr>
            <td colspan="6" class="text-center text-muted py-4">Belum ada event.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addEventModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Tambah Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4">
        <form action="{{ route('monitoring.events.store') }}" method="POST"
              enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label fw-bold">Nama Event</label>
            <input type="text" name="event_name" class="form-control rounded-3" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Tanggal</label>
            <input type="text" name="event_date" class="form-control rounded-3"
                   placeholder="e.g. 12 Mei 2025" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="event_description" class="form-control rounded-3" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Gambar</label>
            <input type="file" name="event_image" class="form-control rounded-3">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" name="show_in_carousel" class="form-check-input" id="carNew">
            <label class="form-check-label" for="carNew">Tampilkan di Hero Carousel</label>
          </div>
          <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-secondary rounded-pill"
                    data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-warning rounded-pill fw-bold px-4">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Registrants Modal --}}
<div class="modal fade" id="registrantsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="registrantsModalTitle">Daftar Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4" id="registrantsModalBody">
        <p class="text-muted text-center">Memuat...</p>
      </div>
    </div>
  </div>
</div>

<script>
function showRegistrants(eventId, eventName) {
  document.getElementById('registrantsModalTitle').textContent = `Pendaftar: ${eventName}`;
  document.getElementById('registrantsModalBody').innerHTML = '<p class="text-center text-muted">Memuat...</p>';

  new bootstrap.Modal(document.getElementById('registrantsModal')).show();

  fetch(`/monitoring/events/${eventId}/registrants`)
    .then(r => r.json())
    .then(users => {
      if (users.length === 0) {
        document.getElementById('registrantsModalBody').innerHTML =
          '<p class="text-center text-muted">Belum ada pendaftar.</p>';
        return;
      }
      let html = '<ul class="list-group list-group-flush">';
      users.forEach(u => {
        html += `<li class="list-group-item d-flex justify-content-between">
          <span class="fw-bold">${u.name}</span>
          <span class="text-muted small">${u.email}</span>
        </li>`;
      });
      html += '</ul>';
      document.getElementById('registrantsModalBody').innerHTML = html;
    });
}
</script>

@endsection