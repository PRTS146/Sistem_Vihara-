@extends('layout.head')
@extends('layout.body')

@section('body')
<script src="{{ asset('js/register.js') }}"></script>
    @include('components.navbar')
    @include('popup.register')
    @include('popup.popupdonasi')
    @yield('content')
    
@endsection
