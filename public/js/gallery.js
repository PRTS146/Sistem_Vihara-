  function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-img').alt = caption;
    document.getElementById('lightbox-caption').textContent = caption;
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden'; // prevent background scroll
  }

  function closeLightbox(event) {
    // Close only if clicking the overlay background or the × button
    if (!event || event.target === document.getElementById('lightbox') || event.currentTarget.tagName === 'BUTTON') {
      document.getElementById('lightbox').classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  // Close with Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
  });