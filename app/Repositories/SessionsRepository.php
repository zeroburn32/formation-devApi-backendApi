<?php

namespace App\Repositories;

use App\Models\Sessions;
use App\Repositories\BaseRepository;

class SessionsRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Sessions::class;
    }
}
