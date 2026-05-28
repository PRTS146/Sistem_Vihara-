<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Donation;
use App\Models\SlotAbu;

class AdminController extends Controller
{
public function index()
    {
        // bagian donasi belum di tambahkan

        $totalAcara = Event::count();
        $totalPeserta = Event::sum('event_counter');

        $slotTersedia = SlotAbu::where('slot_status', 'tersedia')->count();
        $slotDiambil = SlotAbu::where('slot_status', 'telah diambil')->count();
        $totalSlot = SlotAbu::count();

        return view('template.monitoring', compact(
            'totalAcara',
            'totalPeserta',
            'slotTersedia',
            'slotDiambil',
            'totalSlot'
            // bagian donasi belum
        ));
    }
}
