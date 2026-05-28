/* ── Tab switching ── */
function switchTab(name, btn) {
  // Hide all panels
  document.querySelectorAll('.tab-panel').forEach(p => {
    p.classList.add('d-none');
  });

  // Reset ALL nav buttons
  document.querySelectorAll('.adm-nav-btn').forEach(b => {
    b.classList.remove('text-warning', 'fw-semibold');
    b.classList.add('text-secondary');
    b.style.background = '';
    b.style.border = '';
  });

  // Show target panel
  const panel = document.getElementById('panel-' + name);
  if (panel) panel.classList.remove('d-none');

  // Highlight active button
  if (btn) {
    btn.classList.remove('text-secondary');
    btn.classList.add('text-warning', 'fw-semibold');
    btn.style.background = 'rgba(255,193,7,.1)';
    btn.style.border = '1px solid rgba(255,193,7,.2)';
  }
}

/* ── Modal helpers ── */
function openModal(id) {
  const el = document.getElementById(id);
  if (el) {
    el.classList.remove('d-none');
    document.body.style.overflow = 'hidden';
  }
}

function closeModal(id) {
  const el = document.getElementById(id);
  if (el) {
    el.classList.add('d-none');
    document.body.style.overflow = '';
  }
}

// Close on backdrop click
document.addEventListener('click', function (e) {
  if (e.target.classList.contains('modal-overlay')) {
    closeModal(e.target.id);
  }
});

// Close on Escape
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay:not(.d-none)').forEach(el => {
      closeModal(el.id);
    });
  }
});

/* ── Registrants ── */
function showRegistrants(eventId, eventName) {
  document.getElementById('regTitle').textContent = '👥 Pendaftar: ' + eventName;
  document.getElementById('regBody').innerHTML = '<p class="text-secondary text-center py-4">Memuat data...</p>';
  openModal('modalRegistrants');

  fetch('/monitoring/events/' + eventId + '/registrants')
    .then(r => r.json())
    .then(users => {
      const body = document.getElementById('regBody');
      if (!users.length) {
        body.innerHTML = '<p class="text-secondary text-center py-4">Belum ada pendaftar.</p>';
        return;
      }
      body.innerHTML = users.map(u => `
        <div class="d-flex align-items-center gap-2 py-2 border-bottom border-secondary">
          <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white flex-shrink-0"
               style="width:34px;height:34px;background:linear-gradient(135deg,#b8861e,#6ea8fe);font-size:.78rem;">
            ${u.name.charAt(0).toUpperCase()}
          </div>
          <div>
            <div class="fw-bold small text-white">${u.name}</div>
            <div class="text-secondary" style="font-size:.72rem;">${u.email}</div>
          </div>
        </div>`).join('');
    })
    .catch(() => {
      document.getElementById('regBody').innerHTML =
        '<p class="text-danger text-center py-4">Gagal memuat data.</p>';
    });
}

/* ── Init on DOM ready ── */
document.addEventListener('DOMContentLoaded', function () {
  // Show overview by default, click the first nav button
  const firstBtn = document.querySelector('.adm-nav-btn');
  if (firstBtn) switchTab('overview', firstBtn);
});