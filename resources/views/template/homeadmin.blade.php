<body>

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>