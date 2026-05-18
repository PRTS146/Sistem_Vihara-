@extends('layout.head')
@extends('layout.body')

@section('body')
    @include('components.navbar')
    @yield('profilecontent')
@endsection