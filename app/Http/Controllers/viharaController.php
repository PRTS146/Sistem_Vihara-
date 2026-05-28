<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Donation;

class ViharaController extends Controller
{
    




public function home()
{
    $events = Event::all();
    

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
        $request->validate([
        'name' => 'required|string|max:255',
        ]);

        Auth::user()->update([
        'name' => $request->name,
    ]);

        return redirect()->route('profile')->with('success', 'Nama berhasil diubah!');
    }

    // Untuk admin page
    
    public function adminhome() {
    return view('vihara.adminhome');
    }

   public function monitoring()
{
    $events = collect();
    $donations = collect();

    return view('vihara.monitoring', compact('events', 'donations'));
}

    // 
      

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
