@extends('template.monitoring')

@section('contentmon')
{{-- Panggil File CSS --}}
<link rel="stylesheet" href="{{ asset('css/monitoring.css') }}">

<div class="monitoring-container d-flex">

  {{-- SIDEBAR --}}
  <div class="bg-white d-flex flex-column p-3 monitoring-sidebar">
    
    <div class="mb-4 px-2 pt-2">
      <div class="fw-bold text-uppercase text-warning monitoring-title">Monitoring Room</div>
      <div class="text-muted small">Admin Dashboard</div>
    </div>

    <nav class="d-flex flex-column gap-1">
      <a href="#" onclick="showSection('overview')" class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-overview">Overview</a>
      <a href="#" onclick="showSection('events')" class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-events">Events</a>
      <a href="#" onclick="showSection('slots')" class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-slots">Rumah Abu Slots</a>
      <a href="#" onclick="showSection('donations')" class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-donations">Donations</a>
    </nav>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="flex-grow-1 p-4">

    {{-- ═══════════════════════════════════════════════ --}}
    {{-- OVERVIEW --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <div id="section-overview">
      <h4 class="fw-bold mb-4">Overview</h4>
      <div class="row g-3 mb-4">
        <div class="col-md-3">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <div class="text-muted small mb-1">Donation campaigns</div>
            <div class="fw-bold mb-1 stat-value-blue">{{ $totalDonationCampaigns }}</div>
            <div class="text-muted small">active campaigns</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <div class="text-muted small mb-1">Events held</div>
            <div class="fw-bold mb-1 stat-value-blue">{{ $totalEvents }}</div>
            <div class="text-muted small">total events</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <div class="text-muted small mb-1">Total peserta</div>
            <div class="fw-bold mb-1 stat-value-green">{{ $totalParticipants }}</div>
            <div class="text-muted small">registered participants</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <div class="text-muted small mb-1">Slots available</div>
            <div class="fw-bold mb-1 stat-value-yellow">{{ $slotsAvailable }}</div>
            <div class="text-muted small">of {{ $totalSlots }} total slots</div>
          </div>
        </div>
      </div>

      <div class="row g-3">
        {{-- Recent Events --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="fw-bold mb-0">Recent events</h6>
              <a href="#" onclick="showSection('events')" class="text-warning text-decoration-none small fw-bold">Add event</a>
            </div>
            <hr>
            @forelse($events->take(5) as $event)
              <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <div>
                  <div class="fw-semibold">{{ $event->event_name }}</div>
                  <small class="text-muted">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <span class="badge {{ $event->event_status === 'Active' ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                    {{ $event->event_status }}
                  </span>
                  <span class="badge bg-light text-dark border">{{ $event->event_counter }} peserta</span>
                </div>
              </div>
            @empty
              <p class="text-muted small text-center py-3">No recent events</p>
            @endforelse
          </div>
        </div>

        {{-- Active Donation Campaigns --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">Active donation campaigns</h6>
            <hr>
            @forelse($donations->take(5) as $donation)
              @php
                $pct = $donation->donation_target > 0
                    ? min(100, round(($donation->donation_progress / $donation->donation_target) * 100))
                    : 0;
              @endphp
              <div class="py-2 border-bottom">
                <div class="fw-semibold">{{ $donation->donation_name }}</div>
                <div class="progress my-1 progress-thin">
                  <div class="progress-bar bg-success"></div>
                </div>
                <small class="text-muted">
                  Rp {{ number_format($donation->donation_progress, 0, ',', '.') }}
                  / Rp {{ number_format($donation->donation_target, 0, ',', '.') }}
                  ({{ $pct }}%)
                </small>
              </div>
            @empty
              <p class="text-muted small text-center py-3">No active campaigns</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    {{-- ═══════════════════════════════════════════════ --}}
    {{-- EVENTS --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <div id="section-events" class="section-hidden">
      <h4 class="fw-bold mb-4">Events</h4>
      <div class="row g-3">
        {{-- Create New Event Form --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">Create new event</h6>
            <hr>
            <form action="{{ route('events.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label small text-muted">Event name</label>
                <input type="text" name="event_name" class="form-control rounded-3" placeholder="e.g. Perayaan Waisak 2025" required>
              </div>
              <div class="mb-3">
                <label class="form-label small text-muted">Description</label>
                <textarea name="event_description" class="form-control rounded-3" rows="3" placeholder="Event description..." required></textarea>
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

        {{-- All Events Table --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">All events</h6>
            <hr>
            <div class="table-container-md">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Peserta</th>
                    <th>Status</th>
                    <th>Action</th>
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
                                  data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->event_id }}">
                            <i class="bi bi-pencil"></i>
                          </button>
                          <form action="{{ route('events.destroy', $event->event_id) }}" method="POST" 
                                onsubmit="return confirm('Hapus event ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                              <i class="bi bi-trash"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>

                    {{-- Edit Event Modal --}}
                    <div class="modal fade" id="editEventModal{{ $event->event_id }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4">
                          <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold">Edit Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body px-4 pb-4">
                            <form action="{{ route('events.update', $event->event_id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="mb-3">
                                <label class="form-label small text-muted">Event name</label>
                                <input type="text" name="event_name" class="form-control rounded-3" value="{{ $event->event_name }}" required>
                              </div>
                              <div class="mb-3">
                                <label class="form-label small text-muted">Description</label>
                                <textarea name="event_description" class="form-control rounded-3" rows="3" required>{{ $event->event_description }}</textarea>
                              </div>
                              <div class="row g-2 mb-3">
                                <div class="col-md-6">
                                  <label class="form-label small text-muted">Date</label>
                                  <input type="date" name="event_date" class="form-control rounded-3" value="{{ $event->event_date }}" required>
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label small text-muted">Time</label>
                                  <input type="time" name="event_time" class="form-control rounded-3" value="{{ $event->event_time }}" required>
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label small text-muted">Status</label>
                                <select name="event_status" class="form-select rounded-3">
                                  <option value="Active" {{ $event->event_status === 'Active' ? 'selected' : '' }}>Active</option>
                                  <option value="Selesai" {{ $event->event_status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                  <option value="Dibatalkan" {{ $event->event_status === 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                              </div>
                              <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Update event</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center text-muted py-3">No events yet</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    {{-- ═══════════════════════════════════════════════ --}}
    {{-- SLOTS --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <div id="section-slots" class="section-hidden">
      <h4 class="fw-bold mb-4">Rumah Abu Slots</h4>
      <div class="row g-3">

        {{-- LEFT: Add + Update --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">Add new slot</h6>
            <hr>

            {{-- ADD SLOT --}}
            <div class="mb-3">
              <label class="form-label small text-muted">Blok</label>
              <select class="form-select rounded-3" id="addBlok">
                <option value="A">Blok A</option>
                <option value="B">Blok B</option>
                <option value="C">Blok C</option>
                <option value="D">Blok D</option>
                <option value="E">Blok E</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">Dinding</label>
              <select class="form-select rounded-3" id="addDinding">
                <option value="1">Dinding 1</option>
                <option value="2">Dinding 2</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">Slot name (e.g. A1.1, B3.2)</label>
              <input type="text" class="form-control rounded-3" id="addSlotName" placeholder="e.g. A1.1">
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">Status</label>
              <select class="form-select rounded-3" id="addStatus">
                <option value="Tersedia">Tersedia</option>
                <option value="Booking">Booking</option>
                <option value="Telah Diambil">Telah Diambil</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">Price (Rp)</label>
              <input type="number" class="form-control rounded-3" id="addPrice" placeholder="500000" min="0">
            </div>
            <button type="button" class="btn btn-warning rounded-pill px-4 fw-bold" onclick="addSlot()">Add slot</button>

            <hr class="my-4">

            {{-- UPDATE SLOT STATUS --}}
            <p class="small text-muted fw-semibold mb-3">Update existing slot status</p>

            <div class="mb-3">
              <label class="form-label small text-muted">Pick blok to filter</label>
              <select class="form-select rounded-3" id="filterBlok" onchange="filterSlots()">
                <option value="">All</option>
                <option value="A">Blok A</option>
                <option value="B">Blok B</option>
                <option value="C">Blok C</option>
                <option value="D">Blok D</option>
                <option value="E">Blok E</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label small text-muted">Pick slot</label>
              <select class="form-select rounded-3" id="slotPicker"></select>
            </div>

            <div class="mb-3">
              <label class="form-label small text-muted">New status</label>
              <select class="form-select rounded-3" id="newStatus">
                <option value="Tersedia">Tersedia</option>
                <option value="Booking">Booking</option>
                <option value="Telah Diambil">Telah Diambil</option>
              </select>
            </div>

            <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="updateSlot()">Update status</button>
          </div>
        </div>

        {{-- RIGHT: Slot list --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">Slot list</h6>
            <hr>
            <div class="table-container-lg">
              <table class="table table-hover align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Blok</th>
                    <th>Dinding</th>
                    <th>Slot</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="slotTableBody">
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- ═══════════════════════════════════════════════ --}}
    {{-- DONATIONS --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <div id="section-donations" class="section-hidden">
      <h4 class="fw-bold mb-4">Donations</h4>
      <div class="row g-3">

        {{-- Create Campaign --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">Create campaign</h6>
            <hr>
            <form action="{{ route('donations.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label small text-muted">Campaign name</label>
                <input type="text" name="donation_name" class="form-control rounded-3" placeholder="e.g. Renovation Fund 2025" required>
              </div>
              <div class="mb-3">
                <label class="form-label small text-muted">Description</label>
                <textarea name="donation_description" class="form-control rounded-3" rows="2" placeholder="Campaign description..."></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label small text-muted">Target amount (Rp)</label>
                <input type="number" name="donation_target" class="form-control rounded-3" placeholder="10000000" min="0" required>
              </div>
              <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Create campaign</button>
            </form>
          </div>
        </div>

        {{-- Active Campaigns + Update Progress --}}
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4 monitoring-card">
            <h6 class="fw-bold mb-3">Active campaigns</h6>
            <hr>

            @forelse($donations as $donation)
              @php
                $pct = $donation->donation_target > 0
                    ? min(100, round(($donation->donation_progress / $donation->donation_target) * 100))
                    : 0;
              @endphp
              <div class="py-2 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="fw-semibold">{{ $donation->donation_name }}</div>
                  <form action="{{ route('donations.destroy', $donation->donation_id) }}" method="POST"
                        onsubmit="return confirm('Hapus kampanye ini?')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill py-0">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
                <div class="progress my-1 progress-thin">
                  <div class="progress-bar bg-success"></div>
                </div>
                <small class="text-muted">
                  Rp {{ number_format($donation->donation_progress, 0, ',', '.') }}
                  / Rp {{ number_format($donation->donation_target, 0, ',', '.') }}
                  ({{ $pct }}%)
                </small>
              </div>
            @empty
              <p class="text-muted small text-center py-3">No active campaigns</p>
            @endforelse

            <h6 class="fw-bold mb-3 mt-4">Update progress</h6>
            <hr>

            @if($donations->isNotEmpty())
              <form method="POST" id="updateDonationForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label class="form-label small text-muted">Select campaign</label>
                  <select class="form-select rounded-3" id="donationSelector" onchange="updateDonationFormAction()">
                    @foreach($donations as $donation)
                      <option value="{{ $donation->donation_id }}" 
                              data-route="{{ route('donations.update', $donation->donation_id) }}"
                              data-progress="{{ $donation->donation_progress }}">
                        {{ $donation->donation_name }} (Rp {{ number_format($donation->donation_progress, 0, ',', '.') }})
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label small text-muted">Current collected (Rp)</label>
                  <input type="number" name="donation_progress" id="donationProgressInput" class="form-control rounded-3" placeholder="5000000" min="0" required>
                </div>
                <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Update progress</button>
              </form>
            @else
              <p class="text-muted small text-center py-3">No campaigns to update</p>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

{{-- Success flash message trigger (ditangkap oleh file monitoring.js) --}}
@if(session('success'))
<div id="flash-message-success" data-message="{{ session('success') }}" style="display: none;"></div>
@endif

{{-- Panggil File JS --}}
<script src="{{ asset('js/monitoring.js') }}"></script>
@endsection