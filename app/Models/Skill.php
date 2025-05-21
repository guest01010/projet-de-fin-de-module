<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    // Relation avec l'utilisateur si besoin
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
