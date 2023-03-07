<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Staticdata;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StaticdataDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.staticdatas.datatables_actions');


        return $dataTable->addColumn('action', 'admin.staticdatas.datatables_actions')
            ->addColumn('status', function($record){
                if($record->status == 'deactive'){
                    return '<span class="badge badge-danger">DeActive</span>';
                }else{
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->rawColumns(['action',  'status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Staticdata $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Staticdata $model)
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
//            'id' => ['searchable' => false],
            'key_lable',
            'value_lable',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'staticdatas_datatable_' . time();
    }
}