<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CarmodelDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateCarmodelRequest;
use App\Http\Requests\Admin\UpdateCarmodelRequest;
use App\Models\Admin\Carcompany;
use App\Repositories\Admin\CarmodelRepository;
use Flash;
use Response;

class CarmodelController extends AppBaseController
{
    /** @var CarmodelRepository $carmodelRepository*/
    private $carmodelRepository;

    public function __construct(CarmodelRepository $carmodelRepo)
    {
        $this->carmodelRepository = $carmodelRepo;
    }

    /**
     * Display a listing of the Carmodel.
     *
     * @param CarmodelDataTable $carmodelDataTable
     *
     * @return Response
     */
    public function index(CarmodelDataTable $carmodelDataTable)
    {
        return $carmodelDataTable->render('admin.carmodels.index');
    }

    /**
     * Show the form for creating a new Carmodel.
     *
     * @return Response
     */
    public function create()
    {
//        $carmodel = Carcompany::pluck('company_name','id');
        $company = Carcompany::pluck('company_name','id');
//        $carmodel = Carcompany::all();
        return view('admin.carmodels.create',compact('company'));
//        return view('admin.carmodels.create');
    }

    /**
     * Store a newly created Carmodel in storage.
     *
     * @param CreateCarmodelRequest $request
     *
     * @return Response
     */
    public function store(CreateCarmodelRequest $request)
    {
        $input = $request->all();

        $carmodel = $this->carmodelRepository->create($input);

        Flash::success('Carmodel saved successfully.');

        return redirect(route('admin.carmodels.index'))->with('success','Carmodel saved successfully...');
    }

    /**
     * Display the specified Carmodel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $carmodel = $this->carmodelRepository->find($id);

        if (empty($carmodel)) {
            Flash::error('Carmodel not found');

            return redirect(route('admin.carmodels.index'));
        }

        return view('admin.carmodels.show')->with('carmodel', $carmodel,);
    }

    /**
     * Show the form for editing the specified Carmodel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
            $carmodel = $this->carmodelRepository->find($id);
            if (empty($carmodel)) {
                Flash::error('Carmodel not found');

                return redirect(route('admin.carmodels.index'));
            }


           $company = Carcompany::pluck('company_name','id');

        return view('admin.carmodels.edit',compact('carmodel','company'));

    }

    /**
     * Update the specified Carmodel in storage.
     *
     * @param int $id
     * @param UpdateCarmodelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarmodelRequest $request)
    {
        $carmodel = $this->carmodelRepository->find($id);

        if (empty($carmodel)) {
            Flash::error('Carmodel not found');

            return redirect(route('admin.carmodels.index'));
        }

        $carmodel = $this->carmodelRepository->update($request->all(), $id);

        Flash::success('Carmodel updated successfully.');

        return redirect(route('admin.carmodels.index'))->with('info','Carmodel updated successfully...');
    }

    /**
     * Remove the specified Carmodel from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        $carmodel = $this->carmodelRepository->find($id);

        if (empty($carmodel)) {
            Flash::error('Carmodel not found');

            return redirect(route('admin.carmodels.index'));
        }

        $this->carmodelRepository->delete($id);

        Flash::success('Carmodel deleted successfully.');

        return redirect(route('admin.carmodels.index'))->with('danger','Carmodel deleted successfully...');
    }
}
