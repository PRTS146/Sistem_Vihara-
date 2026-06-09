@extends('template.landing.home')

@section('content')
    @include('template.landing.carousel')
    @include('template.landing.about')
    @include('template.landing.event')
    @include('template.landing.rumahabu')
    @include('template.landing.donation')
    @include('template.landing.gallery')
    @include('template.landing.footer')

    @include('popup.popupdonasi')
    @include('popup.popuprumahabu')
@endsection