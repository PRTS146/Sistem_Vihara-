const registered = new Set();
document.addEventListener('DOMContentLoaded', function () {

  const registered = new Set();
  const joinModal = document.getElementById('joinModal');

  if (!joinModal) return; // safety check

  joinModal.addEventListener('show.bs.modal', function (e) {
    const btn = e.relatedTarget;
    const id   = btn.getAttribute('data-id');
    const name = btn.getAttribute('data-name');
    const date = btn.getAttribute('data-date');

    const isRegistered = registered.has(id);

    document.getElementById('joinModalEventName').textContent = name;
    document.getElementById('joinModalEventDate').textContent = date;

    const confirmBtn = document.getElementById('joinModalConfirmBtn');

    if (isRegistered) {
      document.getElementById('joinModalTitle').textContent = '❌ Batalkan Pendaftaran';
      document.getElementById('joinModalDesc').textContent  = 'Apakah Anda ingin membatalkan pendaftaran untuk:';
      confirmBtn.className   = 'btn btn-danger rounded-pill px-4 fw-bold';
      confirmBtn.textContent = 'Ya, Batalkan';
      confirmBtn.onclick = function () {
        registered.delete(id);
        bootstrap.Modal.getInstance(joinModal).hide();
        Swal.fire({ icon: 'info', title: 'Dibatalkan', text: `Pendaftaran ${name} telah dibatalkan.`, timer: 2000, showConfirmButton: false });
      };
    } else {
      document.getElementById('joinModalTitle').textContent = '🙏 Daftar Event';
      document.getElementById('joinModalDesc').textContent  = 'Apakah Anda ingin mendaftar untuk:';
      confirmBtn.className   = 'btn btn-warning rounded-pill px-4 fw-bold';
      confirmBtn.textContent = 'Ya, Daftar!';
      confirmBtn.onclick = function () {
        registered.add(id);
        bootstrap.Modal.getInstance(joinModal).hide();
        Swal.fire({ icon: 'success', title: 'Berhasil!', text: `Anda telah terdaftar untuk ${name}.`, timer: 2000, showConfirmButton: false });
      };
    }
  });

});