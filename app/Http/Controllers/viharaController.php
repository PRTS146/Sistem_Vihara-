<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        // $dataVihara = Vihara::all();
        // $data= [
        //     'dataVihara' => $dataVihara
        // ];
        return view('vihara.home');
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
