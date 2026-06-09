<div id="section-events" class="section-hidden">
  <h4 class="fw-bold mb-4">Events</h4>
  <div class="row g-3">

    <div class="col-md-6">
      <div class="bg-white rounded-4 p-4 monitoring-card">
        <h6 class="fw-bold mb-3">Create new event</h6>
        <hr>
        <form action="{{ route('events.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label small text-muted">Event name</label>
            <input type="text" name="event_name" class="form-control rounded-3"
                   placeholder="e.g. Perayaan Waisak 2025" required>
          </div>
          <div class="mb-3">
            <label class="form-label small text-muted">Description</label>
            <textarea name="event_description" class="form-control rounded-3"
                      rows="3" placeholder="Event description..." required></textarea>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-md-6">
              <label class="form-label small text-muted">Date of event</label>
              <input type="date" name="event_date" class="form-control rounded-3" required>
            </div>
            <div class="col-md-6">
              <label class="form-label small text-muted">Time</label>
              <input type="time" name="event_time" class="form-control rounded-3" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label small text-muted">Status</label>
            <select name="event_status" class="form-select rounded-3">
              <option value="Active">Active</option>
              <option value="Selesai">Selesai</option>
              <option value="Dibatalkan">Dibatalkan</option>
            </select>
          </div>
          <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Create event</button>
        </form>
      </div>
    </div>

    <div class="col-md-6">
      <div class="bg-white rounded-4 p-4 monitoring-card">
        <h6 class="fw-bold mb-3">All events</h6>
        <hr>
        <div class="table-container-md">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>Event</th><th>Date</th><th>Peserta</th><th>Status</th><th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($events as $event)
                <tr>
                  <td>
                    <div class="fw-semibold">{{ $event->event_name }}</div>
                    <small class="text-muted">{{ Str::limit($event->event_description, 40) }}</small>
                  </td>
                  <td class="small">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                  <td><span class="badge bg-light text-dark border">{{ $event->event_counter }}</span></td>
                  <td>
                    <span class="badge {{ $event->event_status === 'Active' ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                      {{ $event->event_status }}
                    </span>
                  </td>
                  <td>
                    <div class="d-flex gap-1">
                      <button class="btn btn-sm btn-outline-primary rounded-pill"
                              data-bs-toggle="modal"
                              data-bs-target="#editEventModal{{ $event->event_id }}">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <form action="{{ route('events.destroy', $event->event_id) }}" method="POST"
                            onsubmit="return confirm('Hapus event ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>

                {{-- Edit Modal --}}
                <div class="modal fade" id="editEventModal{{ $event->event_id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body px-4 pb-4">
                        <form action="{{ route('events.update', $event->event_id) }}" method="POST">
                          @csrf @method('PUT')
                          <div class="mb-3">
                            <label class="form-label small text-muted">Event name</label>
                            <input type="text" name="event_name" class="form-control rounded-3"
                                   value="{{ $event->event_name }}" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small text-muted">Description</label>
                            <textarea name="event_description" class="form-control rounded-3"
                                      rows="3" required>{{ $event->event_description }}</textarea>
                          </div>
                          <div class="row g-2 mb-3">
                            <div class="col-md-6">
                              <label class="form-label small text-muted">Date</label>
                              <input type="date" name="event_date" class="form-control rounded-3"
                                     value="{{ $event->event_date }}" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label small text-muted">Time</label>
                              <input type="time" name="event_time" class="form-control rounded-3"
                                     value="{{ $event->event_time }}" required>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small text-muted">Status</label>
                            <select name="event_status" class="form-select rounded-3">
                              <option value="Active"      {{ $event->event_status === 'Active'      ? 'selected' : '' }}>Active</option>
                              <option value="Selesai"     {{ $event->event_status === 'Selesai'     ? 'selected' : '' }}>Selesai</option>
                              <option value="Dibatalkan"  {{ $event->event_status === 'Dibatalkan'  ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Update event</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <tr><td colspan="5" class="text-center text-muted py-3">No events yet</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>