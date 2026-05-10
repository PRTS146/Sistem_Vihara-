<body>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        const carousel = document.getElementById('heroCarousel');
        if (carousel) {
            carousel.addEventListener('slide.bs.carousel', e => {
                const incoming = e.relatedTarget;
                const els = incoming.querySelectorAll(
                    '.caption-sub, .caption-title, .caption-desc, .caption-buttons');
                els.forEach((el, i) => {
                    el.style.animation = 'none';
                    el.offsetHeight;
                    el.style.animation = `fadeUp 0.8s ease both`;
                    el.style.animationDelay = `${0.1 + i * 0.15}s`;
                });
            });
        }


        const gallery = document.querySelector('.overflow-auto');
        if (gallery) {
            let isDown = false;
            let startX;
            let scrollLeft;

            gallery.addEventListener('mousedown', e => {
                isDown = true;
                gallery.style.cursor = 'grabbing';
                startX = e.pageX - gallery.offsetLeft;
                scrollLeft = gallery.scrollLeft;
            });

            gallery.addEventListener('mouseleave', () => {
                isDown = false;
                gallery.style.cursor = 'grab';
            });

            gallery.addEventListener('mouseup', () => {
                isDown = false;
                gallery.style.cursor = 'grab';
            });

            gallery.addEventListener('mousemove', e => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - gallery.offsetLeft;
                const walk = x - startX;
                gallery.scrollLeft = scrollLeft - walk;
            });
        }
    </script>

    @yield('scripts')

</body>

</html>
