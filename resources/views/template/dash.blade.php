@extends('layout.head')
@extends('layout.body')

@section('body')
     @extends('components.dashnavbar')
     @extends('components.popupdash')
     @extends('components.popupdonasi')
    @yield('dashcontent')
    
@endsection