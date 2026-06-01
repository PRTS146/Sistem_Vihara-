document.addEventListener('DOMContentLoaded', function () {

  const registered = new Set();
  const joinModal = document.getElementById('joinModal');

  if (!joinModal) return;

  const csrfToken = document.querySelector('meta[name="csrf-token"]');

  joinModal.addEventListener('show.bs.modal', function (e) {
    const btn   = e.relatedTarget;
    const id    = btn.getAttribute('data-id');
    const name  = btn.getAttribute('data-name');
    const date  = btn.getAttribute('data-date');
    const route = btn.getAttribute('data-route');

    const isRegistered = registered.has(id);

    if (isRegistered) {
      e.preventDefault();
      Swal.fire({ 
        icon: 'info', 
        title: 'Sudah Terdaftar', 
        text: 'Anda sudah mendaftar pada acara ini!', 
        timer: 2000, 
        showConfirmButton: false 
      });
      return;
    }

    document.getElementById('joinModalTitle').textContent = '🙏 Daftar Event';
    document.getElementById('joinModalDesc').textContent  = 'Apakah Anda ingin mendaftar untuk:';
    document.getElementById('joinModalEventName').textContent = name;
    document.getElementById('joinModalEventDate').textContent = date;

    const confirmBtn = document.getElementById('joinModalConfirmBtn');
    confirmBtn.className   = 'btn btn-warning rounded-pill px-4 fw-bold';
    confirmBtn.textContent = 'Ya, Daftar!';
    
    confirmBtn.onclick = function () {
      if (route) {
        fetch(route, {
          method: 'POST',
          credentials: 'same-origin',
          headers: {
            'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : '',
            'Accept': 'application/json',
          },
        })
        .then(res => res.json())
        .then(data => {
          registered.add(id);
          
          bootstrap.Modal.getInstance(joinModal).hide();
          
          Swal.fire({ 
            icon: 'success', 
            title: 'Berhasil!', 
            text: data.message || `Anda telah terdaftar untuk ${name}.`, 
            timer: 2000, 
            showConfirmButton: false 
          });

          btn.textContent = 'Terdaftar';
          btn.classList.remove('btn-warning');
          btn.classList.add('btn-secondary');
          btn.style.opacity = '0.7';

          const counterEl = document.getElementById(`counter-event-${id}`);
          if (counterEl && data.counter) {
            counterEl.textContent = `${data.counter} peserta`;
          }
        })
        .catch(() => {
          Swal.fire({ 
            icon: 'error', 
            title: 'Gagal', 
            text: 'Tidak dapat terhubung ke server.', 
            timer: 2000, 
            showConfirmButton: false 
          });
        });
      }
    };
  });

});