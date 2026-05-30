<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlotAbu;
use Illuminate\Support\Facades\Auth;

class ApiSlotController extends Controller
{
    /**
     * GET /api/slots
     * Returns all slots as JSON. Supports optional ?blok= and ?dinding= filters.
     */
    public function index(Request $request)
    {
        $query = SlotAbu::query();

        if ($request->filled('blok')) {
            $query->where('slot_blok', $request->blok);
        }
        if ($request->filled('dinding')) {
            $query->where('slot_dinding', $request->dinding);
        }

        $slots = $query->orderBy('slot_blok')
                       ->orderBy('slot_dinding')
                       ->orderBy('slot_name')
                       ->get();

        return response()->json($slots);
    }

    /**
     * POST /api/slots
     * Admin creates a new slot. Requires auth.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slot_blok'    => 'required|string|max:10',
            'slot_dinding' => 'required|string|max:10',
            'slot_name'    => 'required|string|max:150',
            'slot_level'   => 'required|in:Biasa,VIP',
            'slot_status'  => 'required|in:Tersedia,Booking,Telah Diambil',
            'slot_price'   => 'required|numeric|min:0',
        ]);

        $slot = SlotAbu::create([
            'admin_id'     => Auth::user()->admin_id,
            'slot_blok'    => $request->slot_blok,
            'slot_dinding' => $request->slot_dinding,
            'slot_name'    => $request->slot_name,
            'slot_level'   => $request->slot_level,
            'slot_status'  => $request->slot_status,
            'slot_price'   => $request->slot_price,
        ]);

        return response()->json(['message' => 'Slot berhasil ditambahkan!', 'slot' => $slot], 201);
    }

    /**
     * PUT /api/slots/{id}
     * Admin updates a slot's status (or other fields).
     */
    public function update(Request $request, $id)
    {
        $slot = SlotAbu::findOrFail($id);

        $request->validate([
            'slot_status' => 'sometimes|required|in:Tersedia,Booking,Telah Diambil',
            'slot_name'   => 'sometimes|required|string|max:150',
            'slot_level'  => 'sometimes|required|in:Biasa,VIP',
            'slot_price'  => 'sometimes|required|numeric|min:0',
        ]);

        $slot->update($request->only(['slot_status', 'slot_name', 'slot_level', 'slot_price']));

        return response()->json(['message' => 'Slot berhasil diperbarui!', 'slot' => $slot]);
    }

    /**
     * DELETE /api/slots/{id}
     * Admin deletes a slot.
     */
    public function destroy($id)
    {
        $slot = SlotAbu::findOrFail($id);
        $slot->delete();

        return response()->json(['message' => 'Slot berhasil dihapus!']);
    }
}
