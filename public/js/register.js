document.addEventListener('DOMContentLoaded', function () {
  const joinModal = document.getElementById('joinModal');
  if (!joinModal) return;

  joinModal.addEventListener('show.bs.modal', function (e) {
    const btn  = e.relatedTarget;
    const id   = btn.getAttribute('data-id');
    const name = btn.getAttribute('data-name');
    const date = btn.getAttribute('data-date');

    document.getElementById('joinModalEventName').textContent = name;
    document.getElementById('joinModalEventDate').textContent = date;

    const confirmBtn = document.getElementById('joinModalConfirmBtn');

    // Check current registration status from DB
    fetch(`/events/${id}/check`)
      .then(r => r.json())
      .then(data => {
        if (data.registered) {
          document.getElementById('joinModalTitle').textContent = '❌ Batalkan Pendaftaran';
          document.getElementById('joinModalDesc').textContent  = 'Apakah Anda ingin membatalkan pendaftaran untuk:';
          confirmBtn.className   = 'btn btn-danger rounded-pill px-4 fw-bold';
          confirmBtn.textContent = 'Ya, Batalkan';
        } else {
          document.getElementById('joinModalTitle').textContent = '🙏 Daftar Event';
          document.getElementById('joinModalDesc').textContent  = 'Apakah Anda ingin mendaftar untuk:';
          confirmBtn.className   = 'btn btn-warning rounded-pill px-4 fw-bold';
          confirmBtn.textContent = 'Ya, Daftar!';
        }

        confirmBtn.onclick = function () {
          fetch(`/events/${id}/register`, {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Content-Type': 'application/json'
            }
          })
          .then(r => r.json())
          .then(res => {
            bootstrap.Modal.getInstance(joinModal).hide();
            Swal.fire({
              icon:  res.status === 'registered' ? 'success' : 'info',
              title: res.status === 'registered' ? 'Berhasil!' : 'Dibatalkan',
              text:  res.status === 'registered'
                       ? `Anda telah terdaftar untuk ${name}.`
                       : `Pendaftaran ${name} telah dibatalkan.`,
              timer: 2000,
              showConfirmButton: false
            });
          });
        };
      });
  });
});