<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Vihara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #2c6b8a;
            font-family: Arial, sans-serif;
        }

        .container-box {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
        }

        .navbar-custom {
            background: #eee;
            border-radius: 30px;
            padding: 10px 20px;
        }

        .card-box {
            background: white;
            border-radius: 10px;
            padding: 10px;
        }

        .red-box {
            background: red;
            height: 80px;
            margin-bottom: 10px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .calendar div {
            background: #eaeaea;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
        }

        .event-box {
            background: #eaeaea;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

<div class="container mt-4">

    <!-- NAVBAR -->
    <div class="navbar-custom d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Maha Giri Buddha</h5>
        <div>
            <a href="#" class="mx-2">Home</a>
            <a href="#" class="mx-2">Denah</a>
            <a href="#" class="mx-2">Help</a>
            <a href="#" class="mx-2">Contacts</a>
            <a href="#" class="mx-2">Logout</a>
        </div>
    </div>

    <div class="container-box">

        <div class="row">
            <!-- LEFT -->
            <div class="col-md-3">
                <div class="card-box">
                    <strong>KEGIATAN RUTIN</strong>

                    <div class="red-box"></div>
                    <div class="red-box"></div>
                    <div class="red-box"></div>
                </div>
            </div>

            <!-- CENTER -->
            <div class="col-md-6">
                <div class="card-box">
                    <div class="d-flex justify-content-between mb-2">
                        <strong>Kalender</strong>
                        <div>
                            ◀ ▶
                        </div>
                    </div>

                    <div class="calendar">
                        @for ($i = 1; $i <= 42; $i++)
                            <div>{{ $i }}</div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-md-3">
                <div class="card-box">
                    <strong>E-Charity</strong>

                    @for ($i = 1; $i <= 6; $i++)
                        <div class="event-box">event {{ $i }}</div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- BOTTOM -->
        <div class="mt-4">
            <strong>KEGIATAN VIHARA</strong>

            <div class="row mt-2">
                <div class="col-md-4"><div class="red-box"></div></div>
                <div class="col-md-4"><div class="red-box"></div></div>
                <div class="col-md-4"><div class="red-box"></div></div>
            </div>
        </div>

    </div>

</div>

</body>
</html>