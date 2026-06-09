<div id="section-slots" class="section-hidden">
  <h4 class="fw-bold mb-4">Rumah Abu Slots</h4>
  <div class="row g-3">

    <div class="col-md-6">
      <div class="bg-white rounded-4 p-4 monitoring-card">
        <h6 class="fw-bold mb-3">Add new slot</h6>
        <hr>
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
            <option value="Telah Diambil">Telah Diambil</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label small text-muted">Price (Rp)</label>
          <input type="number" class="form-control rounded-3" id="addPrice" placeholder="500000" min="0">
        </div>
        <button type="button" class="btn btn-warning rounded-pill px-4 fw-bold" onclick="addSlot()">Add slot</button>

        <hr class="my-4">

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
            <option value="Telah Diambil">Telah Diambil</option>
          </select>
        </div>
        <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="updateSlot()">Update status</button>
      </div>
    </div>

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
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="slotTableBody"></tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>