<?php

namespace App\Http\Controllers;

use App\Models\Developer;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return view('developers.index', compact('developers'));
    }

    public function show(Developer $developer)
    {
        return view('developers.show', compact('developer'));
    }
}