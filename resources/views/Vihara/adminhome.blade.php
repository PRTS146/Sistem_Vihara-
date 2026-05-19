@extends('template.homeadmin')
 @section('content')
<style>
    /* Scope styles to the dashboard to avoid interfering with your navbar */
    .dashboard-container {
        padding: 20px;
        background-color: #2b6788; /* Matches the image background */
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Top Row Layout (Table is narrower, Slots are wider) */
    .dashboard-top-row {
        display: grid;
        grid-template-columns: 2.5fr 7.5fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    /* Bottom Row Layout (Calendar is wider, Donations are narrower) */
    .dashboard-bottom-row {
        display: grid;
        grid-template-columns: 7fr 3fr;
        gap: 20px;
    }

    /* Common Panel Styling */
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
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    /* --- Table Section --- */
    .table-container {
        padding: 0;
        overflow: hidden;
        border: 2px solid #333;
    }

    .booking-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
        text-align: center;
    }

    .booking-table th {
        background-color: #fff;
        padding: 12px 10px;
        border-bottom: 2px solid #ccc;
        font-weight: bold;
        color: #333;
    }

    .booking-table td {
        padding: 10px;
        color: #555;
    }

    .booking-table tr:nth-child(even) { background-color: #d9d9d9; }
    .booking-table tr:nth-child(odd) { background-color: #f2f2f2; }

    /* --- Slots & Calendar Grids --- */
    .number-grid {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        gap: 10px;
    }

    .number-box {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px 0;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        cursor: pointer;
        transition: transform 0.1s;
    }

    .number-box:hover {
        transform: scale(1.05);
    }

    /* Legend */
    .legend {
        display: flex;
        gap: 15px;
        font-size: 12px;
        align-items: center;
        font-weight: 600;
        color: #555;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .dot.red { background-color: #e74c3c; }
    .dot.yellow { background-color: #f1c40f; }
    .dot.green { background-color: #2ecc71; }

    /* Controls (Arrows) */
    .arrows {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 4px 15px;
        display: flex;
        gap: 25px;
        color: #777;
        cursor: pointer;
    }

    /* --- Online Donation --- */
    .donation-section {
        display: flex;
        flex-direction: column;
    }

    .donation-title {
        color: #fff;
        text-align: center;
        font-size: 22px;
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
        font-size: 18px;
        font-weight: 500;
        color: #333;
        text-align: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: background-color 0.2s;
    }

    .event-btn:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="dashboard-container">
    
    <div class="dashboard-top-row">
        
        <div class="panel table-container">
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>USER</th>
                        <th>SLOT CODE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 9; $i++)
                        <tr>
                            <td>Kelvin</td>
                            <td>127467492843</td>
                            <td>Booking</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">Available Slots</div>
                <div class="legend">
                    <div class="legend-item"><span class="dot red"></span> Tidak Tersedia</div>
                    <div class="legend-item"><span class="dot yellow"></span> Booking</div>
                    <div class="legend-item"><span class="dot green"></span> Masih Tersedia</div>
                </div>
                <div class="arrows">
                    <span>◄</span>
                    <span>►</span>
                </div>
            </div>
            
            <div class="number-grid">
                @for ($i = 1; $i <= 40; $i++)
                    <div class="number-box">{{ $i }}</div>
                @endfor
            </div>
        </div>

    </div>

    <div class="dashboard-bottom-row">
        
        <div class="panel">
            <div class="panel-header">
                <div class="panel-title">Kalender</div>
                <div class="arrows">
                    <span>◄</span>
                    <span>►</span>
                </div>
            </div>
            
            <div class="number-grid">
                @for ($i = 1; $i <= 40; $i++)
                    <div class="number-box">{{ $i }}</div>
                @endfor
            </div>
        </div>

        <div class="donation-section">
            <div class="donation-title">Online Donation</div>
            <div class="donation-grid">
                @for ($i = 1; $i <= 6; $i++)
                    <button class="event-btn">Event {{ $i }}</button>
                @endfor
            </div>
        </div>

    </div>

</div>
@endsection