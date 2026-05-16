<nav class="navbar">
  <span class="nav-brand">Maha Giri Buddha</span>
  <div class="nav-links">
    <a href="{{ route('mainpage') }}">Home</a>
    <a href="{{ route('dashboard') }}">dashboard</a>
    <a href="{{ route('abu') }}">Rumah Abu</a>
    <a href="{{ route('monitoring') }}">Monitoring</a>
  </div>
  
  <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: flex; align-items: center;" onsubmit="sessionStorage.removeItem('welcomeShown')">
    @csrf
    <button type="submit" class="nav-logout">Logout</button>
  </form>
</nav>