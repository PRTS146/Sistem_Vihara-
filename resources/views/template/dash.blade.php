@extends('layout.head')
@extends('layout.body')

@section('body')
     @extends('navbar.dashnav')
     @extends('components.popupdash')
     @extends('components.popupdonasi')
    @yield('dashcontent')
    
@endsection