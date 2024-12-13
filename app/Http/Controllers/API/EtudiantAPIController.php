<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEtudiantAPIRequest;
use App\Http\Requests\API\UpdateEtudiantAPIRequest;
use App\Models\Etudiant;
use App\Repositories\EtudiantRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EtudiantAPIController
 */
class EtudiantAPIController extends AppBaseController
{
    private EtudiantRepository $etudiantRepository;

    public function __construct(EtudiantRepository $etudiantRepo)
    {
        $this->etudiantRepository = $etudiantRepo;
    }

    /**
     * Display a listing of the Etudiants.
     * GET|HEAD /etudiants
     */
    public function index(Request $request): JsonResponse
    {
        $etudiants = $this->etudiantRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etudiants->toArray(), 'Etudiants retrieved successfully');
    }

    /**
     * Store a newly created Etudiant in storage.
     * POST /etudiants
     */
    public function store(CreateEtudiantAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $etudiant = $this->etudiantRepository->create($input);

        return $this->sendResponse($etudiant->toArray(), 'Etudiant saved successfully');
    }

    /**
     * Display the specified Etudiant.
     * GET|HEAD /etudiants/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Etudiant $etudiant */
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            return $this->sendError('Etudiant not found');
        }

        return $this->sendResponse($etudiant->toArray(), 'Etudiant retrieved successfully');
    }

    /**
     * Update the specified Etudiant in storage.
     * PUT/PATCH /etudiants/{id}
     */
    public function update($id, UpdateEtudiantAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Etudiant $etudiant */
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            return $this->sendError('Etudiant not found');
        }

        $etudiant = $this->etudiantRepository->update($input, $id);

        return $this->sendResponse($etudiant->toArray(), 'Etudiant updated successfully');
    }

    /**
     * Remove the specified Etudiant from storage.
     * DELETE /etudiants/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Etudiant $etudiant */
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            return $this->sendError('Etudiant not found');
        }

        $etudiant->delete();

        return $this->sendSuccess('Etudiant deleted successfully');
    }
}
