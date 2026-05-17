<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
     <span class="nav-brand">Maha Giri Buddha</span>
    </button>
   <div class="nav-links">
    <a href="{{ route('mainpage') }}">Home</a>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('abu') }}">Rumah Abu</a>
    <a href="{{ route('monitoring') }}">Monitoring</a>
  </div>

       <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
            <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-end me-2 d-none d-sm-block">
                    <div class="fw-bold small">{{ Auth::user()->name }}</div>
                    <div class="text-muted" style="font-size: 10px;">Admin</div>
                </div>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" 
                     alt="Profile" class="rounded-circle" width="40" height="40">
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                <li class="px-3 py-2 border-bottom">
                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                    <div class="small text-muted">{{ Auth::user()->email }}</div>
                </li>
                <li><a class="dropdown-item mt-2" href="{{ route('profile') }}">My Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" onsubmit="sessionStorage.removeItem('welcomeShown')">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger fw-bold">
                             Sign Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</nav>