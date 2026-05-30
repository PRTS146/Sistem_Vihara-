<nav class="navbar navbar-expand-lg shadow-sm sticky-top px-4"
     style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border-radius: 0 0 20px 20px;">
  <div class="container-fluid">

    {{-- Brand --}}
    <a class="navbar-brand fw-bold" href="{{ route('mainpage') }}">VIHARA MAHA GIRI BUDDHA</a>

    {{-- Accessibility dropdown beside brand --}}
    <div class="dropdown me-3">
      <button class="btn btn-sm btn-outline-secondary rounded-pill dropdown-toggle"
              type="button" data-bs-toggle="dropdown">
        ♿ Accessibility
      </button>
      <ul class="dropdown-menu shadow border-0 mt-2">
        <li>
          <button class="dropdown-item" id="btn-dyslexia" onclick="toggleDyslexia()">
            📖 Dyslexia Friendly
          </button>
        </li>
        <li>
          <button class="dropdown-item" id="btn-colorblind" onclick="toggleColorblind()">
            👁️ Colorblind Mode
          </button>
        </li>
        <li>
          <button class="dropdown-item" id="btn-largetext" onclick="toggleLargeText()">
            🔠 Large Text
          </button>
        </li>
      </ul>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">

      {{-- Nav links --}}
      <ul class="navbar-nav me-3 mb-2 mb-lg-0">
        @auth
          @if(Auth::user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('mainpage') ? 'fw-bold' : '' }}"
                 href="{{ route('mainpage') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary fw-bold {{ request()->routeIs('monitoring') ? 'active' : '' }}"
                 href="{{ route('monitoring') }}">
                <i class="bi bi-speedometer2 me-1"></i>Monitoring
              </a>
            </li>
          @endif
          {{-- USER: no nav links --}}
        @endauth
        {{-- GUEST: no nav links --}}
      </ul>

      {{-- User dropdown (only when logged in) --}}
      @auth
        <div class="dropdown">
          <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark gap-2"
             href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="text-end d-none d-sm-block">
              <div class="fw-bold small" style="line-height: 1.2;">{{ Auth::user()->admin_name }}</div>
              <div class="text-muted text-capitalize" style="font-size: 10px;">Admin</div>
            </div>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->admin_name) }}&background=random"
                 alt="Profile" class="rounded-circle" width="35" height="35">
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
            <li class="px-3 py-2 border-bottom">
              <div class="fw-bold">{{ Auth::user()->admin_name }}</div>
            </li>
            <li>
              <a class="dropdown-item mt-1 {{ request()->routeIs('profile') ? 'active fw-bold' : '' }}"
                 href="{{ route('profile') }}">
                <i class="bi bi-person-gear me-2"></i>My Profile
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}"
                    onsubmit="sessionStorage.removeItem('welcomeShown')">
                @csrf
                <button type="submit" class="dropdown-item text-danger fw-bold">
                  <i class="bi bi-box-arrow-right me-2"></i>Sign Out
                </button>
              </form>
            </li>
          </ul>
        </div>
      @endauth

    </div>
  </div>
</nav>