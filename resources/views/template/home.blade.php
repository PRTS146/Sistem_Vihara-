@extends('layout.head')
@extends('layout.body')

@section('body')
<link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
<script src="{{ asset('js/register.js') }}"></script>
<script src="{{ asset('js/donation.js') }}"></script>
    @include('components.navbar')
    @include('popup.register')
    @include('popup.popupdonasi')

    @yield('content')
    
    
@endsection
