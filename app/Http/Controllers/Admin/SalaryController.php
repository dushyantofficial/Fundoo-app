<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SalaryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSalaryRequest;
use App\Http\Requests\Admin\UpdateSalaryRequest;
use App\Repositories\Admin\SalaryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SalaryController extends AppBaseController
{
    /** @var SalaryRepository $salaryRepository*/
    private $salaryRepository;

    public function __construct(SalaryRepository $salaryRepo)
    {
        $this->salaryRepository = $salaryRepo;
    }

    /**
     * Display a listing of the Salary.
     *
     * @param SalaryDataTable $salaryDataTable
     *
     * @return Response
     */
    public function index(SalaryDataTable $salaryDataTable)
    {
        return $salaryDataTable->render('admin.salaries.index');
    }

    /**
     * Show the form for creating a new Salary.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.salaries.create');
    }

    /**
     * Store a newly created Salary in storage.
     *
     * @param CreateSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaryRequest $request)
    {
        $input = $request->all();

        $salary = $this->salaryRepository->create($input);

        Flash::success('Salary saved successfully.');

        return redirect(route('admin.salaries.index'))->with('success','Salary saves successfully...');
    }

    /**
     * Display the specified Salary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.salaries.index'));
        }

        return view('admin.salaries.show')->with('salary', $salary);
    }

    /**
     * Show the form for editing the specified Salary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.salaries.index'));
        }

        return view('admin.salaries.edit')->with('salary', $salary);
    }

    /**
     * Update the specified Salary in storage.
     *
     * @param int $id
     * @param UpdateSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaryRequest $request)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.salaries.index'));
        }

        $salary = $this->salaryRepository->update($request->all(), $id);

        Flash::success('Salary updated successfully.');

        return redirect(route('admin.salaries.index'))->with('info','Salary updated successfully...');
    }

    /**
     * Remove the specified Salary from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.salaries.index'));
        }

        $this->salaryRepository->delete($id);

        Flash::success('Salary deleted successfully.');

        return redirect(route('admin.salaries.index'))->with('danger','Salary deleted successfully...');
    }
}
