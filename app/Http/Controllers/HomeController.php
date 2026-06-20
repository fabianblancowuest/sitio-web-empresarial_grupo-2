<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contacto(Request $request)
    {
        return redirect()->route('home')->with('success', '¡Mensaje enviado! Nos pondremos en contacto pronto.');
    }
}