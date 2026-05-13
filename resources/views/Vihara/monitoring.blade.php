@extends('layout.head')
@extends('layout.body')

@section('body')
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
  *, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  :root {
    --blue-bg:     #2080bf;
    --blue-dark:   #1a5a8a;
    --blue-mid:    #1e6fa8;
    --white:       #ffffff;
    --slot-bg:     #638496; 
    --green:       #2ecc71;
    --orange:      #f39c12;
    --red:         #e74c3c;
    --text-dark:   #1a2a3a;
    --text-mid:    #4a6080;
    --gray-inp:    #eef2f6;
    --cal-gray:    #e0e6ed;
    --border-grey: #cfd9e0;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background: var(--blue-bg) !important;
    min-height: 100vh;
    color: var(--text-dark);
  }

  /* NAVBAR */
  .navbar {
    background: var(--white);
    border-radius: 100px;
    margin-top: 30px;
    margin-left: 24px;
    margin-right: 24px;
    display: flex;
    align-items: center;
    box-shadow: 0 6px 20px rgba(0,0,0,.12);
    height: 70px;
  }

  .nav-brand {
    font-family: 'Nunito', sans-serif;
    font-size: 1.4rem;
    font-weight: 900;
    color: var(--text-dark);
    margin-right: 48px;
    padding-left: 24px;
  }

  .nav-links {
    display: flex;
    gap: 36px;
    flex: 1;
  }

  .nav-links a {
    text-decoration: none;
    font-weight: 600;
    font-size: .95rem;
    color: #5a6c7e;
    transition: color .2s;
  }

  .nav-links a:hover {
    color: var(--blue-dark);
  }

  .nav-logout {
    background: none;
    border: none;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: .95rem;
    color: #5a6c7e;
    cursor: pointer;
    transition: color .2s;
    padding-right: 24px;
  }

  .nav-logout:hover {
    color: var(--red);
  }

  /* PAGE LAYOUT */
  .page { 
    padding: 40px 0 60px;
    display: flex;
    justify-content: center;
  }

  .main-grid {
    display: flex;
    gap: 30px;
    width: 990px;
    align-items: flex-start;
  }

  .left-col { 
    width: 340px; 
    flex-shrink: 0;
    display: flex; 
    flex-direction: column; 
    gap: 24px; 
  }

  .right-col { 
    width: 620px; 
    flex-shrink: 0;
    display: flex; 
    flex-direction: column; 
    gap: 20px; 
  }

  /* Judul */
  .page-title {
    font-family: 'Nunito', sans-serif;
    font-size: 2.2rem;
    font-weight: 900;
    color: var(--white); 
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    margin-bottom: 4px;
    text-align: right; 
    margin-left: 230px;
    width: 500px;
    margin-top: -10px;
    height: 34px;
  }

  /* SHAPE UNION: KALENDER SETTING + KALENDER */
  .kalender-union-wrapper {
      margin-left: -110px;
      margin-top: 70px;
      filter: drop-shadow(0 8px 20px rgba(0,0,0,.12));
      animation: fadeUp .35s ease both;
  }

  /* Bagian Kiri: Formulir */
  .kal-form-part {
    background: var(--white);
    border-radius: 16px;
    padding: 24px 20px;
    width: 340px;
    height: 540px;
    margin-top: -80px;
  }

  /* Bagian Kanan: Kalender */
  .kal-cal-part {
    margin-top: -355px;
    margin-left: 312px;
    background: var(--white);
    border-radius: 0 16px 16px 16px;
    padding: 16px 16px 16px 20px;
    width: 270px; 
    height: 355px;
    z-index: -1;
  }

  .cal-inner-box {
    background: var(--cal-gray);
    border-radius: 12px;
    padding: 12px;
    width: 100%;
    margin-left: 4px;
  }

  .kal-title {
    font-family: 'Nunito', sans-serif;
    font-size: 1.25rem;
    font-weight: 900;
    text-align: center;
    margin-bottom: 20px;
  }

  .form-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 26px;
  }

  .form-row label {
    font-size: .85rem;
    font-weight: 700;
    width: 100px;
    flex-shrink: 0;
  }

  .form-row input {
    flex: 1;
    width: 100%;
    padding: 8px 12px;
    border: 1.5px solid transparent;
    border-radius: 8px;
    background: var(--gray-inp);
    font-family: 'Poppins', sans-serif;
    font-size: .85rem;
    color: var(--text-dark);
    outline: none;
    transition: all .2s;
  }

  .form-row input:focus, .form-row input.active-input { 
    border-color: var(--blue-mid); 
    background: #fff; 
    box-shadow: 0 0 0 3px rgba(30, 111, 168, 0.15);
  }

  .btn-tambahkan {
    display: block;
    width: 100%;
    margin-top: 30px;
    background: var(--blue-mid);
    color: var(--white);
    border: none;
    border-radius: 8px;
    padding: 10px 0;
    font-family: 'Poppins', sans-serif;
    font-size: .95rem;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s;
    width: 290px;
  }

  .btn-tambahkan:hover {
    background: var(--blue-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,.2);
  }

  .btn-tambahkan:active {
    transform: translateY(2px);
  }

  /* KALENDER GRID */
  .cal-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .cal-nav {
    background: none;
    border: none;
    cursor: pointer;
    font-size: .85rem;
    color: var(--text-dark); 
    padding: 4px 8px;
    border-radius: 6px;
    transition: .15s;
  }

  .cal-nav:hover {
    background: rgba(0,0,0,0.06);
  }

  .cal-label {
    font-size: .85rem;
    font-weight: 800; 
  }

  .cal-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
    text-align: center;
  }

  .cal-dh {
    font-size: .7rem;
    font-weight: 800;
    color: var(--text-mid);
    padding-bottom: 8px;
  }

  .cal-day {
    font-size: .75rem;
    padding: 6px 0;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600; 
    transition: all .15s;
    user-select: none;
  }

  .cal-day:hover:not(.other) {
    background: #5c8abb;
  }

  .cal-day.today {
    font-weight: 900;
    color: var(--white);
    background: #adadad;
  }

  .cal-day.selected {
    background: var(--blue-mid);
    color: #fffff6;
    font-weight: 800;
  }

  .cal-day.other {
    color: #aab6c4;
    cursor: default;
  }

  /* DONASI ROW */
  .donasi-row { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 50px; 
    width: 400px;
    margin-left: -20px;
    margin-top: -2px;
  }

  .donasi-card {
    background: var(--white); 
    border: 2px solid var(--border-grey);
    border-radius: 10px; 
    padding: 10px 8px;
    display: flex; 
    flex-direction: column; 
    gap: 10px;
    animation: fadeUp .35s ease both;
    box-shadow: none;
  }

  .donasi-card:nth-child(2) {
    animation-delay: .08s;
  }

  .donasi-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 6px;
    width: 100%;
  }

  .donasi-label {
    font-size: .65rem;
    font-weight: 800; color: var(--text-mid);
    text-transform: uppercase;
    line-height: 1.3;
    flex: 1;
  }

  .donasi-ico { 
    color: var(--text-dark);
    opacity: 0.8;
    flex-shrink: 0;
  }
  
  .donasi-val {
    font-family: 'Nunito', sans-serif;
    font-size: 1.45rem;
    font-weight: 900;
    color: var(--green);
  }

  /* STATS ROW */
  .stats-row { 
    display: grid; 
    grid-template-columns: repeat(3, 1fr); 
    gap: 16px; 
    width: 850px;
    margin-left: -120px;
  }

  .stat-card {
    background: var(--white);
    border-radius: 12px;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 6px 16px rgba(0,0,0,.08);
    animation: normal .35s ease both;
  }

  .stat-card:nth-child(2) {
    animation-delay: .06s;
  }

  .stat-card:nth-child(3) {
    animation-delay: .12s;
  }

  .stat-label {
    font-size: .75rem;
    font-weight: 800;
    color: var(--text-mid);
    text-transform: uppercase;
    line-height: 1.3;
    margin-bottom: 4px;
  }

  .stat-val {
    font-family: 'Nunito', sans-serif;
    font-size: 2.4rem;
    font-weight: 900;
    line-height: 1;
  }

  .stat-val.green  {
    color: var(--green);
  }

  .stat-val.orange {
    color: var(--orange);
  }

  .stat-val.blue   {
    color: var(--blue-mid);
  }

  .stat-ico { 
    color: var(--text-dark); 
    opacity: 0.8;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* CAPACITY CARD */
  .cap-card {
    background: var(--white);
    border-radius: 16px;
    padding: 24px 28px;
    box-shadow: 0 6px 20px rgba(0,0,0,.10);
    margin-left: 120px;
    width: 610px;
    animation: normal .35s ease both;
    animation-delay: .1s;
  }
  .cap-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Nunito', sans-serif;
    font-size: 1.35rem;
    font-weight: 900;
    margin-bottom: 20px;
  }

  .slot-box {
    background: var(--slot-bg);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 18px;
    border: 1px solid rgba(255,255,255,0.15);
  }

  .slot-box:last-child {
    margin-bottom: 0;
  }

  .slot-box-hdr {
    font-size: .95rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .add-row {
    display: flex;
    gap: 14px;
    align-items: center;
    justify-content: flex-start;
  }

  .add-inp {
    width: 90px;
    padding: 10px;
    border-radius: 8px;
    border: 1.5px solid var(--white);
    background: transparent;
    font-family: 'Poppins', sans-serif;
    font-size: .95rem;
    font-weight: 700;
    text-align: center;
    color: var(--white);
    outline: none;
    transition: .2s;
  }

  .add-inp::placeholder {
    color: rgba(255,255,255,0.6);
    font-weight: 500;
  }

  .add-inp:focus {
    background: rgba(255,255,255,0.15);
  }
  
  .btn-add {
    background: var(--blue-mid);
    color: var(--white);
    border: 1.5px solid var(--blue-mid);
    border-radius: 8px;
    padding: 10px 28px;
    font-family: 'Poppins', sans-serif;
    font-size: .9rem;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s;
  }

  .btn-add:hover {
    background: var(--blue-dark);
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(0,0,0,.2);
  }

  .slots-grid-wrapper {
    border: 1.5px solid rgba(255,255,255,0.25);
    border-radius: 10px;
    padding: 14px;
  }

  .slots-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(85px, 1fr));
    gap: 10px;
    max-height: 120px;
    overflow-y: auto;
    padding-right: 8px;
  }

  .slots-grid::-webkit-scrollbar {
    width: 6px;
  }

  .slots-grid::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,.4);
    border-radius: 10px;
  }

  .slot-badge {
    background: transparent; 
    color: var(--white);
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 20px;
    padding: 6px 10px;
    font-size: .75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 6px;
    transition: all .2s;
  }
  .slot-badge:hover {
    background: rgba(255,255,255,0.1);
    border-color: #fff;
  }

  .sname {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    flex: 1;
    text-align: center;
  }

  .del-btn {
    background: transparent;
    color: var(--red);
    border: none;
    font-size: .85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-weight: 900;
    transition: transform .1s;
  }

  .del-btn:hover {
    transform: scale(1.25);
  }

  /* Special Effect */
  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(15px);
    }
    to   {
      opacity: 1;
      transform: translateY(0);
    }
  }
  </style>

  @include('components.monitoringnavbar')

  <div class="page">
    <div class="main-grid">

      <div class="left-col">
        
        <div class="kalender-union-wrapper">
          
          <div class="kal-form-part">
            <div class="kal-title">Kalender Setting</div>
            <div class="form-row">
              <label>Title</label>
              <input type="text" id="inpTitle">
            </div>
            <div class="form-row">
              <label>Descriptive</label>
              <input type="text" id="inpDesc">
            </div>
            <div class="form-row">
              <label>Starting Date</label>
              <input type="text" id="inpStart" class="active-input" placeholder="Pilih di kalender ->" readonly
                style="cursor:pointer" onclick="setActiveInput('start')">
            </div>
            <div class="form-row">
              <label>Finishing Date</label>
              <input type="text" id="inpEnd" placeholder="Pilih di kalender ->" readonly
                style="cursor:pointer" onclick="setActiveInput('end')">
            </div>
            <div class="form-row">
              <label>Opening Time</label>
              <input type="time" id="inpOpen">
            </div>
            <div class="form-row">
              <label>Closing Time</label>
              <input type="time" id="inpClose">
            </div>
            <button class="btn-tambahkan" onclick="submitEvent()">Tambahkan</button>
          </div>

          <div class="kal-cal-part">
            <div class="cal-inner-box">
              <div class="cal-row">
                <button class="cal-nav" onclick="changeYear(-1)">&#9664;</button>
                <span class="cal-label" id="calYear"></span>
                <button class="cal-nav" onclick="changeYear(1)">&#9654;</button>
              </div>
              <div class="cal-row" style="margin-bottom:12px;">
                <button class="cal-nav" onclick="changeMonth(-1)">&#9664;</button>
                <span class="cal-label" id="calMonthLbl"></span>
                <button class="cal-nav" onclick="changeMonth(1)">&#9654;</button>
              </div>
              <div class="cal-grid" id="calGrid"></div>
            </div>
          </div>

        </div>
        
        <div class="donasi-row">
          <div class="donasi-card">
            <div class="donasi-header">
              <div class="donasi-label">TOTAL<br>DONASI</div>
              <div class="donasi-ico">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"></rect><circle cx="12" cy="12" r="2"></circle><path d="M6 12h.01M18 12h.01"></path></svg>
              </div>
            </div>
            <div class="donasi-val">Rp 10.000</div>
          </div>
          <div class="donasi-card">
            <div class="donasi-header">
              <div class="donasi-label">PEMASUKAN<br>DONASI BULANAN</div>
              <div class="donasi-ico">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
              </div>
            </div>
            <div class="donasi-val">Rp 1.0000</div>
          </div>
        </div>

      </div>
      
      <div class="right-col">
        <h1 class="page-title">Panel Manajemen Vihara</h1>

        <div class="stats-row">
          <div class="stat-card">
            <div>
              <div class="stat-label">Total Kapasitas</div>
              <div class="stat-val blue" id="statKap">50</div>
            </div>
            <div class="stat-ico">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
            </div>
          </div>
          <div class="stat-card">
            <div>
              <div class="stat-label">Unit Terjual</div>
              <div class="stat-val green">10</div>
            </div>
            <div class="stat-ico">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
          </div>
          <div class="stat-card">
            <div>
              <div class="stat-label">Menunggu<br>Pembayaran</div>
              <div class="stat-val orange">10</div>
            </div>
            <div class="stat-ico">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
          </div>
        </div>

        <div class="cap-card">
          <div class="cap-title">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> 
            Manajemen Denah Kapasitas
          </div>

          <div class="slot-box">
            <div class="slot-box-hdr">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              Tambah Slot Unit
            </div>
            <div class="add-row">
              <input class="add-inp" id="slotCount" type="number" min="1" max="999" placeholder="Jml">
              <button class="btn-add" onclick="addSlots()">Tambahkan</button>
            </div>
          </div>

          <div class="slot-box">
            <div class="slot-box-hdr">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
              Hapus Slot Unit
            </div>
            <div class="slots-grid-wrapper">
              <div class="slots-grid" id="slotsGrid"></div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
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
</script>
@endsection