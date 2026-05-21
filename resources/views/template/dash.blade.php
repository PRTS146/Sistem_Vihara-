@extends('layout.head')
@extends('layout.body')

@section('body')
<link rel="stylesheet" href="{{ asset('css/monitoring.css') }}">
    @include('components.navbar') 
    
    @include('popup.popupdash')
    @include('popup.popupdonasi')
    
    @yield('dashcontent')
@endsection