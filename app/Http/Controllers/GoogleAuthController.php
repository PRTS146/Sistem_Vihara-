<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleAuthController extends Controller
{
    // Arah pengguna ke halaman login ogogle
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Proses balasan dari google
    public function handleGoogleCallback()
    {
        try {
            // ambil data pengguna dari ogogle
            $googleUser = Socialite::driver('google')->user();

            // cek apa pengguna sudah pernah login pakai google sebelumnya
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                // langsung login jika sudah terdaftar
                Auth::login($user);
            } else {
                // Cek apa email google ini sudah terdaftar secara manual tanpa google
                $existingUser = User::where('email', $googleUser->email)->first();

                if ($existingUser) {
                    // update akun lama dengan menambahkan google_id
                    $existingUser->update([
                        'google_id' => $googleUser->id,
                    ]);
                    Auth::login($existingUser);
                } else {
                    // pengguna benar-benar baru, buatkan akun di database
                    $newUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                    ]);
                    Auth::login($newUser);
                }
            }

            // arah pengguna ke beranda
            return redirect()->intended('/home');

        } catch (Exception $e) {
            // Jika terjadi kesalahan, kembalikan ke halaman login
            return redirect('/login')->with('error', 'Terjadi kesalahan saat mencoba login dengan Google.');
        }
    }
}