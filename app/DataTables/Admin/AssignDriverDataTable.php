<?php

namespace App\DataTables\Admin;

use App\Models\Admin\AssignDriver;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class AssignDriverDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.assign_drivers.datatables_actions');

        return $dataTable->addColumn('action', 'admin.assign_drivers.datatables_actions')
            ->addColumn('status', function($record){
                if($record->status == 0){
                    return '<span class="badge badge-danger">IN-Active</span>';
                }else{
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->editColumn('work_time_from', function ($record) {
                return birth_date_formate($record->work_time_from);
            })
            ->editColumn('work_time_to', function ($record) {
                return birth_date_formate($record->work_time_to);
            })
            ->editColumn('from_date', function ($record) {
                return birth_date_formate($record->from_date);
            })
            ->editColumn('to_date', function ($record) {
                return birth_date_formate($record->to_date);
            })
            ->rawColumns(['action',  'status']);


    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AssignDriver $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AssignDriver $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'lBfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
    protected function getColumns()
    {
        return [
            'user_id',
            'driver_id',
            'type',
            'weekly_off',
            'accomodation',
            'work_time_from',
            'work_time_to',
            'from_date',
            'to_date',
            'salary'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'assign_drivers_datatable_' . time();
    }
}
