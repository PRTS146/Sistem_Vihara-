@extends('template.monitoring')

@section('contentmon')
<div style="background-color: #e0f7f7; min-height: 100vh;" class="d-flex">

  {{-- SIDEBAR --}}
  <div class="bg-white d-flex flex-column p-3" style="width: 260px; min-height: 100vh; box-shadow: 4px 0 20px rgba(0,0,0,0.06);">
    
    <div class="mb-4 px-2 pt-2">
      <div class="fw-bold text-uppercase text-warning" style="font-size: 0.75rem; letter-spacing: 0.1em;">Monitoring Room</div>
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

    {{-- OVERVIEW --}}
    <div id="section-overview">
      <h4 class="fw-bold mb-4">Overview</h4>
      <div class="row g-3 mb-4">
        <div class="col-md-4">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <div class="text-muted small mb-1">Donation campaigns</div>
            <div class="fw-bold mb-1" style="font-size: 2rem; color: #4a90d9;">3</div>
            <div class="text-muted small">active campaigns</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <div class="text-muted small mb-1">Events held</div>
            <div class="fw-bold mb-1" style="font-size: 2rem; color: #4a90d9;">5</div>
            <div class="text-muted small">total events</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <div class="text-muted small mb-1">Slots available</div>
            <div class="fw-bold mb-1" style="font-size: 2rem; color: #D4A017;">62</div>
            <div class="text-muted small">of 100 total slots</div>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="fw-bold mb-0">Recent events</h6>
              <a href="#" onclick="showSection('events')" class="text-warning text-decoration-none small fw-bold">Add event</a>
            </div>
            <hr>
            <p class="text-muted small text-center py-3">No recent events</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <h6 class="fw-bold mb-3">Active donation campaigns</h6>
            <hr>
            <p class="text-muted small text-center py-3">No active campaigns</p>
          </div>
        </div>
      </div>
    </div>

    {{-- EVENTS --}}
    <div id="section-events" style="display:none;">
      <h4 class="fw-bold mb-4">Events</h4>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <h6 class="fw-bold mb-3">Create new event</h6>
            <hr>
            <form action="#" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label small text-muted">Event image</label>
                <div class="border rounded-3 p-4 text-center text-muted"
                     style="border-style: dashed !important; cursor: pointer; background: #f8fbff;"
                     onclick="document.getElementById('eventImage').click()">
                  Click to upload image
                  <input type="file" id="eventImage" name="image" hidden accept="image/*">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label small text-muted">Event name</label>
                <input type="text" name="event_name" class="form-control rounded-3" placeholder="e.g. Commemoration Day 2025">
              </div>
              <div class="mb-3">
                <label class="form-label small text-muted">Date of event</label>
                <input type="date" name="event_date" class="form-control rounded-3">
              </div>
              <div class="mb-3">
                <label class="form-label small text-muted">Description</label>
                <textarea name="event_description" class="form-control rounded-3" rows="3" placeholder="Event description..."></textarea>
              </div>
              <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Create event</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <h6 class="fw-bold mb-3">All events</h6>
            <hr>
            <table class="table table-hover">
              <thead class="table-light">
                <tr>
                  <th>Event</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="3" class="text-center text-muted py-3">No events yet</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


{{-- SLOTS --}}
<div id="section-slots" style="display:none;">
  <h4 class="fw-bold mb-4">Rumah Abu Slots</h4>
  <div class="row g-3">

    {{-- LEFT: Add + Update --}}
    <div class="col-md-6">
      <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
        <h6 class="fw-bold mb-3">Add / update slot</h6>
        <hr>

        {{-- ADD SLOT --}}
        <div class="mb-3">
          <label class="form-label small text-muted">Blok</label>
          <select class="form-select rounded-3" id="addBlok">
            <option>Blok A</option>
            <option>Blok B</option>
            <option>Blok C</option>
            <option>Blok D</option>
            <option>Blok E</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label small text-muted">Dinding</label>
          <select class="form-select rounded-3" id="addDinding">
            <option>Dinding 1</option>
            <option>Dinding 2</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label small text-muted">Slot number (e.g. 1.1, 1.2)</label>
          <input type="text" class="form-control rounded-3" id="addSlotNumber" placeholder="put 1.1 or 1.2 depend on dinding">
        </div>
        <div class="mb-3">
          <label class="form-label small text-muted">Status</label>
          <select class="form-select rounded-3" id="addStatus">
            <option value="available">Available</option>
            <option value="booked">Booked</option>
            <option value="taken">Taken</option>
          </select>
        </div>
        <button type="button" class="btn btn-warning rounded-pill px-4 fw-bold" onclick="addSlot()">Add slot</button>

        <hr class="my-4">

        {{-- UPDATE SLOT STATUS --}}
        <p class="small text-muted fw-semibold mb-3">Update existing slot status</p>

        <div class="mb-3">
          <label class="form-label small text-muted">Pick dinding to filter</label>
          <select class="form-select rounded-3" id="filterDinding" onchange="filterSlots()">
            <option value="">All</option>
            <option>Dinding 1</option>
            <option>Dinding 2</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label small text-muted">Pick slot</label>
          <select class="form-select rounded-3" id="slotPicker"></select>
        </div>

        <div class="mb-3">
          <label class="form-label small text-muted">New status</label>
          <select class="form-select rounded-3" id="newStatus">
            <option value="available">Available</option>
            <option value="booked">Booked</option>
            <option value="taken">Taken</option>
          </select>
        </div>

        <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="updateSlot()">Update status</button>
      </div>
    </div>

    {{-- RIGHT: Slot list --}}
    <div class="col-md-6">
      <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
        <h6 class="fw-bold mb-3">Slot list</h6>
        <hr>
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>Blok</th>
              <th>Dinding</th>
              <th>Slot</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="slotTableBody">
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

    {{-- DONATIONS --}}
    <div id="section-donations" style="display:none;">
      <h4 class="fw-bold mb-4">Donations</h4>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <h6 class="fw-bold mb-3">Create campaign</h6>
            <hr>
            <div class="mb-3">
              <label class="form-label small text-muted">Campaign name</label>
              <input type="text" class="form-control rounded-3" placeholder="e.g. Renovation Fund 2025">
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">Target amount (Rp)</label>
              <input type="number" class="form-control rounded-3" placeholder="10000000">
            </div>
            <div class="mb-3">
         <label class="form-label small text-muted">Campaign image</label>
            <div class="border rounded-3 p-4 text-center text-muted"
            style="border-style: dashed !important; background: #f8fbff; cursor: pointer;"
            onclick="document.getElementById('campaignImage').click()">
            <span id="campaignImageLabel">Click to upload image</span>
            <input type="file" id="campaignImage" hidden accept="image/*"
             onchange="document.getElementById('campaignImageLabel').textContent = this.files[0].name">
</div>
            </div>
            <button class="btn btn-warning rounded-pill px-4 fw-bold">Create campaign</button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-white rounded-4 p-4" style="box-shadow: 0 8px 30px rgba(0,0,0,0.08);">
            <h6 class="fw-bold mb-3">Active campaigns</h6>
            <hr>
            <p class="text-muted small text-center py-3">No active campaigns</p>
            <h6 class="fw-bold mb-3 mt-4">Update progress</h6>
            <hr>
            <div class="mb-3">
              <label class="form-label small text-muted">Select campaign</label>
              <select class="form-select rounded-3">
                <option>-- Select --</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label small text-muted">Current collected (Rp)</label>
              <input type="number" class="form-control rounded-3" placeholder="5000000">
            </div>
            <button class="btn btn-warning rounded-pill px-4 fw-bold">Update progress</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection