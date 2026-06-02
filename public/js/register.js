document.addEventListener('DOMContentLoaded', function () {

  const joinModal = document.getElementById('joinModal');

  // --- FUNGSI BARU: Mengecek LocalStorage saat halaman pertama kali dimuat (atau di-refresh) ---
  const checkRegisteredEventsOnLoad = () => {
    // Ambil semua tombol daftar yang ada di halaman
    const registerButtons = document.querySelectorAll('a[data-bs-target="#joinModal"]');
    
    registerButtons.forEach(btn => {
      const eventId = btn.getAttribute('data-id');
      // Jika event_id ini ada di localStorage (sudah pernah daftar sebelumnya)
      if (localStorage.getItem('registered_event_' + eventId) === 'true') {
        // Matikan tombolnya secara visual dan fungsional
        btn.textContent = 'Terdaftar';
        btn.classList.remove('btn-warning');
        btn.classList.add('btn-secondary');
        btn.style.opacity = '0.7';
        btn.style.pointerEvents = 'none'; // Mencegah bisa diklik paksa
        btn.removeAttribute('data-bs-target'); // Menghapus fungsi pop-up
        btn.removeAttribute('data-bs-toggle');
      }
    });
  };

  // Langsung jalankan pengecekan saat halaman terbuka
  checkRegisteredEventsOnLoad();

  // Jika tidak ada modal (bukan di halaman home), hentikan script
  if (!joinModal) return;

  const csrfToken = document.querySelector('meta[name="csrf-token"]');

  joinModal.addEventListener('show.bs.modal', function (e) {
    const btn   = e.relatedTarget;
    const id    = btn.getAttribute('data-id');
    const name  = btn.getAttribute('data-name');
    const date  = btn.getAttribute('data-date');
    const route = btn.getAttribute('data-route');

    // Cek memori browser apakah pengguna sudah mendaftar
    const isRegistered = localStorage.getItem('registered_event_' + id) === 'true';

    // Jika sudah pernah daftar, tolak pop-up agar tidak muncul
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
          // --- BAGIAN BARU: Simpan status terdaftar ke memori permanen browser ---
          localStorage.setItem('registered_event_' + id, 'true');
          
          bootstrap.Modal.getInstance(joinModal).hide();
          
          Swal.fire({ 
            icon: 'success', 
            title: 'Berhasil!', 
            text: data.message || `Anda telah terdaftar untuk ${name}.`, 
            timer: 2000, 
            showConfirmButton: false 
          });

          // Update UI Tombol secara instan
          btn.textContent = 'Terdaftar';
          btn.classList.remove('btn-warning');
          btn.classList.add('btn-secondary');
          btn.style.opacity = '0.7';
          btn.style.pointerEvents = 'none';
          btn.removeAttribute('data-bs-target');
          btn.removeAttribute('data-bs-toggle');

          // Update Counter / Jumlah Peserta di layar
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