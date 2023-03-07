<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\FuelDetailDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFuelDetailRequest;
use App\Http\Requests\Admin\UpdateFuelDetailRequest;
use App\Repositories\Admin\FuelDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FuelDetailController extends AppBaseController
{
    /** @var FuelDetailRepository $fuelDetailRepository*/
    private $fuelDetailRepository;

    public function __construct(FuelDetailRepository $fuelDetailRepo)
    {
        $this->fuelDetailRepository = $fuelDetailRepo;
    }

    /**
     * Display a listing of the FuelDetail.
     *
     * @param FuelDetailDataTable $fuelDetailDataTable
     *
     * @return Response
     */
    public function index(FuelDetailDataTable $fuelDetailDataTable)
    {
        return $fuelDetailDataTable->render('admin.fuel_details.index');
    }

    /**
     * Show the form for creating a new FuelDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.fuel_details.create');
    }

    /**
     * Store a newly created FuelDetail in storage.
     *
     * @param CreateFuelDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateFuelDetailRequest $request)
    {
        $input = $request->all();

        $fuelDetail = $this->fuelDetailRepository->create($input);

        Flash::success('Fuel Detail saved successfully.');

        return redirect(route('admin.fuelDetails.index'))->with('success','Fuel Detail saves successfully...');
    }

    /**
     * Display the specified FuelDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fuelDetail = $this->fuelDetailRepository->find($id);

        if (empty($fuelDetail)) {
            Flash::error('Fuel Detail not found');

            return redirect(route('admin.fuelDetails.index'));
        }

        return view('admin.fuel_details.show')->with('fuelDetail', $fuelDetail);
    }

    /**
     * Show the form for editing the specified FuelDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fuelDetail = $this->fuelDetailRepository->find($id);

        if (empty($fuelDetail)) {
            Flash::error('Fuel Detail not found');

            return redirect(route('admin.fuelDetails.index'));
        }

        return view('admin.fuel_details.edit')->with('fuelDetail', $fuelDetail);
    }

    /**
     * Update the specified FuelDetail in storage.
     *
     * @param int $id
     * @param UpdateFuelDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFuelDetailRequest $request)
    {
        $fuelDetail = $this->fuelDetailRepository->find($id);

        if (empty($fuelDetail)) {
            Flash::error('Fuel Detail not found');

            return redirect(route('admin.fuelDetails.index'));
        }

        $fuelDetail = $this->fuelDetailRepository->update($request->all(), $id);

        Flash::success('Fuel Detail updated successfully.');

        return redirect(route('admin.fuelDetails.index'))->with('info','Fuel Detail updated successfully...');
    }

    /**
     * Remove the specified FuelDetail from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fuelDetail = $this->fuelDetailRepository->find($id);

        if (empty($fuelDetail)) {
            Flash::error('Fuel Detail not found');

            return redirect(route('admin.fuelDetails.index'));
        }

        $this->fuelDetailRepository->delete($id);

        Flash::success('Fuel Detail deleted successfully.');

        return redirect(route('admin.fuelDetails.index'))->with('danger','Fuel Detail deleted successfully...');
    }
}
