<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Les champs autorisés pour le mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'link',
        'user_id',
    ];

    /**
     * Relation avec l'utilisateur (si tu souhaites récupérer l'auteur du projet).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
