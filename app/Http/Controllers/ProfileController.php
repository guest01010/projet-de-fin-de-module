<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
        ]);

        $user->update($request->only('name', 'title', 'bio', 'username'));

        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }
}
