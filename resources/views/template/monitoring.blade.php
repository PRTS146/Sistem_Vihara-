@extends ('layout.head')
@extends ('layout.body')

@section('body')
<link rel="stylesheet" href="{{ asset('css/monitoring.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    @include('components.navbar')
    @yield('contentmon')
@endsection
