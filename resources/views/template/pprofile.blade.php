@extends('layout.head')
@extends('layout.body')

@section('body')
    @include('navbar.profilenav')
    @yield('profilecontent')
@endsection