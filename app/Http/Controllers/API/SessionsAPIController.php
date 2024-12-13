<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSessionsAPIRequest;
use App\Http\Requests\API\UpdateSessionsAPIRequest;
use App\Models\Sessions;
use App\Repositories\SessionsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SessionsAPIController
 */
class SessionsAPIController extends AppBaseController
{
    private SessionsRepository $sessionsRepository;

    public function __construct(SessionsRepository $sessionsRepo)
    {
        $this->sessionsRepository = $sessionsRepo;
    }

    /**
     * Display a listing of the Sessions.
     * GET|HEAD /sessions
     */
    public function index(Request $request): JsonResponse
    {
        $sessions = $this->sessionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sessions->toArray(), 'Sessions retrieved successfully');
    }

    /**
     * Store a newly created Sessions in storage.
     * POST /sessions
     */
    public function store(CreateSessionsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $sessions = $this->sessionsRepository->create($input);

        return $this->sendResponse($sessions->toArray(), 'Sessions saved successfully');
    }

    /**
     * Display the specified Sessions.
     * GET|HEAD /sessions/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Sessions $sessions */
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            return $this->sendError('Sessions not found');
        }

        return $this->sendResponse($sessions->toArray(), 'Sessions retrieved successfully');
    }

    /**
     * Update the specified Sessions in storage.
     * PUT/PATCH /sessions/{id}
     */
    public function update($id, UpdateSessionsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Sessions $sessions */
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            return $this->sendError('Sessions not found');
        }

        $sessions = $this->sessionsRepository->update($input, $id);

        return $this->sendResponse($sessions->toArray(), 'Sessions updated successfully');
    }

    /**
     * Remove the specified Sessions from storage.
     * DELETE /sessions/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Sessions $sessions */
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            return $this->sendError('Sessions not found');
        }

        $sessions->delete();

        return $this->sendSuccess('Sessions deleted successfully');
    }
}
