<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vihara Maha Giri Buddha</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* HERO */
        .hero {
            background: url('/images/vihara.jpg') center/cover no-repeat;
            height: 100vh;
            color: white;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }

        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255,255,255,0.9);
            border-radius: 30px;
            margin: 20px auto;
            width: 80%;
        }

        /* SECTION */
        section {
            padding: 80px 0;
        }

        .timeline {
            position: relative;
            border-left: 3px solid orange;
            margin-left: 50%;
        }

        .timeline-item {
            margin-bottom: 50px;
            position: relative;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: -10px;
            width: 20px;
            height: 20px;
            background: orange;
            border-radius: 50%;
        }

        /* BERITA */
        .news-card {
            background: #f5f5f5;
            padding: 20px;
        }

        /* GALLERY */
        .gallery div {
            background: #ddd;
            height: 120px;
            margin: 5px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow px-4">
    <a class="navbar-brand fw-bold" href="#">Amphoreus</a>

    <div class="ms-auto">
        <a href="#" class="mx-2">Home</a>
        <a href="#" class="mx-2">Denah</a>
        <a href="#" class="mx-2">Kalender</a>
        <a href="#" class="mx-2">About</a>
        <a href="#" class="mx-2">Logout</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div class="hero-overlay"></div>

    <div class="hero-content container">
        <h4 class="text-warning">Selamat Datang Di</h4>
        <h1 class="fw-bold display-4">Vihara Maha Giri Buddha</h1>
        <p>Kami dari Vihara Maha Giri Buddha mengajak anda untuk bergabung</p>

        <div class="mt-4">
            <button class="btn btn-warning btn-custom">About Us</button>
            <button class="btn btn-outline-light btn-custom">Contact Us</button>
        </div>
    </div>
</div>

<!-- TENTANG -->
<section class="container text-center">
    <h4>Tentang Vihara</h4>

    <div class="row mt-5">
        <div class="col-md-6">
            <img src="/images/vihara2.jpg" class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section class="container">
    <div class="timeline">
        <div class="timeline-item">
            <p>Lorem ipsum dolor sit amet...</p>
        </div>
        <div class="timeline-item">
            <p>Lorem ipsum dolor sit amet...</p>
        </div>
    </div>
</section>

<!-- BERITA -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3 bg-warning text-white p-4">
                <h4>BERITA TERBARU</h4>
            </div>

            <div class="col-md-3 news-card">
                <h6>WAISAK 2026</h6>
                <p>Deskripsi berita...</p>
            </div>

            <div class="col-md-3 news-card">
                <h6>ASALHA PUJA</h6>
                <p>Deskripsi berita...</p>
            </div>

            <div class="col-md-3 news-card">
                <h6>KATHINA PUJA</h6>
                <p>Deskripsi berita...</p>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<section class="container text-center">
    <h4>Galery</h4>

    <div class="row gallery mt-4">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
    </div>
</section>

<!-- CONTACT -->
<section class="container text-center">
    <h4>Hubungi Kami</h4>
    <p>Instagram | WhatsApp | Email</p>
</section>

</body>
</html>