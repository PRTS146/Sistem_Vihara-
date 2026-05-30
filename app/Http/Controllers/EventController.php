<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    // guest

    public function index()
    {
        $events = Event::whereDate('event_date', '>=', Carbon::today())
                       ->orderBy('event_date', 'asc')
                       ->get();

        return view('vihara.home', compact('events'));
    }

    public function registerEvent(Request $request, $id)
    {
        // honeypot, honeypot field hidden lewat css harus kosong dan kalau keisi berarti bot
        if ($request->filled('honeypot_trap')) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Berhasil mendaftar acara!']);
            }
            return back()->with('success', 'Berhasil mendaftar acara!'); 
        }

        $event = Event::findOrFail($id);

        $event->increment('event_counter');

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Berhasil mendaftar acara!', 'counter' => $event->event_counter]);
        }

        return back()->with('success', 'Berhasil mendaftar acara!');
    }

    // admin

    public function adminIndex()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('Vihara.adminhome', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string',
            'event_description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_status' => 'required|string',
        ]);

        Event::create([
            'admin_id' => Auth::user()->admin_id,
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_status' => $request->event_status,
            'event_counter' => 0
        ]);

        return back()->with('success', 'Acara baru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'event_name' => 'required|string',
            'event_description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_status' => 'required|string',
        ]);

        $event->update($request->all());

        return back()->with('success', 'Acara berhasil diupdate');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return back()->with('success', 'Acara berhasil dihapus');
    }
}