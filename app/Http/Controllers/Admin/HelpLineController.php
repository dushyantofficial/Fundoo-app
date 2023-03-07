<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Help_LineDataTable;
use App\Models\Admin\Help_Line;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\Controller;

class HelpLineController extends Controller
{
    public function index(Help_LineDataTable $HelpLineDataTable)
    {
        return $HelpLineDataTable->render('admin.help_line.index');
    }

    public function destroy($id)
    {
        $helpline = Help_Line::find($id);

        if (empty($helpline)) {
            Flash::error('HelpLine not found');

            return redirect(route('admin.help-line.index'));
        }

        $helpline->delete($id);

        Flash::success('Helpline deleted successfully.');

        return redirect(route('admin.help-line.index'))->with('danger','Helpline deleted successfully...');
    }
}
