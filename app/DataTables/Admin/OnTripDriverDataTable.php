<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class OnTripDriverDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.drivers.total_drivers.datatables_actions')
//            ->addColumn('status', function ($record) {
//                if ($record->user->status == 'deactive') {
//                    return '<span class="badge badge-danger">DeActive</span>';
//                } else {
//                    return '<span class="badge badge-success">Active</span>';
//                }
//
//            })
            ->editColumn('mobile_no', function ($record) {
                return $record->mobile_no;

            })
//            ->editColumn('created_at', function ($record) {
//                return $record->created_at->format('d-m-Y h:i:s');
//            })
            ->editColumn('name', function ($record) {
                return $record->first_name . ' ' . $record->middle_name . ' ' . $record->last_name;
            })
//            ->addColumn('work_type', function ($record) {
//                if ($record->work_type == config('constants.CATEGORY.permanent')) {
//                    return 'Permanent';
//                } elseif ($record->work_type == config('constants.CATEGORY.temporary')) {
//                    return 'Temporary';
//                } elseif ($record->work_type == config('constants.CATEGORY.pickup-drop')) {
//                    return 'Pick-Up-Drop';
//                } elseif ($record->work_type == config('constants.CATEGORY.valet_parking')) {
//                    return 'Valet Parking';
//                }
//
//            })
            ->rawColumns(['action', 'name']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin/OnTripDriver $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        //  $model = Booking::where('driver_id','!=',null);
//        $model = DriverExtended::where('status',config('constants.STATUS.On_Going'));
        $model = User::whereHas('BookingassignDriver', function ($q) {
            $q->where('status', config('constants.STATUS.On_Going'));
        });
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
            'name' => ['data' => 'name', 'name' => 'first_name', 'title' => 'Name', 'searchable' => true],
            'mobile_no' => ['data' => 'mobile_no', 'name' => 'mobile_no', 'title' => 'Mobile No'],
//            'status',

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/OnTripDriver_' . date('YmdHis');
    }
}
