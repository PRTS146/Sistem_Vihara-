<script src="{{ asset('js/register.js') }}"></script>
<div class="modal fade" id="joinModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="joinModalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body px-4 pb-4 text-center">
        <p id="joinModalDesc" class="text-muted"></p>
        <p class="fw-bold" id="joinModalEventName"></p>
        <p class="text-muted small" id="joinModalEventDate"></p>

        <div class="d-flex gap-2 justify-content-center mt-3">
          <button type="button" class="btn btn-secondary rounded-pill px-4"
                  data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn rounded-pill px-4 fw-bold"
                  id="joinModalConfirmBtn">Ya</button>
        </div>
      </div>

    </div>
  </div>
</div>