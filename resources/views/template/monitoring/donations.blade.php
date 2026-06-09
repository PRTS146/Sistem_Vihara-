<div id="section-donations" class="section-hidden">
  <h4 class="fw-bold mb-4">Donations</h4>
  <div class="row g-3">

    <div class="col-md-6">
      <div class="bg-white rounded-4 p-4 monitoring-card">
        <h6 class="fw-bold mb-3">Create campaign</h6>
        <hr>
        <form action="{{ route('donations.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label small text-muted">Campaign name</label>
            <input type="text" name="donation_name" class="form-control rounded-3"
                   placeholder="e.g. Renovation Fund 2025" required>
          </div>
          <div class="mb-3">
            <label class="form-label small text-muted">Description</label>
            <textarea name="donation_description" class="form-control rounded-3"
                      rows="2" placeholder="Campaign description..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label small text-muted">Target amount (Rp)</label>
            <input type="number" name="donation_target" class="form-control rounded-3"
                   placeholder="10000000" min="0" required>
          </div>
          <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Create campaign</button>
        </form>
      </div>
    </div>

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
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill py-0">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
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

        <h6 class="fw-bold mb-3 mt-4">Update progress</h6>
        <hr>
        @if($donations->isNotEmpty())
          <form method="POST" id="updateDonationForm">
            @csrf @method('PUT')
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
              <input type="number" name="donation_progress" id="donationProgressInput"
                     class="form-control rounded-3" placeholder="5000000" min="0" required>
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