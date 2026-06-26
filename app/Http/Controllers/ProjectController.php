<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('developer')->paginate(6);
        return view('projects.index', compact('projects'));
    }
}