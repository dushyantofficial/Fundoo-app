<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateOffercodeAPIRequest;
use App\Http\Requests\API\Admin\UpdateOffercodeAPIRequest;
use App\Models\Admin\Offercode;
use App\Repositories\Admin\OffercodeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OffercodeController
 * @package App\Http\Controllers\API\Admin
 */

class OffercodeAPIController extends AppBaseController
{
    /** @var  OffercodeRepository */
    private $offercodeRepository;

    public function __construct(OffercodeRepository $offercodeRepo)
    {
        $this->offercodeRepository = $offercodeRepo;
    }

    /**
     * Display a listing of the Offercode.
     * GET|HEAD /offercodes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $offercodes = $this->offercodeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($offercodes->toArray(), 'Offercodes retrieved successfully');
    }

    /**
     * Store a newly created Offercode in storage.
     * POST /offercodes
     *
     * @param CreateOffercodeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOffercodeAPIRequest $request)
    {
        $input = $request->all();

        $offercode = $this->offercodeRepository->create($input);

        return $this->sendResponse($offercode->toArray(), 'Offercode saved successfully');
    }

    /**
     * Display the specified Offercode.
     * GET|HEAD /offercodes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Offercode $offercode */
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            return $this->sendError('Offercode not found');
        }

        return $this->sendResponse($offercode->toArray(), 'Offercode retrieved successfully');
    }

    /**
     * Update the specified Offercode in storage.
     * PUT/PATCH /offercodes/{id}
     *
     * @param int $id
     * @param UpdateOffercodeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOffercodeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Offercode $offercode */
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            return $this->sendError('Offercode not found');
        }

        $offercode = $this->offercodeRepository->update($input, $id);

        return $this->sendResponse($offercode->toArray(), 'Offercode updated successfully');
    }

    /**
     * Remove the specified Offercode from storage.
     * DELETE /offercodes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Offercode $offercode */
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            return $this->sendError('Offercode not found');
        }

        $offercode->delete();

        return $this->sendSuccess('Offercode deleted successfully');
    }
}
