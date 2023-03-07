<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CustomerCarDetailDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateCustomerCarDetailRequest;
use App\Http\Requests\Admin\UpdateCustomerCarDetailRequest;
use App\Repositories\Admin\CustomerCarDetailRepository;
use Flash;
use Response;

class CustomerCarDetailController extends AppBaseController
{
    /** @var CustomerCarDetailRepository $customerCarDetailRepository*/
    private $customerCarDetailRepository;

    public function __construct(CustomerCarDetailRepository $customerCarDetailRepo)
    {
        $this->customerCarDetailRepository = $customerCarDetailRepo;
    }

    /**
     * Display a listing of the CustomerCarDetail.
     *
     * @param CustomerCarDetailDataTable $customerCarDetailDataTable
     *
     * @return Response
     */
    public function index(CustomerCarDetailDataTable $customerCarDetailDataTable)
    {
        return $customerCarDetailDataTable->render('admin.customer_car_details.index');
    }

    /**
     * Show the form for creating a new CustomerCarDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.customer_car_details.create');
    }

    /**
     * Store a newly created CustomerCarDetail in storage.
     *
     * @param CreateCustomerCarDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerCarDetailRequest $request)
    {
        $input = $request->all();

        $customerCarDetail = $this->customerCarDetailRepository->create($input);

        Flash::success('Customer Car Detail saved successfully.');

        return redirect(route('admin.customerCarDetails.index'))->with('success','Customer Car Detail saved successfully...');
    }

    /**
     * Display the specified CustomerCarDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerCarDetail = $this->customerCarDetailRepository->find($id);

        if (empty($customerCarDetail)) {
            Flash::error('Customer Car Detail not found');

            return redirect(route('admin.customerCarDetails.index'));
        }

        return view('admin.customer_car_details.show')->with('customerCarDetail', $customerCarDetail);
    }

    /**
     * Show the form for editing the specified CustomerCarDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerCarDetail = $this->customerCarDetailRepository->find($id);

        if (empty($customerCarDetail)) {
            Flash::error('Customer Car Detail not found');

            return redirect(route('admin.customerCarDetails.index'));
        }

        return view('admin.customer_car_details.edit')->with('customerCarDetail', $customerCarDetail);
    }

    /**
     * Update the specified CustomerCarDetail in storage.
     *
     * @param int $id
     * @param UpdateCustomerCarDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerCarDetailRequest $request)
    {
        $customerCarDetail = $this->customerCarDetailRepository->find($id);

        if (empty($customerCarDetail)) {
            Flash::error('Customer Car Detail not found');

            return redirect(route('admin.customerCarDetails.index'));
        }

        $customerCarDetail = $this->customerCarDetailRepository->update($request->all(), $id);

        Flash::success('Customer Car Detail updated successfully.');

        return redirect(route('admin.customerCarDetails.index'))->with('info','Customer Car Detail updated successfully...');
    }

    /**
     * Remove the specified CustomerCarDetail from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerCarDetail = $this->customerCarDetailRepository->find($id);

        if (empty($customerCarDetail)) {
            Flash::error('Customer Car Detail not found');

            return redirect(route('admin.customerCarDetails.index'));
        }

        $this->customerCarDetailRepository->delete($id);

        Flash::success('Customer Car Detail deleted successfully.');

        return redirect(route('admin.customerCarDetails.index'))->with('danger','Customer Car Detail deleted successfully...');
    }
}
