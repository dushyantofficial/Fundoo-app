<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DailyReportingDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDailyReportingRequest;
use App\Http\Requests\Admin\UpdateDailyReportingRequest;
use App\Repositories\Admin\DailyReportingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DailyReportingController extends AppBaseController
{
    /** @var DailyReportingRepository $dailyReportingRepository*/
    private $dailyReportingRepository;

    public function __construct(DailyReportingRepository $dailyReportingRepo)
    {
        $this->dailyReportingRepository = $dailyReportingRepo;
    }

    /**
     * Display a listing of the DailyReporting.
     *
     * @param DailyReportingDataTable $dailyReportingDataTable
     *
     * @return Response
     */
    public function index(DailyReportingDataTable $dailyReportingDataTable)
    {
        return $dailyReportingDataTable->render('admin.daily_reportings.index');
    }

    /**
     * Show the form for creating a new DailyReporting.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.daily_reportings.create');
    }

    /**
     * Store a newly created DailyReporting in storage.
     *
     * @param CreateDailyReportingRequest $request
     *
     * @return Response
     */
    public function store(CreateDailyReportingRequest $request)
    {
        $input = $request->all();

        $dailyReporting = $this->dailyReportingRepository->create($input);

        Flash::success('Daily Reporting saved successfully.');

        return redirect(route('admin.dailyReportings.index'))->with('success','Daily Reporting saves successfully...');
    }

    /**
     * Display the specified DailyReporting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dailyReporting = $this->dailyReportingRepository->find($id);

        if (empty($dailyReporting)) {
            Flash::error('Daily Reporting not found');

            return redirect(route('admin.dailyReportings.index'));
        }

        return view('admin.daily_reportings.show')->with('dailyReporting', $dailyReporting);
    }

    /**
     * Show the form for editing the specified DailyReporting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dailyReporting = $this->dailyReportingRepository->find($id);

        if (empty($dailyReporting)) {
            Flash::error('Daily Reporting not found');

            return redirect(route('admin.dailyReportings.index'));
        }

        return view('admin.daily_reportings.edit')->with('dailyReporting', $dailyReporting);
    }

    /**
     * Update the specified DailyReporting in storage.
     *
     * @param int $id
     * @param UpdateDailyReportingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDailyReportingRequest $request)
    {
        $dailyReporting = $this->dailyReportingRepository->find($id);

        if (empty($dailyReporting)) {
            Flash::error('Daily Reporting not found');

            return redirect(route('admin.dailyReportings.index'));
        }

        $dailyReporting = $this->dailyReportingRepository->update($request->all(), $id);

        Flash::success('Daily Reporting updated successfully.');

        return redirect(route('admin.dailyReportings.index'))->with('info','Daily Reporting updated successfully...');
    }

    /**
     * Remove the specified DailyReporting from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dailyReporting = $this->dailyReportingRepository->find($id);

        if (empty($dailyReporting)) {
            Flash::error('Daily Reporting not found');

            return redirect(route('admin.dailyReportings.index'));
        }

        $this->dailyReportingRepository->delete($id);

        Flash::success('Daily Reporting deleted successfully.');

        return redirect(route('admin.dailyReportings.index'))->with('danger','Daily Reporting deleted successfully...');
    }
}
