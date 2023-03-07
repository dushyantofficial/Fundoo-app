<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DriverCategoryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDriverCategoryRequest;
use App\Http\Requests\Admin\UpdateDriverCategoryRequest;
use App\Repositories\Admin\DriverCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DriverCategoryController extends AppBaseController
{
    /** @var DriverCategoryRepository $driverCategoryRepository*/
    private $driverCategoryRepository;

    public function __construct(DriverCategoryRepository $driverCategoryRepo)
    {
        $this->driverCategoryRepository = $driverCategoryRepo;
    }

    /**
     * Display a listing of the DriverCategory.
     *
     * @param DriverCategoryDataTable $driverCategoryDataTable
     *
     * @return Response
     */
    public function index(DriverCategoryDataTable $driverCategoryDataTable)
    {
        return $driverCategoryDataTable->render('admin.driver_categories.index');
    }

    /**
     * Show the form for creating a new DriverCategory.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.driver_categories.create');
    }

    /**
     * Store a newly created DriverCategory in storage.
     *
     * @param CreateDriverCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverCategoryRequest $request)
    {
        $input = $request->all();

        $driverCategory = $this->driverCategoryRepository->create($input);

        Flash::success('Driver Category saved successfully.');

        return redirect(route('admin.driverCategories.index'))->with('success','Driver Category saves successfully...');
    }

    /**
     * Display the specified DriverCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $driverCategory = $this->driverCategoryRepository->find($id);

        if (empty($driverCategory)) {
            Flash::error('Driver Category not found');

            return redirect(route('admin.driverCategories.index'));
        }

        return view('admin.driver_categories.show')->with('driverCategory', $driverCategory);
    }

    /**
     * Show the form for editing the specified DriverCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $driverCategory = $this->driverCategoryRepository->find($id);

        if (empty($driverCategory)) {
            Flash::error('Driver Category not found');

            return redirect(route('admin.driverCategories.index'));
        }

        return view('admin.driver_categories.edit')->with('driverCategory', $driverCategory);
    }

    /**
     * Update the specified DriverCategory in storage.
     *
     * @param int $id
     * @param UpdateDriverCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverCategoryRequest $request)
    {
        $driverCategory = $this->driverCategoryRepository->find($id);

        if (empty($driverCategory)) {
            Flash::error('Driver Category not found');

            return redirect(route('admin.driverCategories.index'));
        }

        $driverCategory = $this->driverCategoryRepository->update($request->all(), $id);

        Flash::success('Driver Category updated successfully.');

        return redirect(route('admin.driverCategories.index'))->with('info','Driver Category updated successfully...');
    }

    /**
     * Remove the specified DriverCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $driverCategory = $this->driverCategoryRepository->find($id);

        if (empty($driverCategory)) {
            Flash::error('Driver Category not found');

            return redirect(route('admin.driverCategories.index'));
        }

        $this->driverCategoryRepository->delete($id);

        Flash::success('Driver Category deleted successfully.');

        return redirect(route('admin.driverCategories.index'))->with('danger','Driver Category deleted successfully...');
    }
}
