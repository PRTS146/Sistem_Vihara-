<body>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/monitoring.js') }}"></script>

    <script>
        // 1. Carousel
        const carousel = document.getElementById('heroCarousel');
        if (carousel) {
            carousel.addEventListener('slide.bs.carousel', e => {
                const incoming = e.relatedTarget;
                const els = incoming.querySelectorAll('.caption-sub, .caption-title, .caption-desc, .caption-buttons');
                els.forEach((el, i) => {
                    el.style.animation = 'none';
                    el.offsetHeight;
                    el.style.animation = `fadeUp 0.8s ease both`;
                    el.style.animationDelay = `${0.1 + i * 0.15}s`;
                });
            });
        }

        // 2. Gallery drag scroll
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

        // 3. Toggle password
        const togglePassword = document.querySelector('#togglePassword');
        if (togglePassword) {
            const passwordInput = document.querySelector('#passwordInput');
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('active');
            });
        }

        // 4. Slot modal
        function openSlotModal(slotNumber) {
            const slotEl = document.getElementById('modalSlotNumber');
            if (slotEl) {
                slotEl.textContent = slotNumber;
                const modal = new bootstrap.Modal(document.getElementById('slotModal'));
                modal.show();
            }
        }

        // 5. Join modal
        const joinModal = document.getElementById('joinModal');
        if (joinModal) {
            joinModal.addEventListener('show.bs.modal', e => {
                const trigger = e.relatedTarget;
                const route = trigger.getAttribute('data-route');
                document.getElementById('joinYesBtn').setAttribute('href', route);
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {  
            if (!sessionStorage.getItem('welcomeShown')) {
                Swal.fire({
                    title: '🙏 Namo Buddhaya!',
                    text: 'Selamat Datang, {{ Auth::user()->name }}!',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false,
                    padding: '2rem',
                    color: '#716add',
                    backdrop: `rgba(0,0,123,0.4)`
                });
                sessionStorage.setItem('welcomeShown', 'true');
            }
        });
    </script>
    @endauth

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            // Cek apakah elemen kalender ada di halaman ini untuk mencegah error!
            if (calendarEl) { 
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            }
        });
    </script>

    @yield('scripts')

    

</body>