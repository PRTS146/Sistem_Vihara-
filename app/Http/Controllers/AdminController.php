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


        $donations = Donation::latest()->get();
        

        $totalAcara = Event::count();
        $totalPeserta = Event::sum('event_counter');

        $slotTersedia = SlotAbu::where('slot_status', 'tersedia')->count();
        $slotDiambil = SlotAbu::where('slot_status', 'telah diambil')->count();
        $totalSlot = $slotTersedia + $slotDiambil;

        return view('template.monitoring', compact(
            'totalAcara',
            'totalPeserta',
            'slotTersedia',
            'slotDiambil',
            'totalSlot',
            'donations'
        ));
    }

    public function updateSlotStatus(Request $request)
{
    $request->validate([
        'slot_id'    => 'required|exists:slot_abus,id',
        'new_status' => 'required|string',
    ]);

    SlotAbu::findOrFail($request->slot_id)->update(['status' => $request->new_status]);
    return back()->with('success', 'Slot status updated.');
}


 public function monitoring()
{
    $events = collect();
    $donations = collect();

    return view('vihara.monitoring', compact('events', 'donations'));
}

}
