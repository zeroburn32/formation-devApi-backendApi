<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public $table = 'etudiants';

    public $fillable = [
        'code_foner',
        'nbaide',
        'nbpret',
        'telephone',
        'nom',
        'prenoms',
        'sexe',
        'datenais',
        'numeropiece',
        'email',
        'ine'
    ];

    protected $casts = [
        'code_foner' => 'string',
        'telephone' => 'string',
        'nom' => 'string',
        'prenoms' => 'string',
        'sexe' => 'string',
        'datenais' => 'date',
        'numeropiece' => 'string',
        'email' => 'string',
        'ine' => 'string'
    ];

    public static array $rules = [
        'code_foner' => 'required|string|max:20',
        'nbaide' => 'required',
        'nbpret' => 'required',
        'telephone' => 'nullable|string|max:15',
        'nom' => 'nullable|string|max:100',
        'prenoms' => 'nullable|string|max:100',
        'sexe' => 'nullable|string|max:10',
        'datenais' => 'nullable',
        'numeropiece' => 'nullable|string|max:20',
        'email' => 'nullable|string|max:50',
        'ine' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function inscrits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Inscrit::class, 'etu_id');
    }
}
