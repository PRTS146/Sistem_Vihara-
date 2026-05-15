<body>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script>
        // Carousel
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

        // Gallery drag scroll
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

        // Toggle password
        const togglePassword = document.querySelector('#togglePassword');
        if (togglePassword) {
            const passwordInput = document.querySelector('#passwordInput');
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('active');
            });
        }

        // Slot modal
        function openSlotModal(slotNumber) {
            const slotEl = document.getElementById('modalSlotNumber');
            if (slotEl) {
                slotEl.textContent = slotNumber;
                const modal = new bootstrap.Modal(document.getElementById('slotModal'));
                modal.show();
            }
        }

        // Join modal
        const joinModal = document.getElementById('joinModal');
        if (joinModal) {
            joinModal.addEventListener('show.bs.modal', e => {
                const trigger = e.relatedTarget;
                const route = trigger.getAttribute('data-route');
                document.getElementById('joinYesBtn').setAttribute('href', route);
            });
        }
    </script>



<script>
  
  const events = {
    '2025-5-12': 'Perayaan Waisak 2025',
    '2025-5-21': 'Doa Bersama',
    '2025-6-1':  'Meditasi Pagi',
    '2025-6-15': 'Bakti Sosial',
  };

  const monthNames = [
    'Januari','Februari','Maret','April','Mei','Juni',
    'Juli','Agustus','September','Oktober','November','Desember'
  ];

  let currentDate = new Date();
  let currentMonth = currentDate.getMonth();
  let currentYear = currentDate.getFullYear();

  function changeMonth(direction) {
    currentMonth += direction;
    if (currentMonth > 11) { currentMonth = 0; currentYear++; }
    if (currentMonth < 0)  { currentMonth = 11; currentYear--; }
    renderCalendar();
  }

  function renderCalendar() {
    document.getElementById('calendarTitle').textContent =
      `📆 ${monthNames[currentMonth]} ${currentYear}`;

    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const today = new Date();

    let html = '<tr>';
    let day = 1;

        for (let i = 0; i < firstDay; i++) {
      html += '<td class="text-muted bg-light"></td>';
    }

    let cellCount = firstDay;

    while (day <= daysInMonth) {
      if (cellCount % 7 === 0 && day !== 1) {
        html += '</tr><tr>';
      }

      const dateKey = `${currentYear}-${currentMonth + 1}-${day}`;
      const isToday = day === today.getDate() &&
                      currentMonth === today.getMonth() &&
                      currentYear === today.getFullYear();
      const hasEvent = events[dateKey];

      let cellClass = '';
      let tooltip = '';

      if (isToday) {
        cellClass = 'bg-primary text-white fw-bold';
      } else if (hasEvent) {
        cellClass = 'bg-warning fw-bold';
        tooltip = `title="${hasEvent}"`;
      }

      html += `<td class="${cellClass} p-2" ${tooltip} style="cursor: ${hasEvent ? 'pointer' : 'default'}; min-width: 40px;">
                 ${day}
                 ${hasEvent ? '<br><small style="font-size:0.6rem;">📅</small>' : ''}
               </td>`;

      day++;
      cellCount++;
    }

    
    while (cellCount % 7 !== 0) {
      html += '<td class="text-muted bg-light"></td>';
      cellCount++;
    }

    html += '</tr>';
    document.getElementById('calendarBody').innerHTML = html;
  }

  renderCalendar();
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@auth
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah pesan sambutan sudah pernah muncul di sesi ini
        if (!sessionStorage.getItem('welcomeShown')) {
            Swal.fire({
                title: '🙏 Namo Buddhaya!',
                text: 'Selamat Datang, {{ Auth::user()->name }}!',
                icon: 'success',
                timer: 3000, // Hilang otomatis dalam 3 detik
                showConfirmButton: false,
                padding: '2rem',
                color: '#716add',
                backdrop: `rgba(0,0,123,0.4)`
            });
            // Tandai bahwa popup sudah muncul
            sessionStorage.setItem('welcomeShown', 'true');
        }
    });
    </script>


 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
    @endauth

    @yield('scripts')

</body>
</html>