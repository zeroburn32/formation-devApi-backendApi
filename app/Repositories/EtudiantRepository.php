<?php

namespace App\Repositories;

use App\Models\Etudiant;
use App\Repositories\BaseRepository;

class EtudiantRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Etudiant::class;
    }
}
