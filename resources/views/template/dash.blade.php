@extends('layout.head')
@extends('layout.body')

@section('body')
    @include('components.navbar') 
    
    @include('popup.popupdash')
    @include('popup.popupdonasi')
    
    @yield('dashcontent')
@endsection