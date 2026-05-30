// ── SECTION NAVIGATION ───────────────────────────
function showSection(name) {
  ['overview','events','slots','donations'].forEach(function(s) {
    document.getElementById('section-' + s).style.display = 'none';
    var link = document.getElementById('link-' + s);
    if (link) link.classList.remove('active-link');
  });
  document.getElementById('section-' + name).style.display = 'block';
  var activeLink = document.getElementById('link-' + name);
  if (activeLink) activeLink.classList.add('active-link');

  if (name === 'slots') {
    fetchAndRenderSlots();
  }
}

showSection('overview');

// ── CSRF TOKEN ───────────────────────────────────
var csrfMeta = document.querySelector('meta[name="csrf-token"]');
var csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

// ── SLOTS (API-DRIVEN) ──────────────────────────
var slots = [];

var badgeStyle = {
  'Tersedia':       'background:#e8f8f0; color:#1e8449; border:1px solid #c3e6cb;',
  'Booking':        'background:#fef9e7; color:#d68910; border:1px solid #ffeaa7;',
  'Telah Diambil':  'background:#fde8e8; color:#c0392b; border:1px solid #f5c6cb;',
};

// Fetch all slots from API
function fetchAndRenderSlots() {
  fetch('/api/slots')
    .then(function(res) { return res.json(); })
    .then(function(data) {
      slots = data;
      renderTable();
    })
    .catch(function(err) {
      console.error('Failed to fetch slots:', err);
      slots = [];
      renderTable();
    });
}

function renderTable() {
  var tbody = document.getElementById('slotTableBody');
  if (!tbody) return;
  tbody.innerHTML = '';

  if (slots.length === 0) {
    tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted py-3">No slots yet</td></tr>';
    renderPicker();
    return;
  }

  slots.forEach(function(s) {
    var style = badgeStyle[s.slot_status] || '';
    var id = s.slot_id || s.id;
    var tr = document.createElement('tr');
    tr.id = 'slot-row-' + id;
    tr.innerHTML =
      '<td>Blok ' + (s.slot_blok || '-') + '</td>' +
      '<td>Dinding ' + (s.slot_dinding || '-') + '</td>' +
      '<td>' + s.slot_name + '</td>' +
      '<td>' + (s.slot_level || '-') + '</td>' +
      '<td><span class="badge rounded-pill" style="' + style + '">' + s.slot_status + '</span></td>' +
      '<td><button type="button" class="btn btn-sm btn-outline-danger rounded-pill" onclick="deleteSlot(' + id + ')">Del</button></td>';
    tbody.appendChild(tr);
  });

  renderPicker();
}

function renderPicker() {
  var filterEl = document.getElementById('filterBlok');
  var picker = document.getElementById('slotPicker');
  if (!picker || !filterEl) return;
  picker.innerHTML = '';

  var filter = filterEl.value;
  var filtered = filter ? slots.filter(function(s) { return s.slot_blok === filter; }) : slots;

  if (filtered.length === 0) {
    picker.innerHTML = '<option>No slots available</option>';
    return;
  }

  filtered.forEach(function(s) {
    var id = s.slot_id || s.id;
    var opt = document.createElement('option');
    opt.value = id;
    opt.textContent = 'Blok ' + (s.slot_blok || '?') + ' Dinding ' + (s.slot_dinding || '?') + ' - ' + s.slot_name + ' (' + s.slot_status + ')';
    picker.appendChild(opt);
  });
}

// ── CRUD OPERATIONS (via API) ────────────────────

function addSlot() {
  var blok     = document.getElementById('addBlok').value;
  var dinding  = document.getElementById('addDinding').value;
  var slotName = document.getElementById('addSlotName').value.trim();
  var level    = document.getElementById('addLevel').value;
  var status   = document.getElementById('addStatus').value;
  var price    = document.getElementById('addPrice').value;

  if (!slotName) {
    alert('Please enter a slot name.');
    return;
  }

  fetch('/api/slots', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
      'Accept': 'application/json',
    },
    body: JSON.stringify({
      slot_blok: blok,
      slot_dinding: dinding,
      slot_name: slotName,
      slot_level: level,
      slot_status: status,
      slot_price: parseFloat(price) || 0,
    }),
  })
  .then(function(res) { return res.json(); })
  .then(function(data) {
    if (data.slot) {
      document.getElementById('addSlotName').value = '';
      document.getElementById('addPrice').value = '';
      fetchAndRenderSlots();
      if (typeof Swal !== 'undefined') {
        Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message, timer: 2000, showConfirmButton: false });
      }
    } else if (data.errors) {
      alert('Validation error: ' + JSON.stringify(data.errors));
    }
  })
  .catch(function(err) {
    console.error('Error adding slot:', err);
    alert('Failed to add slot. Check console for details.');
  });
}

function deleteSlot(id) {
  if (!confirm('Hapus slot ini?')) return;

  fetch('/api/slots/' + id, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': csrfToken,
      'Accept': 'application/json',
    },
  })
  .then(function(res) { return res.json(); })
  .then(function(data) {
    fetchAndRenderSlots();
    if (typeof Swal !== 'undefined') {
      Swal.fire({ icon: 'success', title: 'Dihapus!', text: data.message, timer: 2000, showConfirmButton: false });
    }
  })
  .catch(function(err) {
    console.error('Error deleting slot:', err);
  });
}

function updateSlot() {
  var pickerEl = document.getElementById('slotPicker');
  var id = parseInt(pickerEl.value);
  var newStatus = document.getElementById('newStatus').value;

  if (!id || isNaN(id)) {
    alert('Please select a slot first.');
    return;
  }

  fetch('/api/slots/' + id, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
      'Accept': 'application/json',
    },
    body: JSON.stringify({ slot_status: newStatus }),
  })
  .then(function(res) { return res.json(); })
  .then(function(data) {
    fetchAndRenderSlots();
    if (typeof Swal !== 'undefined') {
      Swal.fire({ icon: 'success', title: 'Updated!', text: data.message, timer: 2000, showConfirmButton: false });
    }
  })
  .catch(function(err) {
    console.error('Error updating slot:', err);
  });
}

function filterSlots() {
  renderPicker();
}