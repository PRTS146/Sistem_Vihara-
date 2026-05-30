<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Donation;
use App\Models\SlotAbu;

class AdminController extends Controller
{
    public function adminhome()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        
        return view('Vihara.adminhome', compact('events'));
    }

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
            
            SlotAbu::findOrFail($request->slot_id)->update(['slot_status' => $request->new_status]);
            return back()->with('success', 'Slot status updated.');
    }
    
    public function monitoring()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        $donations = Donation::latest()->get();
        $slots = SlotAbu::all();

        $totalDonationCampaigns = $donations->count();
        $totalEvents = $events->count();
        $totalParticipants = Event::sum('event_counter');
        $slotsAvailable = SlotAbu::where('slot_status', 'Tersedia')->count();
        $slotsTaken = SlotAbu::where('slot_status', 'Telah Diambil')->count();
        $totalSlots = $slots->count();

        return view('vihara.monitoring', compact(
            'events', 'donations', 'slots',
            'totalDonationCampaigns', 'totalEvents', 'totalParticipants',
            'slotsAvailable', 'slotsTaken', 'totalSlots'
        ));
    }
}
