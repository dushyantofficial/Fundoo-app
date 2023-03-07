<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateCarcompanyAPIRequest;
use App\Http\Requests\API\Admin\UpdateCarcompanyAPIRequest;
use App\Models\Admin\Carcompany;
use App\Repositories\Admin\CarcompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CarcompanyController
 * @package App\Http\Controllers\API\Admin
 */

class CarcompanyAPIController extends AppBaseController
{
    /** @var  CarcompanyRepository */
    private $carcompanyRepository;

    public function __construct(CarcompanyRepository $carcompanyRepo)
    {
        $this->carcompanyRepository = $carcompanyRepo;
    }

    /**
     * Display a listing of the Carcompany.
     * GET|HEAD /carcompanies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carcompanies = $this->carcompanyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($carcompanies->toArray(), 'Carcompanies retrieved successfully');
    }

    /**
     * Store a newly created Carcompany in storage.
     * POST /carcompanies
     *
     * @param CreateCarcompanyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarcompanyAPIRequest $request)
    {
        $input = $request->all();

        $carcompany = $this->carcompanyRepository->create($input);

        return $this->sendResponse($carcompany->toArray(), 'Carcompany saved successfully');
    }

    /**
     * Display the specified Carcompany.
     * GET|HEAD /carcompanies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Carcompany $carcompany */
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            return $this->sendError('Carcompany not found');
        }

        return $this->sendResponse($carcompany->toArray(), 'Carcompany retrieved successfully');
    }

    /**
     * Update the specified Carcompany in storage.
     * PUT/PATCH /carcompanies/{id}
     *
     * @param int $id
     * @param UpdateCarcompanyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarcompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Carcompany $carcompany */
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            return $this->sendError('Carcompany not found');
        }

        $carcompany = $this->carcompanyRepository->update($input, $id);

        return $this->sendResponse($carcompany->toArray(), 'Carcompany updated successfully');
    }

    /**
     * Remove the specified Carcompany from storage.
     * DELETE /carcompanies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Carcompany $carcompany */
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            return $this->sendError('Carcompany not found');
        }

        $carcompany->delete();

        return $this->sendSuccess('Carcompany deleted successfully');
    }
}
