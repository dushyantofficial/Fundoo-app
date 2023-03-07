<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CityDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;
use App\Models\Admin\State;
use App\Repositories\Admin\CityRepository;
use Flash;
use Response;

class CityController extends AppBaseController
{
    /** @var CityRepository $cityRepository*/
    private $cityRepository;

    public function __construct(CityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;
    }

    /**
     * Display a listing of the City.
     *
     * @param CityDataTable $cityDataTable
     *
     * @return Response
     */
    public function index(CityDataTable $cityDataTable)
    {
        return $cityDataTable->render('admin.cities.index');
    }

    /**
     * Show the form for creating a new City.
     *
     * @return Response
     */
    public function create()
    {
        $states = State::pluck('state_name','id');;

        return view('admin.cities.create',compact('states'));
    }

    /**
     * Store a newly created City in storage.
     *
     * @param CreateCityRequest $request
     *
     * @return Response
     */
    public function store(CreateCityRequest $request)
    {
        $input = $request->all();

        $city = $this->cityRepository->create($input);

        Flash::success('City saved successfully.');

        return redirect(route('admin.cities.index'))->with('success','City saved successfully...');
    }

    /**
     * Display the specified City.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->find($id);

        if (empty($city)) {

            return redirect(route('admin.cities.index'))->with('danger', 'City not found');
        }

        return view('admin.cities.show')->with('city', $city);
    }

    /**
     * Show the form for editing the specified City.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $city = $this->cityRepository->find($id);
        $states = State::pluck('state_name','id');
        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('admin.cities.index'))->with('danger', 'City not found');
        }

        return view('admin.cities.edit',compact('city','states'));
    }

    /**
     * Update the specified City in storage.
     *
     * @param int $id
     * @param UpdateCityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityRequest $request)
    {
        $input = $request->all();

        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('admin.cities.index'));
        }

        $city->update($input);
//        $city = $this->cityRepository->update($request->all(), $id);


        Flash::success('City updated successfully.');

        return redirect(route('admin.cities.index'))->with('info','City updated successfully...');
    }

    /**
     * Remove the specified City from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('admin.cities.index'));
        }

        $this->cityRepository->delete($id);

        Flash::success('City deleted successfully.');

        return redirect(route('admin.cities.index'))->with('info','Caryear deleted successfully...');
    }
}
