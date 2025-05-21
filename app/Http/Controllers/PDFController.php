<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF; // Alias pour DomPDF (barryvdh/laravel-dompdf)

class PDFController extends Controller
{
    public function generate($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $data = [
            'user' => $user,
            'projects' => $user->projects,
            'skills' => $user->skills,
        ];

        // On charge la vue 'pdf.profile' avec les données
        $pdf = PDF::loadView('pdf.profile', $data);

        // Retourne le PDF à télécharger (ou afficher dans navigateur)
        return $pdf->download($user->username.'_cv.pdf');
    }
}
