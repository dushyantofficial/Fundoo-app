<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateCarmodelAPIRequest;
use App\Http\Requests\API\Admin\UpdateCarmodelAPIRequest;
use App\Models\Admin\Carmodel;
use App\Repositories\Admin\CarmodelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CarmodelController
 * @package App\Http\Controllers\API\Admin
 */

class CarmodelAPIController extends AppBaseController
{
    /** @var  CarmodelRepository */
    private $carmodelRepository;

    public function __construct(CarmodelRepository $carmodelRepo)
    {
        $this->carmodelRepository = $carmodelRepo;
    }

    /**
     * Display a listing of the Carmodel.
     * GET|HEAD /carmodels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carmodels = $this->carmodelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($carmodels->toArray(), 'Carmodels retrieved successfully');
    }

    /**
     * Store a newly created Carmodel in storage.
     * POST /carmodels
     *
     * @param CreateCarmodelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarmodelAPIRequest $request)
    {
        $input = $request->all();

        $carmodel = $this->carmodelRepository->create($input);

        return $this->sendResponse($carmodel->toArray(), 'Carmodel saved successfully');
    }

    /**
     * Display the specified Carmodel.
     * GET|HEAD /carmodels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Carmodel $carmodel */
        $carmodel = $this->carmodelRepository->find($id);

        if (empty($carmodel)) {
            return $this->sendError('Carmodel not found');
        }

        return $this->sendResponse($carmodel->toArray(), 'Carmodel retrieved successfully');
    }

    /**
     * Update the specified Carmodel in storage.
     * PUT/PATCH /carmodels/{id}
     *
     * @param int $id
     * @param UpdateCarmodelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarmodelAPIRequest $request)
    {
        $input = $request->all();

        /** @var Carmodel $carmodel */
        $carmodel = $this->carmodelRepository->find($id);

        if (empty($carmodel)) {
            return $this->sendError('Carmodel not found');
        }

        $carmodel = $this->carmodelRepository->update($input, $id);

        return $this->sendResponse($carmodel->toArray(), 'Carmodel updated successfully');
    }

    /**
     * Remove the specified Carmodel from storage.
     * DELETE /carmodels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Carmodel $carmodel */
        $carmodel = $this->carmodelRepository->find($id);

        if (empty($carmodel)) {
            return $this->sendError('Carmodel not found');
        }

        $carmodel->delete();

        return $this->sendSuccess('Carmodel deleted successfully');
    }
}
