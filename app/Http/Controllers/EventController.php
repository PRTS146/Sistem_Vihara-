<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            return back()->with('success', 'Berhasil mendaftar acara!'); 
        }

        $event = Event::findOrFail($id);

        $event->increment('event_counter');

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

     public function home()
    {
        $events = Event::all();
        return view('vihara.home', compact('events'));
    }

    // Monitoring room
     public function index()
    {
        $events = Event::withCount('registrations')->latest()->get();
        return view('monitoring.events', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name'        => 'required|string|max:255',
            'event_date'        => 'required|string',
            'event_description' => 'nullable|string',
            'event_image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['event_name', 'event_date', 'event_description']);
        $data['show_in_carousel'] = $request->has('show_in_carousel');

        if ($request->hasFile('event_image')) {
            $data['event_image'] = $request->file('event_image')->store('events', 'public');
        }

        Event::create($data);
        return back()->with('success', 'Event berhasil ditambahkan.');
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_name'        => 'required|string|max:255',
            'event_date'        => 'required|string',
            'event_description' => 'nullable|string',
            'event_image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['event_name', 'event_date', 'event_description']);
        $data['show_in_carousel'] = $request->has('show_in_carousel');

        if ($request->hasFile('event_image')) {
            $data['event_image'] = $request->file('event_image')->store('events', 'public');
        }

        $event->update($data);
        return back()->with('success', 'Event berhasil diupdate.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('success', 'Event berhasil dihapus.');
    }

    // Register / unregister (called via AJAX from register.js)
    public function register(Request $request, Event $event)
    {
        $userId = Auth::id();

        $existing = EventRegistration::where('event_id', $event->id)
                                     ->where('user_id', $userId)
                                     ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'unregistered']);
        }

        EventRegistration::create([
            'event_id' => $event->id,
            'user_id'  => $userId,
        ]);

        return response()->json(['status' => 'registered']);
    }

    // Check if current user is registered
    public function checkRegistration(Event $event)
    {
        $isRegistered = EventRegistration::where('event_id', $event->id)
                                         ->where('user_id', Auth::id())
                                         ->exists();

        return response()->json(['registered' => $isRegistered]);
    }

    // Registrants list for monitoring
    public function registrants(Event $event)
    {
        $users = $event->registeredUsers()->select('users.id', 'users.name', 'users.email')->get();
        return response()->json($users);
    }
}
