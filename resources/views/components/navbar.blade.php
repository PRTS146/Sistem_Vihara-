<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold" href="{{ route('mainpage') }}">VIHARA MAHA GIRI BUDDHA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('mainpage') ? 'active fw-bold' : '' }}" href="{{ route('mainpage') }}">Home</a>
        </li>
        
        @auth

        @if(Auth::user()->role === 'admin')
        <li class="nav-item ms-lg-2 ps-lg-2 border-start">
          <a class="nav-link text-primary fw-bold {{ request()->routeIs('monitoring') ? 'active' : '' }}" href="{{ route('monitoring') }}">
              Monitoring
          </a>
        </li>
        @endif
        @endauth
      </ul>

      <div class="d-flex align-items-center gap-2">
        @auth
        <div class="dropdown">
            <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-end me-2 d-none d-sm-block">
                    <div class="fw-bold small" style="line-height: 1.2;">{{ Auth::user()->name }}</div>
                    <div class="text-muted text-capitalize" style="font-size: 10px;">{{ Auth::user()->role }}</div>
                </div>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" 
                     alt="Profile" class="rounded-circle" width="35" height="35">
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                <li class="px-3 py-2 border-bottom">
                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                    <div class="small text-muted">{{ Auth::user()->email }}</div>
                </li>
                <li>
                  <a class="dropdown-item mt-2 {{ request()->routeIs('profile') ? 'active fw-bold' : '' }}" href="{{ route('profile') }}">
                    <i class="bi bi-person-gear me-2"></i>My Profile
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" onsubmit="sessionStorage.removeItem('welcomeShown')">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger fw-bold">Sign Out</button>
                    </form>
                </li>
            </ul>
        </div>
       
        @endauth
      </div>

    </div>
  </div>
</nav>