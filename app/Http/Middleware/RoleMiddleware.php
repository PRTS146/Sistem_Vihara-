<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Jika tidak login sama sekali (sesi habis/Guest), langsung tendang ke Home
        if (!Auth::check()) {
            return redirect()->route('mainpage');
        }

        $userRole = Auth::user()->role;

        // --- ATURAN BARU ---
        // Jika route ini butuh role 'admin', tapi yang login bukan admin (misal 'user')
        if ($role === 'admin' && $userRole !== 'admin') {
            // Berikan pesan 403 yang sopan tapi tegas
            abort(403, 'Namo Buddhaya. Maaf, halaman ini khusus untuk Pengurus/Admin Vihara.'); 
        }

        // Jika route ini butuh role 'user', tapi yang login bukan 'user' DAN BUKAN 'admin'
        // (Ini memastikan admin tetap lolos pengecekan ini)
        if ($role === 'user' && $userRole !== 'user' && $userRole !== 'admin') {
            // Skrip ini jalan jika misal ada role ke-3 yang tak terdaftar nyasar
            abort(403, 'Akses ditolak.'); 
        }

        // Jika lolos pengecekan di atas, izinkan masuk ke halaman
        return $next($request);
    }
}