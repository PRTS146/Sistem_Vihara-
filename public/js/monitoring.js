//    STATE KALENDER
const MONTH_NAMES = ['Januari','Februari','Maret','April','Mei','Juni',
                     'Juli','Agustus','September','Oktober','November','Desember'];
const DAY_HDRS   = ['M','T','W','T','F','S','S'];

let cY = 2026, cM = 4;
let calTarget = 'start'; 
let selStart  = null; 
let selEnd    = null;

function setActiveInput(target) {
  calTarget = target;
  document.getElementById('inpStart').classList.remove('active-input');
  document.getElementById('inpEnd').classList.remove('active-input');
  
  if(target === 'start') document.getElementById('inpStart').classList.add('active-input');
  if(target === 'end')   document.getElementById('inpEnd').classList.add('active-input');
}

function renderCal() {
  document.getElementById('calYear').textContent = cY;
  document.getElementById('calMonthLbl').textContent = MONTH_NAMES[cM];

  const grid = document.getElementById('calGrid');
  grid.innerHTML = '';

  DAY_HDRS.forEach(d => {
    const el = document.createElement('div');
    el.className = 'cal-dh'; el.textContent = d;
    grid.appendChild(el);
  });

  const firstDow   = new Date(cY, cM, 1).getDay(); 
  const offset     = (firstDow + 6) % 7;           
  const daysInMon  = new Date(cY, cM + 1, 0).getDate();
  const daysInPrev = new Date(cY, cM, 0).getDate();
  const today      = new Date();

  for (let i = 0; i < offset; i++) {
    const el = document.createElement('div');
    el.className = 'cal-day other';
    el.textContent = daysInPrev - offset + 1 + i;
    grid.appendChild(el);
  }

  for (let d = 1; d <= daysInMon; d++) {
    const el  = document.createElement('div');
    el.className = 'cal-day';
    el.textContent = d;
    const key  = `${cY}-${cM}-${d}`;
    const isToday = d === today.getDate() && cM === today.getMonth() && cY === today.getFullYear();
    
    if (isToday) el.classList.add('today');
    if (key === selStart || key === selEnd) el.classList.add('selected');
    
    el.addEventListener('click', () => pickDay(d));
    grid.appendChild(el);
  }

  const total = offset + daysInMon;
  const rem   = total % 7 === 0 ? 0 : 7 - (total % 7);
  for (let i = 1; i <= rem; i++) {
    const el = document.createElement('div');
    el.className = 'cal-day other'; el.textContent = i;
    grid.appendChild(el);
  }
}

function pickDay(d) {
  const key = `${cY}-${cM}-${d}`;
  const dd  = String(d).padStart(2,'0');
  const mm  = String(cM + 1).padStart(2,'0');
  const val = `${dd}/${mm}/${cY}`;

  if (calTarget === 'start') {
    selStart = key;
    document.getElementById('inpStart').value = val;
    setActiveInput('end');
  } else {
    selEnd = key;
    document.getElementById('inpEnd').value = val;
    setActiveInput('start');
  }
  renderCal();
}

function changeYear(dir)  { cY += dir; renderCal(); }
function changeMonth(dir) {
  cM += dir;
  if (cM < 0)  { cM = 11; cY--; }
  if (cM > 11) { cM = 0;  cY++; }
  renderCal();
}

//    MANAJEMEN SLOT BERURUTAN
let slots = [];

for (let i = 1; i <= 15; i++) {
  slots.push({ id: i, label: `ID #${i}` });
}

function renderSlots() {
  const grid = document.getElementById('slotsGrid');
  grid.innerHTML = '';
  slots.forEach((s, idx) => {
    const b = document.createElement('div');
    b.className = 'slot-badge';
    b.id = `sb-${s.id}`;
    b.innerHTML = `<span class="sname">${s.label}</span>
      <button class="del-btn" onclick="removeSlot(${idx})">✕</button>`;
    grid.appendChild(b);
  });
  document.getElementById('statKap').textContent = slots.length;
}

function addSlots() {
  const inp = document.getElementById('slotCount');
  const n   = parseInt(inp.value, 10);

  if (!n || n < 1) {
    inp.style.borderColor = 'var(--red)';
    setTimeout(() => { inp.style.borderColor = 'var(--white)'; }, 1200);
    return;
  }

  for (let i = 0; i < n; i++) {
    let newId = 1;
    const existingIds = slots.map(s => s.id).sort((a,b) => a - b);
    
    for (let j = 0; j < existingIds.length; j++) {
      if (existingIds[j] === newId) {
        newId++; 
      } else if (existingIds[j] > newId) {
        break; 
      }
    }
    
    slots.push({ id: newId, label: `ID #${newId}` });
  }
  
  slots.sort((a, b) => a.id - b.id);
  
  inp.value = '';
  renderSlots();
}

function removeSlot(idx) {
  const b = document.querySelector(`#sb-${slots[idx].id}`);
  if (b) {
    b.style.transform = 'scale(0)';
    b.style.opacity   = '0';
    b.style.transition = 'transform .15s, opacity .15s';
    setTimeout(() => { 
      slots.splice(idx, 1); 
      renderSlots(); 
    }, 150);
  }
}

//    SUBMIT EVENT
function submitEvent() {
  const titleEl = document.getElementById('inpTitle');
  if (!titleEl.value.trim()) {
    titleEl.style.borderColor = 'var(--red)';
    titleEl.focus();
    setTimeout(() => { titleEl.style.borderColor = 'transparent'; }, 1500);
    return;
  }

  alert(`Complate Event "${titleEl.value.trim()}" berhasil ditambahkan!`);

  ['inpTitle','inpDesc','inpStart','inpEnd','inpOpen','inpClose']
    .forEach(id => { document.getElementById(id).value = ''; }
  );

  selStart = selEnd = null;

  setActiveInput('start');

  renderCal();
}

// INIT
renderCal();
renderSlots();