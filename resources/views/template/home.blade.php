@extends('layout.head')
@extends('layout.body')

@section('body')
<link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/rumahabu.css') }}">
<link rel="stylesheet" href="{{ asset('css/accessibility.css') }}">
<script src="{{ asset('js/register.js') }}"></script>
<script src="{{ asset('js/donation.js') }}"></script>
<script src="{{ asset('js/rumahabu.js') }}"></script>
<script src="{{ asset('js/accessibility.js') }}"></script>
    @include('components.navbar')
    @include('popup.register')
    @include('popup.popupdonasi')

    @yield('content')
    
    
@endsection