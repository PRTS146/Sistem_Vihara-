<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Rumah Abu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('mainpage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">Vihara maha giri</a>
        </li>
     
      </ul>

       <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
            <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-end me-2 d-none d-sm-block">
                    <div class="fw-bold small">{{ Auth::user()->name }}</div>
                    <div class="text-muted" style="font-size: 10px;">Umat</div>
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