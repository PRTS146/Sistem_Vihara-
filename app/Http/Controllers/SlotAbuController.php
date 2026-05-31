<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlotAbu;
use Illuminate\Support\Facades\Auth;

class SlotAbuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'slot_blok'   => 'required|string|max:10',
            'slot_dinding'=> 'required|string|max:10',
            'slot_name'   => 'required|string|max:150',
            // 'slot_level'  => 'required|in:Biasa,VIP',
            'slot_status' => 'required|in:Tersedia,Booking,Telah Diambil',
            'slot_price'  => 'required|numeric|min:0',
        ]);

        SlotAbu::create([
            'admin_id' => Auth::user()->admin_id, 
            'slot_blok'   => $request->slot_blok,
            'slot_dinding'=> $request->slot_dinding,
            'slot_name'   => $request->slot_name,
            // 'slot_level'  => $request->slot_level,
            'slot_status' => $request->slot_status,
            'slot_price'  => $request->slot_price,
        ]);

        return redirect()->back()->with('success', 'Unit Rumah Abu berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'slot_blok'   => 'sometimes|required|string|max:10',
            'slot_dinding'=> 'sometimes|required|string|max:10',
            'slot_name'   => 'required|string|max:150',
            // 'slot_level'  => 'required|in:Biasa,VIP',
            'slot_status' => 'required|in:Tersedia,Booking,Telah Diambil',
            'slot_price'  => 'required|numeric|min:0',
        ]);

        $slot = SlotAbu::findOrFail($id);
        
        $slot->update($request->only([
            'slot_blok', 'slot_dinding', 'slot_name', 
            'slot_status', 'slot_price'
        ]));

        return redirect()->back()->with('success', 'Data Rumah Abu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slot = SlotAbu::findOrFail($id);
        $slot->delete();

        return redirect()->back()->with('success', 'Data Rumah Abu berhasil dihapus!');
    }
}