<?php

namespace App\DataTables\Admin;

use App\Models\Admin\DriverExtended;
use App\Models\Admin\KYC;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class KYCDataTable extends DataTable
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


        return $dataTable->addColumn('action', 'admin.kyc_customers.datatables_actions')
            ->addColumn('is_doc_verified', function ($record) {
                if ($record->user->is_doc_verified == 1) {
                    return '<span class="badge badge-success">Verify</span>';
                } else {
                    return '<span class="badge badge-danger">UnVerify</span>';
                }

            })
            ->editColumn('name', function ($record) {
                return $record->driver->first_name . ' ' . $record->driver->middle_name . ' ' . $record->driver->last_name;
            })
            ->rawColumns(['action', 'is_doc_verified', 'name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\KYC $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DriverExtended $model)
    {
        $model = DriverExtended::whereHas('user', function ($q) {
            $q->where('verify_user', 1);
        });
        return $model->newQuery()->with('user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
//                    ->setTableId('admin\kyc-table')
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
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
            'name' => ['data' => 'name', 'name' => 'user.first_name', 'title' => 'Name', 'searchable' => true],
//            'user_id' => ['data' => 'user.first_name', 'name' => 'user.first_name', 'title' => 'Name'],
            'email' => ['data' => 'user.email', 'name' => 'user.email', 'title' => 'email'],
            'mobile_no' => ['data' => 'user.mobile_no', 'name' => 'user.mobile_no', 'title' => 'Mobile No'],
            'is_doc_verified',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin\KYC_' . date('YmdHis');
    }
}
