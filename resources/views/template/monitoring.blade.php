@extends ('layout.head')
@extends ('layout.body')

@section('body')
    @include('components.navbar')
    @yield('contentmon')
@endsection

@push('scripts')
    <script src="{{ asset('js/monitoring.js') }}"></script>
@endpush

