const registered = new Set();
document.addEventListener('DOMContentLoaded', function () {

  const registered = new Set();
  const joinModal = document.getElementById('joinModal');

  if (!joinModal) return; // safety check

  // Get the CSRF token from the meta tag
  const csrfToken = document.querySelector('meta[name="csrf-token"]');

  joinModal.addEventListener('show.bs.modal', function (e) {
    const btn = e.relatedTarget;
    const id    = btn.getAttribute('data-id');
    const name  = btn.getAttribute('data-name');
    const date  = btn.getAttribute('data-date');
    const route = btn.getAttribute('data-route');

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
        // POST to the backend to increment event_counter
        if (route) {
          fetch(route, {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : '',
              'Accept': 'application/json',
            },
          })
          .then(res => {
            if (res.ok || res.status === 302) {
              registered.add(id);
              bootstrap.Modal.getInstance(joinModal).hide();
              Swal.fire({ icon: 'success', title: 'Berhasil!', text: `Anda telah terdaftar untuk ${name}.`, timer: 2000, showConfirmButton: false });
            } else {
              Swal.fire({ icon: 'error', title: 'Gagal', text: 'Terjadi kesalahan saat mendaftar.', timer: 2000, showConfirmButton: false });
            }
          })
          .catch(() => {
            Swal.fire({ icon: 'error', title: 'Gagal', text: 'Tidak dapat terhubung ke server.', timer: 2000, showConfirmButton: false });
          });
        } else {
          // Fallback: just do client-side
          registered.add(id);
          bootstrap.Modal.getInstance(joinModal).hide();
          Swal.fire({ icon: 'success', title: 'Berhasil!', text: `Anda telah terdaftar untuk ${name}.`, timer: 2000, showConfirmButton: false });
        }
      };
    }
  });

});