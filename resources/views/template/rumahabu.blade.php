<section id="rumah-abu" style="background-color: #e0f7f7;" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <span class="bg-warning px-4 py-2 fw-bold rounded-pill fs-5">🏛️ Rumah Abu</span>
    </div>
    <div class="row g-4">
      <div class="col-lg-3">
        <div class="bg-white rounded-4 p-3" style="box-shadow: 0 20px 60px rgba(0,0,0,0.12);">
          <h5 class="fw-bold mb-3 border-bottom pb-2">Pilih Dinding</h5>
          <h6 class="text-success fw-bold mb-3" id="sidebarBlockLabel">Blok A</h6>
          <div class="list-group rounded-3">
            <button type="button" class="list-group-item list-group-item-action active dinding-btn fw-bold" data-dinding="1">Dinding 1</button>
            <button type="button" class="list-group-item list-group-item-action dinding-btn fw-bold" data-dinding="2">Dinding 2</button>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="bg-white rounded-4 p-4" style="box-shadow: 0 20px 60px rgba(0,0,0,0.12);">
          <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h3 class="fw-bold mb-0 text-dark">Available Slots <span id="currentBlockLabel" class="text-success">- Blok A</span></h3>
            <div class="d-flex align-items-center gap-3">
              <div class="d-flex align-items-center gap-1">
                <span class="rounded-circle bg-danger" style="width:12px;height:12px;"></span>
                <span class="small fw-bold" style="font-size:11px;">Tidak Tersedia</span>
              </div>
              <div class="d-flex align-items-center gap-1">
                <span class="rounded-circle bg-success" style="width:12px;height:12px;"></span>
                <span class="small fw-bold" style="font-size:11px;">Tersedia</span>
              </div>
            </div>
            <div class="btn-group shadow-sm rounded-pill overflow-hidden">
              <button id="prevBlockBtn" class="btn btn-light border bg-white px-3"><i class="bi bi-caret-left-fill text-secondary"></i></button>
              <button id="nextBlockBtn" class="btn btn-light border bg-white px-3"><i class="bi bi-caret-right-fill text-secondary"></i></button>
            </div>
          </div>
          <div id="slotsContainer" class="slots-grid"></div>
        </div>
      </div>
    </div>
  </div>
</section>