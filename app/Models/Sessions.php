<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    public $table = 'sessions';

    public $fillable = [
        'libelle',
        'num',
        'id_annee',
        'fgactif',
        'datedebut',
        'datefin',
        'fg_traite',
        'fg_complement',
        'fg_resultat'
    ];

    protected $casts = [
        'libelle' => 'string',
        'datedebut' => 'datetime',
        'datefin' => 'datetime'
    ];

    public static array $rules = [
        'libelle' => 'required|string|max:100',
        'num' => 'required',
        'id_annee' => 'required',
        'fgactif' => 'required',
        'datedebut' => 'nullable',
        'datefin' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'fg_traite' => 'required',
        'fg_complement' => 'required',
        'fg_resultat' => 'required'
    ];

    public function allocationSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\AllocationSession::class, 'id_session');
    }
}
