<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Carmodel;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CarmodelDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.carmodels.datatables_actions');

        return $dataTable->addColumn('action', 'admin.carmodels.datatables_actions')
            ->addColumn('status', function($record){
                if($record->status == 'deactive'){
                    return '<span class="badge badge-danger">DeActive</span>';
                }elseif($record->status == 'active'){
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->editColumn('company_id', function ($record) {
                return $record->carcompanies->company_name;
            })



            ->rawColumns(['action',  'status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Carmodel $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Carmodel $model)
    {
        return $model->newQuery()->with('carcompanies');
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
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
            'company_id' => ['data' => 'carcompanies.company_name', 'name' => 'carcompanies.company_name', 'title' => 'Company Name'],
            'model_name',
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
        return 'carmodels_datatable_' . time();
    }
}
