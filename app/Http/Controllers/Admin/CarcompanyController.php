<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CarcompanyDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateCarcompanyRequest;
use App\Http\Requests\Admin\UpdateCarcompanyRequest;
use App\Repositories\Admin\CarcompanyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CarcompanyController extends AppBaseController
{
    /** @var CarcompanyRepository $carcompanyRepository*/
    private $carcompanyRepository;

    public function __construct(CarcompanyRepository $carcompanyRepo)
    {
        $this->carcompanyRepository = $carcompanyRepo;
    }

    /**
     * Display a listing of the Carcompany.
     *
     * @param CarcompanyDataTable $carcompanyDataTable
     *
     * @return Response
     */
    public function index(CarcompanyDataTable $carcompanyDataTable)
    {
        return $carcompanyDataTable->render('admin.carcompanies.index');
    }

    /**
     * Show the form for creating a new Carcompany.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.carcompanies.create');
    }

    /**
     * Store a newly created Carcompany in storage.
     *
     * @param CreateCarcompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCarcompanyRequest $request)
    {
        $input = $request->all();

        $carcompany = $this->carcompanyRepository->create($input);

//        Flash::success('Carcompany saved successfully.');

        return redirect(route('admin.carcompanies.index'))->with('success','Carcompany saved successfully.');
    }

    /**
     * Display the specified Carcompany.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            Flash::error('Carcompany not found');

            return redirect(route('admin.carcompanies.index'));
        }

        return view('admin.carcompanies.show')->with('carcompany', $carcompany);
    }

    /**
     * Show the form for editing the specified Carcompany.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            Flash::error('Carcompany not found');

            return redirect(route('admin.carcompanies.index'));
        }

        return view('admin.carcompanies.edit')->with('carcompany', $carcompany);
    }

    /**
     * Update the specified Carcompany in storage.
     *
     * @param int $id
     * @param UpdateCarcompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarcompanyRequest $request)
    {
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            Flash::error('Carcompany not found');

            return redirect(route('admin.carcompanies.index'));
        }

        $carcompany = $this->carcompanyRepository->update($request->all(), $id);

//        Flash::success('Carcompany updated successfully.');

        return redirect(route('admin.carcompanies.index'))->with('info','Carcompany updated successfully.');
    }

    /**
     * Remove the specified Carcompany from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carcompany = $this->carcompanyRepository->find($id);

        if (empty($carcompany)) {
            Flash::error('Carcompany not found');

            return redirect(route('admin.carcompanies.index'));
        }

        $this->carcompanyRepository->delete($id);

        Flash::success('Carcompany deleted successfully.');

        return redirect(route('admin.carcompanies.index'))->with('danger','Carcompany deleted successfully.');
    }
}
