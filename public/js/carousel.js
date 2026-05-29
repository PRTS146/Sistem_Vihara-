
function smoothTo(sectionId) {
  const el = document.getElementById(sectionId);
  if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
}


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