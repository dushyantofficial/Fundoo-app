<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PagesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreatePagesRequest;
use App\Http\Requests\Admin\UpdatePagesRequest;
use App\Models\Admin\Pages;
use App\Repositories\Admin\PagesRepository;
use Flash;
use Response;

class PagesController extends AppBaseController
{
    /** @var PagesRepository $pagesRepository*/
    private $pagesRepository;

    public function __construct(PagesRepository $pagesRepo)
    {
        $this->pagesRepository = $pagesRepo;
    }

    /**
     * Display a listing of the Pages.
     *
     * @param PagesDataTable $pagesDataTable
     *
     * @return Response
     */
    public function index(PagesDataTable $pagesDataTable)
    {

        return $pagesDataTable->render('admin.pages.index');
    }

    /**
     * Show the form for creating a new Pages.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created Pages in storage.
     *
     * @param CreatePagesRequest $request
     *
     * @return Response
     */
    public function store(CreatePagesRequest $request)
    {
        $input = $request->all();

        $pages = $this->pagesRepository->create($input);

        Flash::success('Pages saved successfully.');

        return redirect(route('admin.pages.index'))->with('success','Pages saves successfully...');
    }

    /**
     * Display the specified Pages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pages = $this->pagesRepository->find($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'))->with('danger', 'Pages not found');
        }

        return view('admin.pages.show')->with('pages', $pages);
    }

    /**
     * Show the form for editing the specified Pages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pages = $this->pagesRepository->find($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'))->with('danger', 'Pages not found');
        }

        return view('admin.pages.edit')->with('pages', $pages);
    }

    /**
     * Update the specified Pages in storage.
     *
     * @param int $id
     * @param UpdatePagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagesRequest $request)
    {
        $pages = $this->pagesRepository->find($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'));
        }

        $pages = $this->pagesRepository->update($request->all(), $id);

        Flash::success('Pages updated successfully.');

        return redirect(route('admin.pages.index'))->with('info','Pages updated successfully...');
    }

    /**
     * Remove the specified Pages from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pages = $this->pagesRepository->find($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'));
        }

        $this->pagesRepository->delete($id);

        Flash::success('Pages deleted successfully.');

        return redirect(route('admin.pages.index'))->with('danger','Pages deleted successfully...');
    }

//    public function status($id)
//    {
//        $pages = Pages::find($id);
//        if ($pages->status == 'Deactive')
//        {
//            $status = 'Active';
//            $values = array('status' => $status);
//            if ($pages->update($values))
//            {
//                return redirect('pages');
//            }
//        }
//        else
//        {
//            $status = 'Deactive';
//        }
//        $values = array('status' => $status);
//        if ($pages->update($values))
//        {
//            return redirect('pages');
//        }
//
//    }
    public function get_terms_conditions()
    {
        $terms = Pages::get();
        return view('front.terms_and_condition', compact('terms'));
    }

    public function get_privacy_policy()
    {
        $policy = Pages::get();
        return view('front.policy', compact('policy'));
    }

    public function get_about()
    {
        $about = Pages::get();
        return view('front.about', compact('about'));
    }
}
