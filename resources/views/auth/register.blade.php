@extends('template.main')

@section('content')

<div class="container-fluid vh-100">
  <div class="row h-100">

    <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
      <div style="width: 100%; max-width: 400px; padding: 2rem;">

        <h1 class="fw-bold mb-4">Create Account</h1>

        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Full Name" required autofocus>
            @error('name') 
              <div class="invalid-feedback fw-bold">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Email" required>
            @error('email') 
              <div class="invalid-feedback fw-bold">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group has-validation">
              <input type="password" name="password" id="passwordInput" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required>
              <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
              </button>
              @error('password')
                <div class="invalid-feedback fw-bold">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="passwordConfirmInput" class="form-control" placeholder="Repeat password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>

          <div class="text-center">
              <span>Already have an account? </span>
              <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
          </div>

        </form>
      </div>
    </div>

    <div class="col-md-6 p-0 d-none d-md-block">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
    </div>

  </div>
</div>

<script>
  // Script untuk toggle password (sama dengan login)
  const togglePassword = document.querySelector('#togglePassword');
  const passwordInput = document.querySelector('#passwordInput');
  const passwordConfirmInput = document.querySelector('#passwordConfirmInput');

  togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    passwordConfirmInput.setAttribute('type', type); // Sekalian toggle konfirmasi password
  });
</script>

@endsection