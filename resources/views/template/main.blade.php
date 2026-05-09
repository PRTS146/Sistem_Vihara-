<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vihara Maha Giri Buddha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   
</head>
<body>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">VIHARA MAHA GIRI BUDDHA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
     @yield('content')
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
     <script>
  
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