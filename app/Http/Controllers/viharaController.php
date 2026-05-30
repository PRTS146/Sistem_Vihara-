<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Donation;
use Carbon\Carbon;

class ViharaController extends Controller
{
    public function home()
    {
        $events = Event::whereDate('event_date', '>=', Carbon::today())->orderBy('event_date', 'asc')->get();

        return view('vihara.home', compact('events'));
    }

    public function dashboard(){
        return view('vihara.dashboard');
    }

    public function abu(){
        return view('vihara.rmhabu');
    }

     public function login(){
        return view('auth.login');
    }

       public function register(){
        return view('auth.register');
    }

        public function profile(){
         return view('user.profile');
    }

    public function profileUpdate(Request $request){
        $request->user()->update($request->validated());

        return redirect()->route('profile')->with('success', 'Nama berhasil diubah!');
    }
}