<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateStaticdataAPIRequest;
use App\Http\Requests\API\Admin\UpdateStaticdataAPIRequest;
use App\Models\Admin\Staticdata;
use App\Repositories\Admin\StaticdataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StaticdataController
 * @package App\Http\Controllers\API\Admin
 */

class StaticdataAPIController extends AppBaseController
{
    /** @var  StaticdataRepository */
    private $staticdataRepository;

    public function __construct(StaticdataRepository $staticdataRepo)
    {
        $this->staticdataRepository = $staticdataRepo;
    }

    /**
     * Display a listing of the Staticdata.
     * GET|HEAD /staticdatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $staticdatas = $this->staticdataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($staticdatas->toArray(), 'Staticdatas retrieved successfully');
    }

    /**
     * Store a newly created Staticdata in storage.
     * POST /staticdatas
     *
     * @param CreateStaticdataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStaticdataAPIRequest $request)
    {
        $input = $request->all();

        $staticdata = $this->staticdataRepository->create($input);

        return $this->sendResponse($staticdata->toArray(), 'Staticdata saved successfully');
    }

    /**
     * Display the specified Staticdata.
     * GET|HEAD /staticdatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Staticdata $staticdata */
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            return $this->sendError('Staticdata not found');
        }

        return $this->sendResponse($staticdata->toArray(), 'Staticdata retrieved successfully');
    }

    /**
     * Update the specified Staticdata in storage.
     * PUT/PATCH /staticdatas/{id}
     *
     * @param int $id
     * @param UpdateStaticdataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStaticdataAPIRequest $request)
    {
        $input = $request->all();

        /** @var Staticdata $staticdata */
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            return $this->sendError('Staticdata not found');
        }

        $staticdata = $this->staticdataRepository->update($input, $id);

        return $this->sendResponse($staticdata->toArray(), 'Staticdata updated successfully');
    }

    /**
     * Remove the specified Staticdata from storage.
     * DELETE /staticdatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Staticdata $staticdata */
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            return $this->sendError('Staticdata not found');
        }

        $staticdata->delete();

        return $this->sendSuccess('Staticdata deleted successfully');
    }
}
