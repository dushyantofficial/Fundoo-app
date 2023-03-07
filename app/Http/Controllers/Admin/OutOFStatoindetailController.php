<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OutOFStatoindetailDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateOutOFStatoindetailRequest;
use App\Http\Requests\Admin\UpdateOutOFStatoindetailRequest;
use App\Repositories\Admin\OutOFStatoindetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OutOFStatoindetailController extends AppBaseController
{
    /** @var OutOFStatoindetailRepository $outOFStatoindetailRepository*/
    private $outOFStatoindetailRepository;

    public function __construct(OutOFStatoindetailRepository $outOFStatoindetailRepo)
    {
        $this->outOFStatoindetailRepository = $outOFStatoindetailRepo;
    }

    /**
     * Display a listing of the OutOFStatoindetail.
     *
     * @param OutOFStatoindetailDataTable $outOFStatoindetailDataTable
     *
     * @return Response
     */
    public function index(OutOFStatoindetailDataTable $outOFStatoindetailDataTable)
    {
        return $outOFStatoindetailDataTable->render('admin.out_o_f_statoindetails.index');
    }

    /**
     * Show the form for creating a new OutOFStatoindetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.out_o_f_statoindetails.create');
    }

    /**
     * Store a newly created OutOFStatoindetail in storage.
     *
     * @param CreateOutOFStatoindetailRequest $request
     *
     * @return Response
     */
    public function store(CreateOutOFStatoindetailRequest $request)
    {
        $input = $request->all();

        $outOFStatoindetail = $this->outOFStatoindetailRepository->create($input);

        Flash::success('Out O F Statoindetail saved successfully.');

        return redirect(route('admin.outOFStatoindetails.index'))->with('success','Out O F Statoindetail saves successfully...');
    }

    /**
     * Display the specified OutOFStatoindetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outOFStatoindetail = $this->outOFStatoindetailRepository->find($id);

        if (empty($outOFStatoindetail)) {
            Flash::error('Out O F Statoindetail not found');

            return redirect(route('admin.outOFStatoindetails.index'));
        }

        return view('admin.out_o_f_statoindetails.show')->with('outOFStatoindetail', $outOFStatoindetail);
    }

    /**
     * Show the form for editing the specified OutOFStatoindetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outOFStatoindetail = $this->outOFStatoindetailRepository->find($id);

        if (empty($outOFStatoindetail)) {
            Flash::error('Out O F Statoindetail not found');

            return redirect(route('admin.outOFStatoindetails.index'));
        }

        return view('admin.out_o_f_statoindetails.edit')->with('outOFStatoindetail', $outOFStatoindetail);
    }

    /**
     * Update the specified OutOFStatoindetail in storage.
     *
     * @param int $id
     * @param UpdateOutOFStatoindetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutOFStatoindetailRequest $request)
    {
        $outOFStatoindetail = $this->outOFStatoindetailRepository->find($id);

        if (empty($outOFStatoindetail)) {
            Flash::error('Out O F Statoindetail not found');

            return redirect(route('admin.outOFStatoindetails.index'));
        }

        $outOFStatoindetail = $this->outOFStatoindetailRepository->update($request->all(), $id);

        Flash::success('Out O F Statoindetail updated successfully.');

        return redirect(route('admin.outOFStatoindetails.index'))->with('info','Out O F Statoindetail updated successfully...');
    }

    /**
     * Remove the specified OutOFStatoindetail from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outOFStatoindetail = $this->outOFStatoindetailRepository->find($id);

        if (empty($outOFStatoindetail)) {
            Flash::error('Out O F Statoindetail not found');

            return redirect(route('admin.outOFStatoindetails.index'));
        }

        $this->outOFStatoindetailRepository->delete($id);

        Flash::success('Out O F Statoindetail deleted successfully.');

        return redirect(route('admin.outOFStatoindetails.index'))->with('danger','Out O F Statoindetail deleted successfully...');
    }
}
