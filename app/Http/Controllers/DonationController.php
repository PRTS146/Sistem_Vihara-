<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * 1. MEMBUAT KAMPANYE DONASI BARU
     * Fungsi ini dipanggil saat Admin men-submit form tambah donasi di Dashboard.
     */
    public function store(Request $request)
    {
        // Validasi input dari form Admin
        $request->validate([
            'donation_name' => 'required|string|max:255',
            'donation_description' => 'required|string',
            'donation_target' => 'required|numeric|min:0',
        ]);

        // Simpan ke database
        Donation::create([
            'admin_id' => Auth::user()->admin_id, // Otomatis mencatat ID admin yang sedang login
            'donation_name' => $request->donation_name,
            'donation_description' => $request->donation_description,
            'donation_target' => $request->donation_target,
            'donation_progress' => 0, // Awal donasi pasti progress-nya Rp 0
        ]);

        // Kembalikan ke halaman dashboard dengan pesan sukses
        return redirect()->back()->with('success', 'Kampanye Donasi baru berhasil ditambahkan!');
    }

    /**
     * 2. UPDATE PROGRESS DONASI SECARA MANUAL
     * Fungsi ini digunakan admin untuk menambahkan angka progress jika ada transfer masuk.
     */
    public function update(Request $request, $id)
    {
        // Validasi agar inputan progress harus berupa angka
        $request->validate([
            'donation_progress' => 'required|numeric|min:0',
        ]);

        $donation = Donation::findOrFail($id);

        // Update nominal terkumpul
        $donation->update([
            'donation_progress' => $request->donation_progress
        ]);

        return redirect()->back()->with('success', 'Progress Donasi berhasil diperbarui!');
    }

    /**
     * 3. MENGHAPUS KAMPANYE DONASI
     * Fungsi ini digunakan jika target donasi sudah tercapai atau dibatalkan.
     */
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect()->back()->with('success', 'Kampanye Donasi berhasil dihapus!');
    }
}