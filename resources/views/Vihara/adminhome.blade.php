@extends('template.homeadmin')

@section('title', 'Dashboard - Maha Giri Buddha')

@section('content')
    <div class="dashboard-grid">
        
        <div class="panel table-container">
            <table>
                <thead>
                    <tr>
                        <th>USER</th>
                        <th>SLOT CODE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Replace this @for loop with a @foreach($bookings as $booking) when you have real database data --}}
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
@endsection