<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\Admin\FaqDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(FaqDataTable $FaqDataTable)
    {
        return $FaqDataTable->render('admin.faq.index');
    }

    public function create()
    {

        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate(Faq::$rules);
        $input = $request->all();
        Faq::create($input);
        return redirect(route('admin.faq.index'))->with('success', 'Faq saved successfully...');
    }

    public function show($id)
    {


        $faqs = Faq::find($id);

        if (empty($faqs)) {

            return redirect(route('admin.faq.index'))->with('danger', 'Faq not found');
        }

        return view('admin.faq.show', compact('faqs'));
    }

    public function edit($id)
    {

        $faqs = Faq::find($id);

        if (empty($faqs)) {

            return redirect(route('admin.faq.index'))->with('danger', 'Faq not found');
        }

        return view('admin.faq.edit', compact('faqs'));
    }

    public function update($id, Request $request)
    {
        $faqs = Faq::find($id);
        $input = $request->all();
        if (empty($faqs)) {

            return redirect(route('admin.faq.index'))->with('danger', 'Faq not found');
        }

        $faqs->update($input);

        return redirect(route('admin.faq.index'))->with('info', 'Faq updated successfully...');
    }

    public function destroy($id)
    {
        $faqs = Faq::find($id);

        if (empty($faqs)) {

            return redirect(route('admin.faq.index'))->with('danger', 'Faq not found');
        }

        $faqs->delete();

        return redirect(route('admin.faq.index'))->with('danger', 'Faq deleted successfully...');
    }
}
