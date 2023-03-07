<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Caryear;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CaryearDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.caryears.datatables_actions');

        return $dataTable->addColumn('action', 'admin.caryears.datatables_actions')
            ->addColumn('status', function($record){
                if($record->status == 'deactive'){
                    return '<span class="badge badge-danger">DeActive</span>';
                }else{
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->editColumn('model_id', function ($record) {
                return $record->modelName->model_name;
            })

            ->editColumn('created_at', function ($record) {
                return $record->created_at->format('d-m-Y h:i:s');
            })

            ->rawColumns(['action',  'status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Caryear $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Caryear $model)
    {
        return $model->newQuery()->with('car_model_name');
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
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
//            'model_id',
            'model_id' => ['data' => 'car_model_name.model_name', 'name' => 'car_model_name.model_name', 'title' => 'Model Name'],

            'year',
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
        return 'caryears_datatable_' . time();
    }
}
