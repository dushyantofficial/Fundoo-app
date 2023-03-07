<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Offercode;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OffercodeDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.offercodes.datatables_actions');


        return $dataTable->addColumn('action', 'admin.offercodes.datatables_actions')
            ->addColumn('status', function ($record) {
                if ($record->status == 'deactive') {
                    return '<span class="badge badge-danger">DeActive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->addColumn('valid_to', function ($record) {
                //return $record->valid_to->format('Y-m-d H:i:s');
                return date_formate($record->valid_to);
            })
            ->rawColumns(['action', 'status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Offercode $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Offercode $model)
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
                'dom' => 'lBfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
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
            'offer_code',
            'valid_to',
            'per_user_limit',
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
        return 'offercodes_datatable_' . time();
    }
}
