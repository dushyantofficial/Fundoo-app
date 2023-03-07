<?php

namespace App\DataTables\Admin;


use App\Models\Admin\AssignDriver;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class Assign_Permanent_DriversDataTable extends DataTable
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

        return $dataTable->addColumn('status', function ($record) {
            if ($record->customers->status == 'deactive') {
                return '<span class="badge badge-danger">DeActive</span>';
            } else {
                return '<span class="badge badge-success">Active</span>';
            }

        })
            ->editColumn('c_mobile_no', function ($record) {
                return $record->customers->mobile_no;
            })
            ->editColumn('d_mobile_no', function ($record) {
                return $record->drivers->mobile_no;
            })
            ->editColumn('assign_driver_date', function ($record) {
                return birth_date_formate($record->created_at);
            })
            ->editColumn('customer_name', function ($record) {
                $btn = '<a href="' . route("customer-dashboard") . '?id=' . $record->user_id . '" 
                        >' . $record->customers->first_name . ' ' . $record->customers->middle_name . ' ' . $record->customers->last_name . '</a>';
                return $btn;

            })
            ->editColumn('driver_name', function ($record) {
                $btn = '<a href="' . route("driver-dashboard") . '?id=' . $record->driver_id . '" 
                        >' . $record->drivers->first_name . ' ' . $record->drivers->middle_name . ' ' . $record->drivers->last_name . '</a>';
                return $btn;

            })
            ->addColumn('work_type', function ($record) {
//                dd($record->user->status);
                if ($record->type == config('constants.CATEGORY.permanent')) {
                    return 'Permanent';
                } elseif ($record->type == config('constants.CATEGORY.temporary')) {
                    return 'Temporary';
                } elseif ($record->type == config('constants.CATEGORY.pickup-drop')) {
                    return 'Pick-Up-Drop';
                } elseif ($record->type == config('constants.CATEGORY.valet_parking')) {
                    return 'Valet Parking';
                }

            })
            ->rawColumns(['status', 'work_type', 'customer_name', 'c_mobile_no', 'd_mobile_no', 'driver_name', 'assign_driver_date']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\Assign_Permanent_DriversDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Assign_Permanent_DriversDataTable $model)
    {
        $model = AssignDriver::where('type', config('constants.CATEGORY.permanent'));

        return $model->newQuery()->with('customers', 'drivers');
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
//            ->addAction(['width' => '120px', 'printable' => false])
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
    protected function getColumns()
    {
        return [
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
            'customer_name' => ['data' => 'customer_name', 'name' => 'customers.first_name', 'title' => 'Customer Name', 'searchable' => true],
            'c_mobile_no' => ['data' => 'c_mobile_no', 'name' => 'customers.mobile_no', 'title' => 'Customer Mobile Number', 'searchable' => true],
            'driver_name' => ['data' => 'driver_name', 'name' => 'drivers.first_name', 'title' => 'Driver Name', 'searchable' => true],
            'd_mobile_no' => ['data' => 'd_mobile_no', 'name' => 'drivers.mobile_no', 'title' => 'Driver Mobile Number', 'searchable' => true],
            'work_type',
            'assign_driver_date' => ['data' => 'assign_driver_date', 'name' => 'created_at', 'title' => 'Assign Driver Date', 'searchable' => true],
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
        return 'Admin\Assign_Permanent_Drivers_' . date('YmdHis');
    }
}
