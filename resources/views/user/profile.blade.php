@extends('template.pprofile')

@section('profilecontent')


<div class="container-fluid min-vh-100 py-5" 
     style="background-image:url('{{ asset('mainpage/placeholder.jpg') }}'); 
            background-size: cover; 
            background-position: center;">

  <div class="container py-5"> 
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-warning fw-bold">
          Edit Profile
        </div>
        <div class="card-body p-4">


          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif


          <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama</label>
              <input type="text" name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', Auth::user()->name) }}"
                required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

              <div class="mb-3">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control" 
                value="{{ Auth::user()->email }}" 
                disabled>
              <small class="text-muted">Email tidak dapat diubah.</small>
            </div>

            <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold mt-2">
              Simpan Perubahan
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection