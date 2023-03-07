<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CaryearDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateCaryearRequest;
use App\Http\Requests\Admin\UpdateCaryearRequest;
use App\Models\Admin\Carcompany;
use App\Models\Admin\Carmodel;
use App\Models\Admin\Caryear;
use App\Repositories\Admin\CaryearRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CaryearController extends AppBaseController
{
    /** @var CaryearRepository $caryearRepository*/
    private $caryearRepository;

    public function __construct(CaryearRepository $caryearRepo)
    {
        $this->caryearRepository = $caryearRepo;
    }

    /**
     * Display a listing of the Caryear.
     *
     * @param CaryearDataTable $caryearDataTable
     *
     * @return Response
     */
    public function index(CaryearDataTable $caryearDataTable)
    {
        return $caryearDataTable->render('admin.caryears.index');
    }

    /**
     * Show the form for creating a new Caryear.
     *
     * @return Response
     */
    public function create()
    {

        $model = Carmodel::pluck('model_name','id');
//
//        dd($model);
        return view('admin.caryears.create',compact('model'));
//        return view('admin.caryears.create');
    }

    /**
     * Store a newly created Caryear in storage.
     *
     * @param CreateCaryearRequest $request
     *
     * @return Response
     */
    public function store(CreateCaryearRequest $request)
    {

        $input = $request->all();

        $caryear = $this->caryearRepository->create($input);

        Flash::success('Caryear saved successfully.');

        return redirect(route('admin.caryears.index'))->with('success','Caryear saved successfully...');
    }

    /**
     * Display the specified Caryear.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {


        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            Flash::error('Caryear not found');

            return redirect(route('admin.caryears.index'));
        }

        return view('admin.caryears.show',compact('caryear'));
    }

    /**
     * Show the form for editing the specified Caryear.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
//  dd($id);
        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            Flash::error('Caryear not found');

            return redirect(route('admin.caryears.index'));
        }

        $model = Carmodel::pluck('model_name','id');
        return view('admin.caryears.edit',compact('caryear','model'));
    }

    /**
     * Update the specified Caryear in storage.
     *
     * @param int $id
     * @param UpdateCaryearRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaryearRequest $request)
    {
        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            Flash::error('Caryear not found');

            return redirect(route('admin.caryears.index'));
        }

        $caryear = $this->caryearRepository->update($request->all(), $id);

        Flash::success('Caryear updated successfully.');

        return redirect(route('admin.caryears.index'))->with('info','Caryear updated successfully...');
    }

    /**
     * Remove the specified Caryear from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $caryear = $this->caryearRepository->find($id);

        if (empty($caryear)) {
            Flash::error('Caryear not found');

            return redirect(route('admin.caryears.index'));
        }

        $this->caryearRepository->delete($id);

        Flash::success('Caryear deleted successfully.');

        return redirect(route('admin.caryears.index'))->with('danger','Caryear deleted successfully...');
    }
}
