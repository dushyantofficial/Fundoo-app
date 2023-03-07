<?php

namespace App\DataTables\Admin;

use App\Models\Admin\DriverExtended;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class DriverExtendedDataTable extends DataTable
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

//        return $dataTable->addColumn('action', 'admin.driver_extendeds.datatables_actions');


        return $dataTable->addColumn('action', 'admin.driver_extendeds.datatables_actions')
            ->addColumn('status', function ($record) {
//                dd($record->user->status);
                if ($record->user->status == 'deactive') {
                    return '<span class="badge badge-danger">DeActive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }

            })
            ->addColumn('work_type', function ($record) {

                if ($record->work_type == config('constants.CATEGORY.permanent')) {
                    return 'Permanent';
                } elseif ($record->work_type == config('constants.CATEGORY.temporary')) {
                    return 'Temporary';
                } elseif ($record->work_type == config('constants.CATEGORY.pickup-drop')) {
                    return 'Pick-Up-Drop';
                } elseif ($record->work_type == config('constants.CATEGORY.valet_parking')) {
                    return 'Valet Parking';
                } else {
                    return ' - ';
                }

            })
            ->editColumn('mobile_no', function ($record) {
                return $record->user->mobile_no;

            })
            ->editColumn('rating', function ($record) {
                return 4.1;

            })
            ->editColumn('created_at', function ($record) {
                return $record->created_at->format('d-m-Y h:i:s');
            })

            ->editColumn('name', function ($record) {
                return $record->user->first_name . ' ' . $record->user->middle_name . ' ' . $record->user->last_name;
            })
//            ->editColumn('no', function ($record) {
//                return $record->No->id;
//            })
//
//


            ->rawColumns(['action', 'status', 'work_type', 'name']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DriverExtended $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DriverExtended $model)
    {
//        $model = DriverExtended::with('user')->where('user.verify_user',1);
//        $model = DriverExtended::with('user');
        $model = DriverExtended::whereHas('user', function ($q) {
            $q->where('verify_user', 1);
        });
//        dd($model);
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
//            'id' => new \Yajra\DataTables\Html\Column(['title' => 'NO', 'data' => 'id', 'visible' => true]),

//            'user_id' => ['data' => 'user.first_name', 'name' => 'user.first_name', 'title' => 'Name'],
            'name' => ['data' => 'name', 'name' => 'user.first_name', 'title' => 'Name', 'searchable' => true],
            'work_type' => ['data' => 'work_type', 'name' => 'work_type', 'title' => 'Work Type', 'searchable' => true],
            'mobile_no' => ['data' => 'user.mobile_no', 'name' => 'user.mobile_no', 'title' => 'Mobile No'],
//            'email',

//            'user_id' =>new \Yajra\DataTables\Html\Column(['name' => 'Driver Name', 'data' => 'user.name', 'name' => 'user.name']),
//            'driver_name',
//            'contact_no',
//            'city',
//            'driver_category',
//            'rating',
            'status',
//            'created_at',


//            'aditional_contact_no',
//            'driver_type',
//            'expriance',
//            'post_ads_appartment',
//            'post_ads_block_flat',
//            'post_ads_proof',
//            'post_ads_pincode',
//            'post_ads_city',
//            'post_ads_state',
//            'post_ads_type',
//            'resi_ads_apartment',
//            'resi_ads_block_flate',
//            'resi_ads_pincode',
//            'resi_ads_city',
//            'resi_ads_state',
//            'resi_ads_proof',
//            'license',
//            'aadhar_card',
//            'pancard',
//            'light_bill',
//            'language_known',
//            'monthly_salary',
//            'work_type',
//            'work_station',
//            'is_kyc_verify'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'driver_extendeds_datatable_' . time();
    }
}
