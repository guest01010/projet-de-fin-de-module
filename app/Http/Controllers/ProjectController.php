<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'link' => 'nullable|url',
    ]);

    // Ajouter user_id = id de l'utilisateur connecté
    $validated['user_id'] = auth()->id();

    Project::create($validated);

    return redirect()->route('projects.index')->with('success', 'Projet ajouté avec succès.');
}


    // Ajoute aussi les autres méthodes si besoin (edit, update, destroy)...
}
