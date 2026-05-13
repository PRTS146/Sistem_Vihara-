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
          @if ($errors->any())
    <div class="alert alert-danger">
      Email atau password salah.
    </div>
  @endif

 <div class="mb-3">
  <label class="form-label">Email</label>
  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
    placeholder="Enter Email" value="{{ old('email') }}" required>
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



@endsection