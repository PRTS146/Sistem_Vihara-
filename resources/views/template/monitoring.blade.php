@extends ('layout.head')
@extends ('layout.body')

@section('body')
<link rel="stylesheet" href="{{ asset('css/monitoring.css') }}">
    @include('components.navbar')
    @yield('contentmon')
@endsection

@push('scripts')
    <script src="{{ asset('js/monitoring.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
<script src="{{ asset('js/donation.js') }}"></script>
@endpush

