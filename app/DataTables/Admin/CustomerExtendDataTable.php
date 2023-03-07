<?php

namespace App\DataTables\Admin;

use App\Models\Admin\CustomerExtend;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class CustomerExtendDataTable extends DataTable
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
//        return $dataTable->addColumn('action', 'admin.customer_extends.datatables_actions');


        return $dataTable->addColumn('action', 'admin.customer_extends.datatables_actions')
            ->addColumn('status', function ($record) {
                if ($record->status == 'deactive') {
                    return '<span class="badge badge-danger">DeActive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }

            })
//            ->addColumn('name', function ($record) {
//                return $record->customerUser->first_name;
//            })

            ->addColumn('name', function (CustomerExtend $user) {
                if (isset($user->users->first_name)) {
                    return $user->users->first_name;
                } else {
                    return ' - ';
                }
            })
            ->addColumn('contact_no', function ($record) {
                return $record->customerUser->mobile_no;
            })
            ->editColumn('city', function ($record) {
                if (isset($record->city)) {
                    return $record->city;
                } else {
                    return ' - ';
                }
            })
//            ->editColumn('state', function ($record) {
//                return $record->customerStatus->state_name;
//            })
//            ->editColumn('created_at', function ($record) {
//                return $record->created_at->format('d-m-Y h:i:s');
//            })
            ->rawColumns(['action', 'status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CustomerExtend $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CustomerExtend $model)
    {
        $model = CustomerExtend::whereHas('users', function ($q) {
            $q->where('verify_user', 1);
        })->groupBy('user_id');
        return $model->newQuery()->with('citys')->with('users');
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
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
//            'name' =>new Column(['title' => 'Name', 'data' => 'customerUser.name', 'name' => 'customerUser.first_name']),
            'name' => ['data' => 'users.first_name', 'name' => 'users.first_name', 'title' => 'Name', 'searchable' => true],
            'contact' => ['data' => 'users.mobile_no', 'name' => 'users.mobile_no', 'title' => 'Contact No'],
            'city',
//            'city',
            'status',

//            'state',
            //'user_id',
//            'email',
//            'address',
//            'apartment',
//            'block_flat',
//            'pincode',

//            'type'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customer_extends_datatable_' . time();
    }
}
