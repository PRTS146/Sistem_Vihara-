@extends('template.home')

@section('content')
    @include('template.carousel')
    @include('template.about')
    @include('template.event')
    @include('template.rumahabu')
    @include('template.donation')
    @include('template.gallery')
    @include('template.footer')

    @include('popup.popupdonasi')
    @include('popup.popuprumahabu')
@endsection