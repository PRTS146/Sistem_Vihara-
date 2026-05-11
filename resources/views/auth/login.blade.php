@extends('template.main')

@section('content')

<div class="container-fluid vh-100">
  <div class="row h-100">

    <!-- login -->
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
      <div style="width: 100%; max-width: 400px; padding: 2rem;">

        <h1 class="fw-bold mb-4">Account</h1>

        <form action="{{ route('login') }}" method="POST">
          @csrf

          
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>

          
        <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter password" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </button>
            </div>
        </div>

          
          <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>

            <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>

            <a href="{{ route('register') }}">Sign Up</a>


        </form>
      </div>
    </div>

    
    <div class="col-md-6 p-0">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
    </div>

  </div>
</div>

<script>
  const togglePassword = document.querySelector('#togglePassword');
  const passwordInput = document.querySelector('#passwordInput');

  togglePassword.addEventListener('click', function () {
    // Mengecek apakah tipe input saat ini adalah password
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    
    // Mengubah tipe input sesuai hasil cek di atas
    passwordInput.setAttribute('type', type);
    
    // Opsional: Membuat tombol terlihat sedikit ditekan/fokus saat diklik
    this.classList.toggle('active');
  });
</script>

@endsection