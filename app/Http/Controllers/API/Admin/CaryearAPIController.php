<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateCaryearAPIRequest;
use App\Http\Requests\API\Admin\UpdateCaryearAPIRequest;
use App\Models\Admin\Caryear;
use App\Repositories\Admin\CaryearRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CaryearController
 * @package App\Http\Controllers\API\Admin
 */

class CaryearAPIController extends AppBaseController
{
    /** @var  CaryearRepository */
    private $caryearRepository;

    public function __construct(CaryearRepository $caryearRepo)
    {
        $this->caryearRepository = $caryearRepo;
    }

    /**
     * Display a listing of the Caryear.
     * GET|HEAD /caryears
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $caryears = $this->caryearRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($caryears->toArray(), 'Caryears retrieved successfully');
    }

    /**
     * Store a newly created Caryear in storage.
     * POST /caryears
     *
     * @param CreateCaryearAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCaryearAPIRequest $request)
    {
        $input = $request->all();

        $caryear = $this->caryearRepository->create($input);

        return $this->sendResponse($caryear->toArray(), 'Caryear saved successfully');
    }

    /**
     * Display the specified Caryear.
     * GET|HEAD /caryears/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Caryear $caryear */
        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            return $this->sendError('Caryear not found');
        }

        return $this->sendResponse($caryear->toArray(), 'Caryear retrieved successfully');
    }

    /**
     * Update the specified Caryear in storage.
     * PUT/PATCH /caryears/{id}
     *
     * @param int $id
     * @param UpdateCaryearAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaryearAPIRequest $request)
    {
        $input = $request->all();

        /** @var Caryear $caryear */
        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            return $this->sendError('Caryear not found');
        }

        $caryear = $this->caryearRepository->update($input, $id);

        return $this->sendResponse($caryear->toArray(), 'Caryear updated successfully');
    }

    /**
     * Remove the specified Caryear from storage.
     * DELETE /caryears/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Caryear $caryear */
        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            return $this->sendError('Caryear not found');
        }

        $caryear->delete();

        return $this->sendSuccess('Caryear deleted successfully');
    }
}
