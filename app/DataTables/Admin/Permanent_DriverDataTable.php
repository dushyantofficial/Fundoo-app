<?php

namespace App\DataTables\Admin;

use App\Models\Admin\DriverExtended;
use App\Models\Permanent_Driver;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class Permanent_DriverDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.permanent_driver.datatables_actions')
            ->addColumn('status', function ($record) {
                if ($record->user->status == 'deactive') {
                    return '<span class="badge badge-danger">DeActive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->editColumn('mobile_no', function ($record) {
                return $record->user->mobile_no;

            })
            ->editColumn('rating', function ($record) {
                return 4.1;

            })
            ->editColumn('created_at', function ($record) {
                return $record->created_at->format('d-m-Y h:i:s');
            })
            ->editColumn('name', function ($record) {
                return $record->user->first_name . ' ' . $record->user->middle_name . ' ' . $record->user->last_name;
            })
            ->addColumn('work_type', function ($record) {
//                dd($record->user->status);
                if ($record->work_type == config('constants.CATEGORY.permanent')) {
                    return 'Permanent';
                } elseif ($record->work_type == config('constants.CATEGORY.temporary')) {
                    return 'Temporary';
                } elseif ($record->work_type == config('constants.CATEGORY.pickup-drop')) {
                    return 'Pick-Up-Drop';
                } elseif ($record->work_type == config('constants.CATEGORY.valet_parking')) {
                    return 'Valet Parking';
                }

            })
            ->rawColumns(['action', 'status', 'work_type', 'name']);

    }


/**
 * Get query source of dataTable.
 *
 * @param \App\Models\Permanent_Driver $model
 * @return \Illuminate\Database\Eloquent\Builder
 */
public function query(DriverExtended $model)
{
    $model = DriverExtended::where('work_type', config('constants.CATEGORY.permanent'))->whereHas('user', function ($q) {

        $q->where('verify_user', 1);
    });

    return $model->newQuery()->with('user');
}

/**
 * Optional method if you want to use html builder.
 *
 * @return \Yajra\DataTables\Html\Builder
 */
public
function html()
{
    return $this->builder()
    ->columns($this->getColumns())
        ->minifiedAjax()
        ->addAction(['width' => '120px', 'printable' => false])
        ->parameters([
            'dom' => 'lBfrtip',
            'stateSave' => true,
            'order' => [[0, 'desc']],
            'buttons' => [
                ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
            ],
        ]);
}

/**
 * Get columns.
 *
 * @return array
 */
protected
function getColumns()
{
    return [
        'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
        'name' => ['data' => 'name', 'name' => 'user.first_name', 'title' => 'Name', 'searchable' => true],
        'work_type',
        'mobile_no' => ['data' => 'user.mobile_no', 'name' => 'user.mobile_no', 'title' => 'Mobile No'],
        'status',

    ];
}

/**
 * Get filename for export.
 *
 * @return string
 */
protected
function filename()
{
    return 'Permanent_Driver_' . date('YmdHis');
}
}
