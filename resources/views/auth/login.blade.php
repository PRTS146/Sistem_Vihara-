@extends('layout.head')
@extends('layout.body')

@section('body')

<div class="container-fluid vh-100">
  <div class="row h-100">

    <!-- login -->
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
      <div style="width: 100%; max-width: 400px; padding: 2rem;">

        <h1 class="fw-bold mb-4">Account</h1>

        <form action="{{ route('login') }}" method="POST">
          @csrf
          @if ($errors->any())
    <div class="alert alert-danger">
      Nama atau password salah.
    </div>
  @endif

 <div class="mb-3">
  <label class="form-label">Nama</label>
  <input type="text" name="admin_name" class="form-control @error('admin_name') is-invalid @enderror" 
    placeholder="Enter Name" value="{{ old('admin_name') }}" required>
</div>

<div class="mb-3">
  <label class="form-label">Password</label>
  <div class="input-group">
    <input type="password" name="password" id="passwordInput" 
      class="form-control @error('password') is-invalid @enderror" 
      placeholder="Enter password" required>
    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
      <i class="bi bi-eye"></i>
    </button>
  </div>
</div>
            <button type="submit" id="btnLogin" class="btn btn-primary w-100 mb-2">
              <span id="btnText">Login</span>
              <span id="btnLoader" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
            </button>
        </form>
      </div>
    </div>

    
    <div class="col-md-6 p-0">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
    </div>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.querySelector('form');
    const btnLogin = document.getElementById('btnLogin');
    const btnText = document.getElementById('btnText');
    const btnLoader = document.getElementById('btnLoader');

    if (loginForm) {
      loginForm.addEventListener('submit', function () {
        // Ubah text tombol
        btnText.innerText = 'Logging in...';
        // Tampilkan animasi spinner
        btnLoader.classList.remove('d-none');
        // Disable tombol agar tidak bisa diklik 2x
        btnLogin.setAttribute('disabled', 'true');
      });
    }
  });
</script>

@endsection