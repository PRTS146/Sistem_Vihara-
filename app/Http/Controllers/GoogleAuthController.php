<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleAuthController extends Controller
{
    // Fungsi untuk mengarahkan pengguna ke halaman login Google
    public function(){
        redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Fungsi untuk memproses data balasan dari Google
    public function handleGoogleCallback
        try {
            // Mengambil data pengguna dari Google
            $googleUser = Socialite::driver('google')->user();

            // Skenario 1: Cek apakah pengguna sudah pernah login pakai Google sebelumnya
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                // Langsung login jika sudah terdaftar
                Auth::login($user);
            } else {
                // Skenario 2: Cek apakah email Google ini sudah terdaftar secara manual (tanpa Google)
                $existingUser = User::where('email', $googleUser->email)->first();

                if ($existingUser) {
                    // Update akun lama dengan menambahkan google_id
                    $existingUser->update([
                        'google_id' => $googleUser->id,
                    ]);
                    Auth::login($existingUser);
                } else {
                    // Skenario 3: Pengguna benar-benar baru, buatkan akun di database
                    $newUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'role' => 'user',
                        // Password dibiarkan kosong sesuai pengaturan nullable di database
                    ]);
                    Auth::login($newUser);
                }
            }

            // Setelah sukses, arahkan pengguna ke halaman utama/dashboard
            // (Sesuaikan rute '/home' dengan rute dashboard Vihara kamu)
            return redirect()->intended('/home');

        } catch (Exception $e) {
            // Jika terjadi kesalahan (misal: batal login), kembalikan ke halaman login
            return redirect('/login')->with('error', 'Terjadi kesalahan saat mencoba login dengan Google.');
        }
    }
}