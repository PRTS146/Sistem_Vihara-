@extends('layout.head')
@extends('layout.body')

@section('body')

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
      placeholder="Enter password" required>
    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
      <i class="bi bi-eye"></i>
    </button>
    @error('password')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>
</div>


    <div class="mb-3">
  <label class="form-label">Confirm Password</label>
  <div class="input-group">
    <input type="password" name="password_confirmation" id="passwordConfirmationInput" 
      class="form-control @error('password') is-invalid @enderror" 
      placeholder="Confirm password" required>
    @error('password')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>
</div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Register</button>

            <a href="{{ route('login') }}">Already have an account?</a>


        </form>
      </div>
    </div>

    <div class="col-md-6 p-0">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
    </div>

  </div>
</div>

@endsection