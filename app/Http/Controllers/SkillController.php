<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
   public function index()
{
    // Récupère toutes les compétences de l'utilisateur connecté (si c'est le cas)
    $skills = Skill::where('user_id', auth()->id())->get();

    // Ou juste : $skills = Skill::all();

    return view('skills.index', compact('skills'));
}


    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Auth::user()->skills()->create($request->only('name'));

        return redirect()->route('skills.index')->with('success', 'Compétence ajoutée avec succès.');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }

        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Compétence supprimée.');
    }
}
