<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $developer = Auth::user()->developer;

        if (!$developer) {
            return redirect()->route('home')->with('error', 'No tenés un perfil de developer asociado.');
        }

        return view('developer.profile', compact('developer'));
    }

    public function update(Request $request)
    {
        $developer = Auth::user()->developer;

        $request->validate([
            'name'   => 'required|string|max:255',
            'role'   => 'nullable|string|max:255',
            'bio'    => 'nullable|string',
            'skills' => 'nullable|string',
            'email'  => 'nullable|email',
        ]);

        $developer->update($request->all());

        return redirect()->route('developer.profile.edit')->with('success', '¡Perfil actualizado correctamente!');
    }
}