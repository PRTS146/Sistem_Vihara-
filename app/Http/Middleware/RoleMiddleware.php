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

        // 2. Jika SUDAH login, tapi mencoba masuk ke area yang rolenya tidak sesuai
        if (Auth::user()->role !== $role) {
            
            // Jika Admin nyasar ke halaman user, lempar ke halaman Monitoring Kelvin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('monitoring');
            }
            
            // Jika User mencoba menjebol halaman admin, lempar ke Dashboard Vincent
            if (Auth::user()->role === 'user') {
                return redirect()->route('dashboard');
            }

            // Jaga-jaga jika ada role aneh/tidak dikenal di database
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}