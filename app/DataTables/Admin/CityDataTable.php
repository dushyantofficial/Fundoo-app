<?php

namespace App\DataTables\Admin;

use App\Models\Admin\City;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class  CityDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.cities.datatables_actions');


        return $dataTable->addColumn('action', 'admin.cities.datatables_actions')
            ->addColumn('status', function($record){
               // dd($record->status);
                if($record->status == 'deactive'){
                    return '<span class="badge badge-danger">DeActive</span>';
                }else{
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->addColumn('no', function ($record) {
                return $record->interation;
            })
            ->editColumn('state_id', function ($record) {
                return $record->state->state_name;
            })

            ->editColumn('created_at', function ($record) {
                return $record->created_at->format('d-m-Y h:i:s');
            })

            ->rawColumns(['action', 'status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\City $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(City $model)
    {
        return $model->newQuery()->with('state');
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
//            'no',

//            'id' => ['searchable' => false],
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
            'state_id' => ['data' => 'state.state_name', 'name' => 'state.state_name', 'title' => 'State Name'],

//            'state_id',
            'city_name',
            'pincode',
            'status',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cities_datatable_' . time();
    }
}
