<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contacto(Request $request)
    {
        $data = $request->validate([
            'nombre'  => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'asunto'  => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        Mail::to(config('mail.contact_to_address'))->send(new ContactMail($data));

        return redirect()->route('home')->with('success', '¡Mensaje enviado! Nos pondremos en contacto pronto.');
    }
}
