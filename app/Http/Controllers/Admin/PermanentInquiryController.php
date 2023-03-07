<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PermanentInquiryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreatePermanentInquiryRequest;
use App\Http\Requests\Admin\UpdatePermanentInquiryRequest;
use App\Repositories\Admin\PermanentInquiryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PermanentInquiryController extends AppBaseController
{
    /** @var PermanentInquiryRepository $permanentInquiryRepository*/
    private $permanentInquiryRepository;

    public function __construct(PermanentInquiryRepository $permanentInquiryRepo)
    {
        $this->permanentInquiryRepository = $permanentInquiryRepo;
    }

    /**
     * Display a listing of the PermanentInquiry.
     *
     * @param PermanentInquiryDataTable $permanentInquiryDataTable
     *
     * @return Response
     */
    public function index(PermanentInquiryDataTable $permanentInquiryDataTable)
    {
        return $permanentInquiryDataTable->render('admin.permanent_inquiries.index');
    }

    /**
     * Show the form for creating a new PermanentInquiry.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.permanent_inquiries.create');
    }

    /**
     * Store a newly created PermanentInquiry in storage.
     *
     * @param CreatePermanentInquiryRequest $request
     *
     * @return Response
     */
    public function store(CreatePermanentInquiryRequest $request)
    {
        $input = $request->all();

        $permanentInquiry = $this->permanentInquiryRepository->create($input);

        Flash::success('Permanent Inquiry saved successfully.');

        return redirect(route('admin.permanentInquiries.index'))->with('success','Permanent Inquiry saves successfully...');
    }

    /**
     * Display the specified PermanentInquiry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permanentInquiry = $this->permanentInquiryRepository->find($id);

        if (empty($permanentInquiry)) {
            Flash::error('Permanent Inquiry not found');

            return redirect(route('admin.permanentInquiries.index'));
        }

        return view('admin.permanent_inquiries.show')->with('permanentInquiry', $permanentInquiry);
    }

    /**
     * Show the form for editing the specified PermanentInquiry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permanentInquiry = $this->permanentInquiryRepository->find($id);

        if (empty($permanentInquiry)) {
            Flash::error('Permanent Inquiry not found');

            return redirect(route('admin.permanentInquiries.index'));
        }

        return view('admin.permanent_inquiries.edit')->with('permanentInquiry', $permanentInquiry);
    }

    /**
     * Update the specified PermanentInquiry in storage.
     *
     * @param int $id
     * @param UpdatePermanentInquiryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermanentInquiryRequest $request)
    {
        $permanentInquiry = $this->permanentInquiryRepository->find($id);

        if (empty($permanentInquiry)) {
            Flash::error('Permanent Inquiry not found');

            return redirect(route('admin.permanentInquiries.index'));
        }

        $permanentInquiry = $this->permanentInquiryRepository->update($request->all(), $id);

        Flash::success('Permanent Inquiry updated successfully.');

        return redirect(route('admin.permanentInquiries.index'))->with('info','Permanent Inquiry updated successfully...');
    }

    /**
     * Remove the specified PermanentInquiry from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permanentInquiry = $this->permanentInquiryRepository->find($id);

        if (empty($permanentInquiry)) {
            Flash::error('Permanent Inquiry not found');

            return redirect(route('admin.permanentInquiries.index'));
        }

        $this->permanentInquiryRepository->delete($id);

        Flash::success('Permanent Inquiry deleted successfully.');

        return redirect(route('admin.permanentInquiries.index'))->with('danger','Permanent Inquiry deleted successfully...');
    }
}
