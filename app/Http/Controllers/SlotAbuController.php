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
            'slot_name'   => 'required|string|max:150',
            'slot_level'  => 'required|in:Biasa,VIP',
            'slot_status' => 'required|in:Tersedia,Telah Diambil',
            'slot_price'  => 'required|numeric|min:0',
        ]);

        SlotAbu::create([
            'admin_id'    => auth()->admin_id, 
            'slot_name'   => $request->slot_name,
            'slot_level'  => $request->slot_level,
            'slot_status' => $request->slot_status,
            'slot_price'  => $request->slot_price,
        ]);

        return redirect()->back()->with('success', 'Unit Rumah Abu berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'slot_name'   => 'required|string|max:150',
            'slot_level'  => 'required|in:Biasa,VIP',
            'slot_status' => 'required|in:Tersedia,Telah Diambil',
            'slot_price'  => 'required|numeric|min:0',
        ]);

        $slot = SlotAbu::findOrFail($id);
        
        $slot->update([
            'slot_name'   => $request->slot_name,
            'slot_level'  => $request->slot_level,
            'slot_status' => $request->slot_status,
            'slot_price'  => $request->slot_price,
        ]);

        return redirect()->back()->with('success', 'Data Rumah Abu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slot = SlotAbu::findOrFail($id);
        $slot->delete();

        return redirect()->back()->with('success', 'Data Rumah Abu berhasil dihapus!');
    }
}