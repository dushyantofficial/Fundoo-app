<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\leave_detailDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\Createleave_detailRequest;
use App\Http\Requests\Admin\Updateleave_detailRequest;
use App\Repositories\Admin\leave_detailRepository;
use Flash;
use Response;

class leave_detailController extends AppBaseController
{
    /** @var leave_detailRepository $leaveDetailRepository*/
    private $leaveDetailRepository;

    public function __construct(leave_detailRepository $leaveDetailRepo)
    {
        $this->leaveDetailRepository = $leaveDetailRepo;
    }

    /**
     * Display a listing of the leave_detail.
     *
     * @param leave_detailDataTable $leaveDetailDataTable
     *
     * @return Response
     */
    public function index(leave_detailDataTable $leaveDetailDataTable)
    {
        return $leaveDetailDataTable->render('admin.leave_details.index');
    }

    /**
     * Show the form for creating a new leave_detail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.leave_details.create');
    }

    /**
     * Store a newly created leave_detail in storage.
     *
     * @param Createleave_detailRequest $request
     *
     * @return Response
     */
    public function store(Createleave_detailRequest $request)
    {
        $input = $request->all();
        $input['status'] = config('constants.STATUS.Pending');
        $leaveDetail = $this->leaveDetailRepository->create($input);

        Flash::success('Leave Detail saved successfully.');

        return redirect(route('admin.leaveDetails.index'))->with('success','Leave Detail saves successfully...');
    }

    /**
     * Display the specified leave_detail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaveDetail = $this->leaveDetailRepository->find($id);

        if (empty($leaveDetail)) {
            Flash::error('Leave Detail not found');

            return redirect(route('admin.leaveDetails.index'));
        }

        return view('admin.leave_details.show')->with('leaveDetail', $leaveDetail);
    }

    /**
     * Show the form for editing the specified leave_detail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leaveDetail = $this->leaveDetailRepository->find($id);

        if (empty($leaveDetail)) {
            Flash::error('Leave Detail not found');

            return redirect(route('admin.leaveDetails.index'));
        }

        return view('admin.leave_details.edit')->with('leaveDetail', $leaveDetail);
    }

    /**
     * Update the specified leave_detail in storage.
     *
     * @param int $id
     * @param Updateleave_detailRequest $request
     *
     * @return Response
     */
    public function update($id, Updateleave_detailRequest $request)
    {
        $leaveDetail = $this->leaveDetailRepository->find($id);

        if (empty($leaveDetail)) {
            Flash::error('Leave Detail not found');

            return redirect(route('admin.leaveDetails.index'));
        }

        $leaveDetail = $this->leaveDetailRepository->update($request->all(), $id);

        Flash::success('Leave Detail updated successfully.');

        return redirect(route('admin.leaveDetails.index'))->with('info','Leave Detail updated successfully...');
    }

    /**
     * Remove the specified leave_detail from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaveDetail = $this->leaveDetailRepository->find($id);

        if (empty($leaveDetail)) {
            Flash::error('Leave Detail not found');

            return redirect(route('admin.leaveDetails.index'));
        }

        $this->leaveDetailRepository->delete($id);

        Flash::success('Leave Detail deleted successfully.');

        return redirect(route('admin.leaveDetails.index'))->with('danger','Leave Detail deleted successfully...');
    }
}
