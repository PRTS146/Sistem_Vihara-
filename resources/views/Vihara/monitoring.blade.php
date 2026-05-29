@extends('template.monitoring')

@section('contentmon')

<div class="d-flex" style="min-height:100vh;">

  {{-- ══════════════ SIDEBAR ══════════════ --}}
  <div class="d-flex flex-column flex-shrink-0 bg-dark border-end border-secondary"
       style="width:220px;position:sticky;top:0;height:100vh;overflow-y:auto;">

    {{-- Brand --}}
    <div class="d-flex align-items-center gap-2 px-3 py-3 border-bottom border-secondary">
      <span style="font-size:1.5rem;">⛩</span>
      <div>
        <div class="fw-bold text-white" style="font-size:.9rem;">Vihara</div>
        <div class="text-warning" style="font-size:.68rem;letter-spacing:.5px;text-transform:uppercase;font-weight:600;">Admin Panel</div>
      </div>
    </div>

    {{-- Nav --}}
    <div class="px-2 py-2 text-secondary" style="font-size:.65rem;letter-spacing:1px;text-transform:uppercase;font-weight:700;padding-top:16px!important;padding-bottom:4px!important;">Menu</div>
    <nav class="nav flex-column px-2 gap-1 flex-grow-1">
      <button class="btn btn-sm text-start d-flex align-items-center gap-2 rounded-2 text-warning fw-semibold px-2 py-2 active-nav-item"
              id="nav-overview" onclick="switchTab('overview',this)" style="background:rgba(255,193,7,.1);border:1px solid rgba(255,193,7,.2);">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
        Overview
      </button>
      <button class="btn btn-sm text-start d-flex align-items-center gap-2 rounded-2 text-secondary px-2 py-2"
              id="nav-events" onclick="switchTab('events',this)">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        Events
      </button>
      <button class="btn btn-sm text-start d-flex align-items-center gap-2 rounded-2 text-secondary px-2 py-2"
              id="nav-donations" onclick="switchTab('donations',this)">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        Donasi
      </button>
      <button class="btn btn-sm text-start d-flex align-items-center gap-2 rounded-2 text-secondary px-2 py-2"
              id="nav-settings" onclick="switchTab('settings',this)">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
        Pengaturan
      </button>
    </nav>

    {{-- Footer --}}
    <div class="px-3 py-3 border-top border-secondary mt-auto">
      <a href="{{ url('/') }}" class="text-secondary text-decoration-none d-flex align-items-center gap-1" style="font-size:.78rem;">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Kembali ke Situs
      </a>
    </div>
  </div>

  {{-- ══════════════ MAIN ══════════════ --}}
  <div class="flex-grow-1 p-4" style="min-width:0;">

    {{-- Alert --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
      {{ session('success') }}
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- ═══ OVERVIEW ═══ --}}
    <div class="tab-panel" id="panel-overview">
      <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
          <h4 class="fw-bold text-white mb-1">Dashboard <span class="text-warning">Overview</span></h4>
          <small class="text-secondary">Ringkasan aktivitas vihara hari ini</small>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-sm-6 col-xl-3">
          <div class="card bg-dark border-secondary h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <small class="text-secondary text-uppercase fw-bold" style="letter-spacing:.5px;font-size:.68rem;">Total Events</small>
                <div class="rounded-2 p-2" style="background:rgba(255,193,7,.12);">
                  <svg width="16" height="16" fill="none" stroke="#ffc107" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
              </div>
              <h3 class="fw-bold text-white mb-0">{{ $events->count() }}</h3>
              <div class="progress mt-3" style="height:3px;background:#2a2d3a;">
                <div class="progress-bar bg-warning" style="width:{{ min($events->count()*10,100) }}%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card bg-dark border-secondary h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <small class="text-secondary text-uppercase fw-bold" style="letter-spacing:.5px;font-size:.68rem;">Total Donasi</small>
                <div class="rounded-2 p-2" style="background:rgba(25,135,84,.15);">
                  <svg width="16" height="16" fill="none" stroke="#20c997" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
              </div>
              <h3 class="fw-bold text-white mb-0">{{ $donations->count() }}</h3>
              <div class="progress mt-3" style="height:3px;background:#2a2d3a;">
                <div class="progress-bar bg-success" style="width:{{ min($donations->count()*10,100) }}%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card bg-dark border-secondary h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <small class="text-secondary text-uppercase fw-bold" style="letter-spacing:.5px;font-size:.68rem;">Dana Terkumpul</small>
                <div class="rounded-2 p-2" style="background:rgba(13,110,253,.15);">
                  <svg width="16" height="16" fill="none" stroke="#6ea8fe" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
              </div>
              <h5 class="fw-bold text-white mb-0">Rp {{ number_format($donations->sum('amount'),0,',','.') }}</h5>
              <div class="progress mt-3" style="height:3px;background:#2a2d3a;">
                <div class="progress-bar bg-primary" style="width:70%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card bg-dark border-secondary h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <small class="text-secondary text-uppercase fw-bold" style="letter-spacing:.5px;font-size:.68rem;">Di Carousel</small>
                <div class="rounded-2 p-2" style="background:rgba(255,193,7,.08);">
                  <svg width="16" height="16" fill="none" stroke="#fd7e14" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
              <h3 class="fw-bold text-white mb-0">{{ $events->where('show_in_carousel',true)->count() }}</h3>
              <div class="progress mt-3" style="height:3px;background:#2a2d3a;">
                <div class="progress-bar bg-warning" style="width:40%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- ═══ EVENTS ═══ --}}
    <div class="tab-panel d-none" id="panel-events">
      <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
          <h4 class="fw-bold text-white mb-1">Monitoring <span class="text-warning">Events</span></h4>
          <small class="text-secondary">Kelola semua event vihara</small>
        </div>
        <button class="btn btn-warning fw-bold rounded-pill px-4" onclick="openModal('modalAddEvent')">
          + Tambah Event
        </button>
      </div>

      <div class="card bg-dark border-secondary rounded-3 overflow-hidden">
        <table class="table table-dark table-hover align-middle mb-0">
          <thead style="border-bottom:2px solid #ffc107;">
            <tr>
              <th class="ps-4 text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Gambar</th>
              <th class="text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Nama Event</th>
              <th class="text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Tanggal</th>
              <th class="text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Carousel</th>
              <th class="text-center text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Pendaftar</th>
              <th class="text-center pe-4 text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($events as $event)
            <tr>
              <td class="ps-4">
                @if($event->event_image)
                  <img src="{{ Storage::url($event->event_image) }}"
                       style="width:56px;height:44px;object-fit:cover;" class="rounded-2 border border-secondary">
                @else
                  <div class="rounded-2 border border-secondary d-flex align-items-center justify-content-center text-secondary"
                       style="width:56px;height:44px;">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                  </div>
                @endif
              </td>
              <td class="fw-bold">{{ $event->event_name }}</td>
              <td class="text-secondary small">{{ $event->event_date }}</td>
              <td>
                @if($event->show_in_carousel)
                  <span class="badge rounded-pill bg-success bg-opacity-25 text-success border border-success border-opacity-25">✓ Ya</span>
                @else
                  <span class="badge rounded-pill bg-secondary bg-opacity-25 text-secondary border border-secondary border-opacity-25">— Tidak</span>
                @endif
              </td>
              <td class="text-center">
                <button class="btn btn-sm btn-outline-info rounded-pill px-3"
                        onclick="showRegistrants({{ $event->id }},'{{ addslashes($event->event_name) }}')">
                  <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="me-1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                  {{ $event->registrations_count ?? 0 }} orang
                </button>
              </td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-outline-warning rounded-pill px-3 me-1"
                        onclick="openModal('modalEditEvent{{ $event->id }}')">Edit</button>
                <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Hapus event ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus</button>
                </form>
              </td>
            </tr>

            {{-- Edit Event Modal --}}
            <div class="modal-overlay d-none" id="modalEditEvent{{ $event->id }}">
              <div class="modal-box card bg-dark border-secondary rounded-4 shadow-lg" style="width:100%;max-width:480px;max-height:90vh;overflow-y:auto;">
                <div class="card-header bg-dark border-secondary d-flex justify-content-between align-items-center py-3 px-4">
                  <h6 class="fw-bold text-white mb-0">✏️ Edit Event</h6>
                  <button class="btn-close btn-close-white btn-sm" onclick="closeModal('modalEditEvent{{ $event->id }}')"></button>
                </div>
                <div class="card-body px-4 pb-4">
                  <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                      <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Nama Event</label>
                      <input type="text" name="event_name" class="form-control bg-black border-secondary text-white" value="{{ $event->event_name }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Tanggal</label>
                      <input type="text" name="event_date" class="form-control bg-black border-secondary text-white" value="{{ $event->event_date }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Deskripsi</label>
                      <textarea name="event_description" class="form-control bg-black border-secondary text-white" rows="3">{{ $event->event_description }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Gambar</label>
                      <input type="file" name="event_image" accept="image/*" class="form-control bg-black border-secondary text-white">
                      @if($event->event_image)
                        <a href="{{ Storage::url($event->event_image) }}" target="_blank" class="small text-warning mt-1 d-block">Lihat foto saat ini →</a>
                      @endif
                    </div>
                    <div class="mb-3">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="show_in_carousel"
                               id="car_edit_{{ $event->id }}" {{ $event->show_in_carousel ? 'checked' : '' }}>
                        <label class="form-check-label text-secondary small" for="car_edit_{{ $event->id }}">
                          Tampilkan di Hero Carousel
                        </label>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 pt-2 border-top border-secondary">
                      <button type="button" class="btn btn-secondary rounded-pill px-3"
                              onclick="closeModal('modalEditEvent{{ $event->id }}')">Batal</button>
                      <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            @empty
            <tr>
              <td colspan="6" class="text-center text-secondary py-5">
                <div style="font-size:2rem;opacity:.3;">📭</div>
                <div class="mt-2">Belum ada event. Klik <strong>Tambah Event</strong> untuk memulai.</div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    {{-- ═══ KAMPANYE DONASI ═══ --}}
    <div class="tab-panel d-none" id="panel-donations">
      <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
          <h4 class="fw-bold text-white mb-1">Monitoring <span class="text-warning">Kampanye Donasi</span></h4>
          <small class="text-secondary">Kelola target dan progress donasi vihara</small>
        </div>
        <button class="btn btn-warning fw-bold rounded-pill px-4" onclick="openModal('modalAddDonation')">
          + Buat Kampanye
        </button>
      </div>

      <div class="card bg-dark border-secondary rounded-3 overflow-hidden">
        <table class="table table-dark table-hover align-middle mb-0">
          <thead style="border-bottom:2px solid #ffc107;">
            <tr>
              <th class="ps-4 text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Nama Kampanye</th>
              <th class="text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Target (Rp)</th>
              <th class="text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Terkumpul (Rp)</th>
              <th class="text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Progress</th>
              <th class="text-center pe-4 text-warning fw-semibold" style="font-size:.75rem;letter-spacing:.8px;text-transform:uppercase;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($donations as $donation)
            <tr>
              <td class="ps-4 fw-bold">{{ $donation->donation_name }}</td>
              <td class="text-secondary">Rp {{ number_format($donation->donation_target, 0, ',', '.') }}</td>
              <td class="fw-bold text-success">Rp {{ number_format($donation->donation_progress, 0, ',', '.') }}</td>
              <td>
                @php 
                  $persentase = ($donation->donation_target > 0) ? ($donation->donation_progress / $donation->donation_target) * 100 : 0; 
                @endphp
                <div class="progress" style="height: 8px; width: 100px;">
                  <div class="progress-bar bg-success" style="width: {{ $persentase }}%"></div>
                </div>
                <small class="text-secondary">{{ round($persentase, 1) }}%</small>
              </td>
              <td class="text-center pe-4">
                {{-- Tombol Buka Modal Update Progress --}}
                <button class="btn btn-sm btn-outline-warning rounded-pill px-3 me-1"
                        onclick="openModal('modalEditDonation{{ $donation->donation_id }}')">Update</button>
                
                {{-- Form Hapus (Menuju ke fungsi destroy) --}}
                <form action="{{ route('donations.destroy', $donation->donation_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kampanye donasi ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus</button>
                </form>
              </td>
            </tr>

            {{-- Edit/Update Progress Donation Modal --}}
            <div class="modal-overlay d-none" id="modalEditDonation{{ $donation->donation_id }}">
              <div class="modal-box card bg-dark border-secondary rounded-4 shadow-lg" style="width:100%;max-width:480px;max-height:90vh;overflow-y:auto;">
                <div class="card-header bg-dark border-secondary d-flex justify-content-between align-items-center py-3 px-4">
                  <h6 class="fw-bold text-white mb-0">✏️ Update Progress Uang Masuk</h6>
                  <button class="btn-close btn-close-white btn-sm" onclick="closeModal('modalEditDonation{{ $donation->donation_id }}')"></button>
                </div>
                <div class="card-body px-4 pb-4">
                  {{-- FORM UPDATE MENUJU CONTROLLER --}}
                  <form action="{{ route('donations.update', $donation->donation_id) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-3 text-start">
                      <p class="text-secondary mb-1">Total uang saat ini: <strong>Rp {{ number_format($donation->donation_progress, 0, ',', '.') }}</strong></p>
                      <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Ubah Total Terkumpul Jadi (Rp)</label>
                      <input type="number" name="donation_progress" class="form-control bg-black border-secondary text-white" value="{{ (int)$donation->donation_progress }}" required>
                      <small class="text-muted text-start d-block mt-1">Masukkan angka total akumulasi (tanpa titik).</small>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2 border-top border-secondary">
                      <button type="button" class="btn btn-secondary rounded-pill px-3"
                              onclick="closeModal('modalEditDonation{{ $donation->donation_id }}')">Batal</button>
                      <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Update Progress</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            @empty
            <tr>
              <td colspan="5" class="text-center text-secondary py-5">
                <div style="font-size:2rem;opacity:.3;">💸</div>
                <div class="mt-2">Belum ada Kampanye Donasi.</div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    {{-- ═══ SETTINGS ═══ --}}
    <div class="tab-panel d-none" id="panel-settings">
      <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
          <h4 class="fw-bold text-white mb-1">⚙️ <span class="text-warning">Pengaturan</span></h4>
          <small class="text-secondary">Konfigurasi sistem</small>
        </div>
      </div>
      <div class="card bg-dark border-secondary rounded-3 text-center py-5">
        <div style="font-size:2.5rem;opacity:.3;">🔧</div>
        <div class="text-secondary mt-2">Halaman pengaturan dalam pengembangan.</div>
      </div>
    </div>

  </div>{{-- /main --}}
</div>{{-- /shell --}}


{{-- ══════════════ GLOBAL MODALS ══════════════ --}}

{{-- Add Event --}}
<div class="modal-overlay d-none" id="modalAddEvent">
  <div class="modal-box card bg-dark border-secondary rounded-4 shadow-lg" style="width:100%;max-width:480px;max-height:90vh;overflow-y:auto;">
    <div class="card-header bg-dark border-secondary d-flex justify-content-between align-items-center py-3 px-4">
      <h6 class="fw-bold text-white mb-0">✨ Tambah Event Baru</h6>
      <button class="btn-close btn-close-white btn-sm" onclick="closeModal('modalAddEvent')"></button>
    </div>
    <div class="card-body px-4 pb-4">
      <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Nama Event</label>
          <input type="text" name="event_name" class="form-control bg-black border-secondary text-white" placeholder="Nama event..." required>
        </div>
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Tanggal</label>
          <input type="text" name="event_date" class="form-control bg-black border-secondary text-white" placeholder="e.g. 12 Mei 2025" required>
        </div>
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Deskripsi</label>
          <textarea name="event_description" class="form-control bg-black border-secondary text-white" rows="3" placeholder="Deskripsi singkat..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Gambar</label>
          <input type="file" name="event_image" accept="image/*" class="form-control bg-black border-secondary text-white">
        </div>
        <div class="mb-3">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="show_in_carousel" id="car_new">
            <label class="form-check-label text-secondary small" for="car_new">Tampilkan di Hero Carousel</label>
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 pt-2 border-top border-secondary">
          <button type="button" class="btn btn-secondary rounded-pill px-3" onclick="closeModal('modalAddEvent')">Batal</button>
          <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Tambah Event</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Add Donation / Buat Kampanye --}}
