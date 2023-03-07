<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StateDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateStateRequest;
use App\Http\Requests\Admin\UpdateStateRequest;
use App\Repositories\Admin\StateRepository;
use Flash;
use Response;

class StateController extends AppBaseController
{
    /** @var StateRepository $stateRepository*/
    private $stateRepository;

    public function __construct(StateRepository $stateRepo)
    {
        $this->stateRepository = $stateRepo;
    }

    /**
     * Display a listing of the State.
     *
     * @param StateDataTable $stateDataTable
     *
     * @return Response
     */
    public function index(StateDataTable $stateDataTable)
    {
        return $stateDataTable->render('admin.states.index');
    }

    /**
     * Show the form for creating a new State.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.states.create');
    }

    /**
     * Store a newly created State in storage.
     *
     * @param CreateStateRequest $request
     *
     * @return Response
     */
    public function store(CreateStateRequest $request)
    {
        $input = $request->all();

        $state = $this->stateRepository->create($input);

        Flash::success('State saved successfully.');

        return redirect(route('admin.states.index'))->with('success','State saves successfully...');
    }

    /**
     * Display the specified State.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            Flash::error('State not found');

            return redirect(route('admin.states.index'))->with('danger', 'State not found');
        }

        return view('admin.states.show')->with('state', $state);
    }

    /**
     * Show the form for editing the specified State.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            Flash::error('State not found');

            return redirect(route('admin.states.index'))->with('danger', 'State not found');
        }

        return view('admin.states.edit')->with('state', $state);
    }

    /**
     * Update the specified State in storage.
     *
     * @param int $id
     * @param UpdateStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStateRequest $request)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            Flash::error('State not found');

            return redirect(route('admin.states.index'));
        }

        $state = $this->stateRepository->update($request->all(), $id);

        Flash::success('State updated successfully.');

        return redirect(route('admin.states.index'))->with('info','State updated successfully...');
    }

    /**
     * Remove the specified State from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $state = $this->stateRepository->find($id);

        if (empty($state)) {
            Flash::error('State not found');

            return redirect(route('admin.states.index'));
        }

        $this->stateRepository->delete($id);

        Flash::success('State deleted successfully.');

        return redirect(route('admin.states.index'))->with('danger','State deleted successfully...');
    }
}
