@extends('template.monitoring')

@section('contentmon')


  

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
              <div class="stat-val blue" id="statKap">67</div>
            </div>
            <div class="stat-ico">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
            </div>
          </div>
          <div class="stat-card">
            <div>
              <div class="stat-label">Unit Terjual</div>
              <div class="stat-val green">67</div>
            </div>
            <div class="stat-ico">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
          </div>
          <div class="stat-card">
            <div>
              <div class="stat-label">Menunggu<br>Pembayaran</div>
              <div class="stat-val orange">67</div>
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


