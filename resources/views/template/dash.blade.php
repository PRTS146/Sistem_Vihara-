@extends('layout.head')
@extends('layout.body')

@section('body')
     @extends('navbar.dashnav')
     @extends('popup.popupdash')
     @extends('popup.popupdonasi')
    @yield('dashcontent')
    
@endsection