<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OffercodeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateOffercodeRequest;
use App\Http\Requests\Admin\UpdateOffercodeRequest;
use App\Repositories\Admin\OffercodeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OffercodeController extends AppBaseController
{
    /** @var OffercodeRepository $offercodeRepository*/
    private $offercodeRepository;

    public function __construct(OffercodeRepository $offercodeRepo)
    {
        $this->offercodeRepository = $offercodeRepo;
    }

    /**
     * Display a listing of the Offercode.
     *
     * @param OffercodeDataTable $offercodeDataTable
     *
     * @return Response
     */
    public function index(OffercodeDataTable $offercodeDataTable)
    {
        return $offercodeDataTable->render('admin.offercodes.index');
    }

    /**
     * Show the form for creating a new Offercode.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.offercodes.create');
    }

    /**
     * Store a newly created Offercode in storage.
     *
     * @param CreateOffercodeRequest $request
     *
     * @return Response
     */
    public function store(CreateOffercodeRequest $request)
    {
        $input = $request->all();

        $offercode = $this->offercodeRepository->create($input);

        Flash::success('Offercode saved successfully.');

        return redirect(route('admin.offercodes.index'))->with('success','Offercode saves successfully...');
    }

    /**
     * Display the specified Offercode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            Flash::error('Offercode not found');

            return redirect(route('admin.offercodes.index'));
        }

        return view('admin.offercodes.show')->with('offercode', $offercode);
    }

    /**
     * Show the form for editing the specified Offercode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            Flash::error('Offercode not found');

            return redirect(route('admin.offercodes.index'));
        }

        return view('admin.offercodes.edit')->with('offercode', $offercode);
    }

    /**
     * Update the specified Offercode in storage.
     *
     * @param int $id
     * @param UpdateOffercodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOffercodeRequest $request)
    {
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            Flash::error('Offercode not found');

            return redirect(route('admin.offercodes.index'));
        }

        $offercode = $this->offercodeRepository->update($request->all(), $id);

        Flash::success('Offercode updated successfully.');

        return redirect(route('admin.offercodes.index'))->with('info','Offercode updated successfully...');
    }

    /**
     * Remove the specified Offercode from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $offercode = $this->offercodeRepository->find($id);

        if (empty($offercode)) {
            Flash::error('Offercode not found');

            return redirect(route('admin.offercodes.index'));
        }

        $this->offercodeRepository->delete($id);

        Flash::success('Offercode deleted successfully.');

        return redirect(route('admin.offercodes.index'))->with('danger','Offercode deleted successfully...');
    }
}
