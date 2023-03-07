<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AssignDriverDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateAssignDriverRequest;
use App\Http\Requests\Admin\UpdateAssignDriverRequest;
use App\Repositories\Admin\AssignDriverRepository;
use Flash;
use Response;

class AssignDriverController extends AppBaseController
{
    /** @var AssignDriverRepository $assignDriverRepository*/
    private $assignDriverRepository;

    public function __construct(AssignDriverRepository $assignDriverRepo)
    {
        $this->assignDriverRepository = $assignDriverRepo;
    }

    /**
     * Display a listing of the AssignDriver.
     *
     * @param AssignDriverDataTable $assignDriverDataTable
     *
     * @return Response
     */
    public function index(AssignDriverDataTable $assignDriverDataTable)
    {
        return $assignDriverDataTable->render('admin.assign_drivers.index');
    }

    /**
     * Show the form for creating a new AssignDriver.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.assign_drivers.create');
    }

    /**
     * Store a newly created AssignDriver in storage.
     *
     * @param CreateAssignDriverRequest $request
     *
     * @return Response
     */
    public function store(CreateAssignDriverRequest $request)
    {

        $input = $request->all();
        $assignDriver = $this->assignDriverRepository->create($input);

        Flash::success('Assign Driver saved successfully.');

        return redirect(route('admin.assignDrivers.index'))->with('success','Assign Driver saved successfully...');
    }

    /**
     * Display the specified AssignDriver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $assignDriver = $this->assignDriverRepository->find($id);

        if (empty($assignDriver)) {
            Flash::error('Assign Driver not found');

            return redirect(route('admin.assignDrivers.index'));
        }

        return view('admin.assign_drivers.show')->with('assignDriver', $assignDriver);
    }

    /**
     * Show the form for editing the specified AssignDriver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $assignDriver = $this->assignDriverRepository->find($id);

        if (empty($assignDriver)) {
            Flash::error('Assign Driver not found');

            return redirect(route('admin.assignDrivers.index'));
        }

        return view('admin.assign_drivers.edit')->with('assignDriver', $assignDriver);
    }

    /**
     * Update the specified AssignDriver in storage.
     *
     * @param int $id
     * @param UpdateAssignDriverRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssignDriverRequest $request)
    {
        $assignDriver = $this->assignDriverRepository->find($id);

        if (empty($assignDriver)) {
            Flash::error('Assign Driver not found');

            return redirect(route('admin.assignDrivers.index'));
        }

        $assignDriver = $this->assignDriverRepository->update($request->all(), $id);

        Flash::success('Assign Driver updated successfully.');

        return redirect(route('admin.assignDrivers.index'))->with('info','Assign Driver Updated successfully...');
    }

    /**
     * Remove the specified AssignDriver from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $assignDriver = $this->assignDriverRepository->find($id);

        if (empty($assignDriver)) {
            Flash::error('Assign Driver not found');

            return redirect(route('admin.assignDrivers.index'));
        }

        $this->assignDriverRepository->delete($id);

        Flash::success('Assign Driver deleted successfully.');

        return redirect(route('admin.assignDrivers.index'))->with('danger','Assign Driver deleted successfully...');
    }
}
