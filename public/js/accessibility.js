document.addEventListener('DOMContentLoaded', function () {
  // Cek status dari LocalStorage saat halaman dimuat
  if (localStorage.getItem('dyslexia') === 'on')   document.body.classList.add('dyslexia-mode');
  if (localStorage.getItem('colorblind') === 'on') document.body.classList.add('colorblind-mode');
  
  updateA11y();
});

function toggleDyslexia() {
  document.body.classList.toggle('dyslexia-mode');
  localStorage.setItem('dyslexia', document.body.classList.contains('dyslexia-mode') ? 'on' : 'off');
  updateA11y();
}

function toggleColorblind() {
  document.body.classList.toggle('colorblind-mode');
  localStorage.setItem('colorblind', document.body.classList.contains('colorblind-mode') ? 'on' : 'off');
  updateA11y();
}

function updateA11y() {
  const btnDyslexia = document.getElementById('btn-dyslexia');
  const btnColorblind = document.getElementById('btn-colorblind');

  // Menggunakan pengecekan elemen agar tidak error jika tombol tidak ditemukan di halaman tertentu
  if (btnDyslexia) {
    btnDyslexia.classList.toggle('active', document.body.classList.contains('dyslexia-mode'));
  }
  if (btnColorblind) {
    btnColorblind.classList.toggle('active', document.body.classList.contains('colorblind-mode'));
  }
}
