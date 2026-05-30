function showSection(name) {
  ['overview','events','slots','donations'].forEach(function(s) {
    document.getElementById('section-' + s).style.display = 'none';
    document.getElementById('link-' + s).classList.remove('active-link');
  });
  document.getElementById('section-' + name).style.display = 'block';
  document.getElementById('link-' + name).classList.add('active-link');

  if (name === 'slots') {
    renderTable();
  }
}

showSection('overview');

// ── SLOTS ─────────────────────────────────────────

var slots = [
  { id: 1, blok: 'Blok A', dinding: 'Dinding 1', slot: '1.1', status: 'taken' },
  { id: 2, blok: 'Blok A', dinding: 'Dinding 1', slot: '1.2', status: 'taken' },
  { id: 3, blok: 'Blok A', dinding: 'Dinding 2', slot: '1.1', status: 'available' },
  { id: 4, blok: 'Blok B', dinding: 'Dinding 1', slot: '1.1', status: 'booked' },
  { id: 5, blok: 'Blok C', dinding: 'Dinding 2', slot: '2.1', status: 'available' },
];
var nextId = 6;

var badgeStyle = {
  available: 'background:#e8f8f0; color:#1e8449; border:1px solid #c3e6cb;',
  booked:    'background:#fef9e7; color:#d68910; border:1px solid #ffeaa7;',
  taken:     'background:#fde8e8; color:#c0392b; border:1px solid #f5c6cb;',
};

function renderTable() {
  var tbody = document.getElementById('slotTableBody');
  if (!tbody) return;
  tbody.innerHTML = '';

  if (slots.length === 0) {
    tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted py-3">No slots yet</td></tr>';
    renderPicker();
    return;
  }

  slots.forEach(function(s) {
    var style = badgeStyle[s.status] || '';
    var tr = document.createElement('tr');
    tr.id = 'slot-row-' + s.id;
    tr.innerHTML =
      '<td>' + s.blok + '</td>' +
      '<td>' + s.dinding + '</td>' +
      '<td>' + s.slot + '</td>' +
      '<td><span class="badge rounded-pill" style="' + style + '">' + s.status + '</span></td>' +
      '<td><button type="button" class="btn btn-sm btn-outline-danger rounded-pill" onclick="deleteSlot(' + s.id + ')">Del</button></td>';
    tbody.appendChild(tr);
  });

  renderPicker();
}

function renderPicker() {
  var filter = document.getElementById('filterDinding').value;
  var picker = document.getElementById('slotPicker');
  if (!picker) return;
  picker.innerHTML = '';

  var filtered = filter ? slots.filter(function(s) { return s.dinding === filter; }) : slots;

  if (filtered.length === 0) {
    picker.innerHTML = '<option>No slots available</option>';
    return;
  }

  filtered.forEach(function(s) {
    var opt = document.createElement('option');
    opt.value = s.id;
    opt.textContent = s.blok + ' ' + s.dinding + ' - ' + s.slot + ' (' + s.status + ')';
    picker.appendChild(opt);
  });
}

function addSlot() {
  var blok    = document.getElementById('addBlok').value;
  var dinding = document.getElementById('addDinding').value;
  var slotNum = document.getElementById('addSlotNumber').value.trim();
  var status  = document.getElementById('addStatus').value;

  if (!slotNum) {
    alert('Please enter a slot number.');
    return;
  }

  var id = nextId++;
  slots.push({ id: id, blok: blok, dinding: dinding, slot: slotNum, status: status });
  document.getElementById('addSlotNumber').value = '';
  renderTable();
}

function deleteSlot(id) {
  slots = slots.filter(function(s) { return s.id !== id; });
  renderTable();
}

function updateSlot() {
  var id        = parseInt(document.getElementById('slotPicker').value);
  var newStatus = document.getElementById('newStatus').value;
  var slot      = null;

  for (var i = 0; i < slots.length; i++) {
    if (slots[i].id === id) { slot = slots[i]; break; }
  }

  if (!slot) return;
  slot.status = newStatus;
  renderTable();
}

function filterSlots() {
  renderPicker();
}