<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StaticdataDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateStaticdataRequest;
use App\Http\Requests\Admin\UpdateStaticdataRequest;
use App\Repositories\Admin\StaticdataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StaticdataController extends AppBaseController
{
    /** @var StaticdataRepository $staticdataRepository*/
    private $staticdataRepository;

    public function __construct(StaticdataRepository $staticdataRepo)
    {
        $this->staticdataRepository = $staticdataRepo;
    }

    /**
     * Display a listing of the Staticdata.
     *
     * @param StaticdataDataTable $staticdataDataTable
     *
     * @return Response
     */
    public function index(StaticdataDataTable $staticdataDataTable)
    {
        return $staticdataDataTable->render('admin.staticdatas.index');
    }

    /**
     * Show the form for creating a new Staticdata.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.staticdatas.create');
    }

    /**
     * Store a newly created Staticdata in storage.
     *
     * @param CreateStaticdataRequest $request
     *
     * @return Response
     */
    public function store(CreateStaticdataRequest $request)
    {

        $input = $request->all();

        $staticdata = $this->staticdataRepository->create($input);

        Flash::success('Staticdata saved successfully.');

        return redirect(route('admin.staticdatas.index'))->with('success','Staticdata saves successfully...');
    }

    /**
     * Display the specified Staticdata.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            Flash::error('Staticdata not found');

            return redirect(route('admin.staticdatas.index'));
        }

        return view('admin.staticdatas.show')->with('staticdata', $staticdata);
    }

    /**
     * Show the form for editing the specified Staticdata.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            Flash::error('Staticdata not found');

            return redirect(route('admin.staticdatas.index'));
        }

        return view('admin.staticdatas.edit')->with('staticdata', $staticdata);
    }

    /**
     * Update the specified Staticdata in storage.
     *
     * @param int $id
     * @param UpdateStaticdataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStaticdataRequest $request)
    {
//        dd($request);
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            Flash::error('Staticdata not found');

            return redirect(route('admin.staticdatas.index'));
        }
//        dd($staticdata);
        $staticdata = $this->staticdataRepository->update($request->all(), $id);

        Flash::success('Staticdata updated successfully.');

        return redirect(route('admin.staticdatas.index'))->with('info','Staticdata updated successfully...');
    }

    /**
     * Remove the specified Staticdata from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staticdata = $this->staticdataRepository->find($id);

        if (empty($staticdata)) {
            Flash::error('Staticdata not found');

            return redirect(route('admin.staticdatas.index'));
        }

        $this->staticdataRepository->delete($id);

        Flash::success('Staticdata deleted successfully.');

        return redirect(route('admin.staticdatas.index'))->with('danger','Staticdata deleted successfully...');
    }
}
