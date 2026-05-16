@extends('template.main')

@section('content')

<div class="container-fluid vh-100">
  <div class="row h-100">

    <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
      <div style="width: 100%; max-width: 400px; padding: 2rem;">

        <h1 class="fw-bold mb-4">Register</h1>

        <form action="{{ route('register') }}" method="POST">
          @csrf
          
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
              placeholder="Masukkan Nama" value="{{ old('name') }}" required autofocus>
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
              placeholder="Masukkan Email" value="{{ old('email') }}" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group">
              <input type="password" name="password" id="passwordInput" 
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="Masukkan password" required>
              <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="bi bi-eye"></i>
              </button>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" 
              placeholder="Ketik ulang password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>

          <div class="text-center">
            <span class="text-muted">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a>
          </div>

        </form>
      </div>
    </div>

    <div class="col-md-6 p-0">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
    </div>

  </div>
</div>

@endsection