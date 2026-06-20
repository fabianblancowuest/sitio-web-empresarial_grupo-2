<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return view('admin.developers.index', compact('developers'));
    }

    public function create()
    {
        $users = User::where('role', 'developer')->whereDoesntHave('developer')->get();
        return view('admin.developers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'role'    => 'nullable|string|max:255',
            'bio'     => 'nullable|string',
            'skills'  => 'nullable|string',
            'email'   => 'nullable|email',
            'user_id' => 'nullable|exists:users,id',
            'photo'   => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $file     = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['photo'] = '/images/' . $filename;
        }

        Developer::create($data);

        return redirect()->route('admin.developers.index')
            ->with('success', 'Desarrollador agregado correctamente.');
    }

    public function edit(Developer $developer)
    {
        $users = User::where('role', 'developer')
            ->where(function($q) use ($developer) {
                $q->whereDoesntHave('developer')->orWhere('id', $developer->user_id);
            })->get();
        return view('admin.developers.edit', compact('developer', 'users'));
    }

    public function update(Request $request, Developer $developer)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'role'    => 'nullable|string|max:255',
            'bio'     => 'nullable|string',
            'skills'  => 'nullable|string',
            'email'   => 'nullable|email',
            'user_id' => 'nullable|exists:users,id',
            'photo'   => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $file     = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['photo'] = '/images/' . $filename;
        }

        $developer->update($data);

        return redirect()->route('admin.developers.index')
            ->with('success', 'Desarrollador actualizado correctamente.');
    }

    public function destroy(Developer $developer)
    {
        $developer->delete();
        return redirect()->route('admin.developers.index')
            ->with('success', 'Desarrollador eliminado correctamente.');
    }
}