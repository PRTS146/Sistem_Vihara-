<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Maha Giri Buddha')</title>
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #2b6788;
            padding: 20px;
            color: #333;
        }

        .navbar {
            background-color: #ffffff;
            border-radius: 40px;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #777;
        }

        .navbar-links {
            display: flex;
            gap: 30px;
        }

        .navbar-links a {
            text-decoration: none;
            color: #777;
            font-size: 18px;
            font-weight: 500;
        }

        .navbar-logout {
            text-decoration: none;
            color: #555;
            font-size: 18px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 3fr 7fr;
            gap: 20px;
        }

        .dashboard-bottom-row {
            display: grid;
            grid-template-columns: 7fr 3fr;
            gap: 20px;
            margin-top: 20px;
        }

        .panel {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .panel-title {
            font-size: 18px;
            font-weight: bold;
        }

        .table-container {
            padding: 0;
            overflow: hidden;
            border: 2px solid #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            text-align: center;
        }

        th {
            background-color: #fff;
            padding: 10px;
            border-bottom: 2px solid #ccc;
            font-weight: bold;
        }

        td {
            padding: 8px;
        }

        tr:nth-child(even) { background-color: #e0e0e0; }
        tr:nth-child(odd) { background-color: #f9f9f9; }

        .number-grid {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 10px;
        }

        .number-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            cursor: pointer;
        }

        .legend {
            display: flex;
            gap: 15px;
            font-size: 12px;
            align-items: center;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .dot.red { background-color: #e74c3c; }
        .dot.yellow { background-color: #f1c40f; }
        .dot.green { background-color: #2ecc71; }

        .arrows {
            background-color: #f0f0f0;
            border-radius: 20px;
            padding: 2px 15px;
            display: flex;
            gap: 30px;
        }

        .donation-section {
            background: none;
            box-shadow: none;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .donation-title {
            color: #fff;
            text-align: center;
            font-size: 20px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .donation-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .event-btn {
            background-color: #fff;
            border: none;
            border-radius: 8px;
            padding: 25px 0;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background-color 0.2s;
        }

        .event-btn:hover {
            background-color: #f0f0f0;
        }
    </style>
    @stack('styles')
</head>
<body>

    <nav class="navbar">
        <div class="navbar-brand">Maha Giri Buddha</div>
        <div class="navbar-links">
            <a href="{{ route('mainpage') }}">Home</a>
            <a href="{{ route('monitoring') }}">Monitoring</a>
        </div>
        <a href="{{ route('mainpage') }}" class="navbar-logout">Logout</a> 
    </nav>

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>