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
              <div class="progress-bar bg-success" style="width: {{ $pct }}%;"></div>
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