<div class="modal-overlay d-none" id="modalAddDonation">
  <div class="modal-box card bg-dark border-secondary rounded-4 shadow-lg" style="width:100%;max-width:480px;max-height:90vh;overflow-y:auto;">
    <div class="card-header bg-dark border-secondary d-flex justify-content-between align-items-center py-3 px-4">
      <h6 class="fw-bold text-white mb-0">💝 Buat Kampanye Donasi</h6>
      <button class="btn-close btn-close-white btn-sm" onclick="closeModal('modalAddDonation')"></button>
    </div>
    <div class="card-body px-4 pb-4">
      
      {{-- FORM MENUJU CONTROLLER DONATIONS.STORE --}}
      <form action="{{ route('donations.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Nama Kampanye / Tujuan</label>
          <input type="text" name="donation_name" class="form-control bg-black border-secondary text-white" placeholder="Contoh: Pembangunan Gedung Baru" required>
        </div>
        
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Target Dana (Rp)</label>
          <input type="number" name="donation_target" class="form-control bg-black border-secondary text-white" placeholder="50000000" required>
          <small class="text-muted">Tanpa titik atau koma.</small>
        </div>
        
        <div class="mb-3">
          <label class="form-label text-secondary small fw-semibold text-uppercase" style="letter-spacing:.4px;font-size:.72rem;">Deskripsi Kampanye</label>
          <textarea name="donation_description" class="form-control bg-black border-secondary text-white" rows="3" placeholder="Deskripsi singkat untuk donatur..." required></textarea>
        </div>

        <div class="d-flex justify-content-end gap-2 pt-2 border-top border-secondary">
          <button type="button" class="btn btn-secondary rounded-pill px-3" onclick="closeModal('modalAddDonation')">Batal</button>
          <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Buat Kampanye</button>
        </div>
      </form>

    </div>
  </div>
</div>

{{-- Registrants --}}
<div class="modal-overlay d-none" id="modalRegistrants">
  <div class="modal-box card bg-dark border-secondary rounded-4 shadow-lg" style="width:100%;max-width:480px;max-height:90vh;overflow-y:auto;">
    <div class="card-header bg-dark border-secondary d-flex justify-content-between align-items-center py-3 px-4">
      <h6 class="fw-bold text-white mb-0" id="regTitle">Daftar Pendaftar</h6>
      <button class="btn-close btn-close-white btn-sm" onclick="closeModal('modalRegistrants')"></button>
    </div>
    <div class="card-body px-4 pb-2" id="regBody">
      <p class="text-secondary text-center py-4">Memuat data...</p>
    </div>
  </div>
</div>


@endsection