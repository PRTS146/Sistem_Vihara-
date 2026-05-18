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
        // 1. Pastikan pengguna sudah login terlebih dahulu
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // 2. Proteksi Halaman Admin
        // Jika rute butuh role 'admin' tapi role yang login BUKAN admin, kunci pintu!
        if ($role === 'admin' && $userRole !== 'admin') {
            abort(403, 'Akses Ditolak. Halaman ini hanya dapat diakses oleh Pengurus/Admin.');
        }

        // 3. Proteksi Halaman User (Umat)
        // Jika rute butuh role 'user' tapi role yang login bukan 'user' DAN bukan 'admin'
        if ($role === 'user' && $userRole !== 'user' && $userRole !== 'admin') {
            abort(403, 'Akses Ditolak.');
        }

        return $next($request);
    }
}