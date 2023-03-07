<?php

namespace App\DataTables\Admin;

//use App\Models\Admin\Permanent_InquiryDatatable;
use App\Models\Admin\PermanentInquiry;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class Permanent_InquiryDatatable extends DataTable
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

        return $dataTable
//            ->addColumn('action', 'admin.permanent_driver.datatables_actions')
            ->addColumn('status', function ($record) {
                if ($record->status == config('constants.STATUS.Pending')) {
                    return '<span class="badge badge-warning">Pending</span>';
                } else {
                    return '-';
                }

            })
            ->editColumn('mobile_no', function ($record) {
                return $record->permanent_customer->mobile_no;

            })
            ->editColumn('created_at', function ($record) {
                return $record->created_at->format('d-m-Y');
//                return $record->created_at->format('d-m-Y h:i:s');
            })
            ->editColumn('name', function ($record) {
                return $record->permanent_customer->first_name . ' ' . $record->permanent_customer->middle_name . ' ' . $record->permanent_customer->last_name;
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
            ->addColumn('actions', function ($row) {
                $btn = '<a href="' . route("driver-allocation-list") . '?id=' . $row->id . '" 
                        class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Assign To Driver">Assign Driver</a>';
                return $btn;
            })
            ->rawColumns(['status', 'name', 'mobile_no', 'created_at', 'work_type', 'actions']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\Permanent_InquiryDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PermanentInquiry $model)
    {
        $model = PermanentInquiry::where('status', config('constants.STATUS.Pending'))->where('type', config('constants.CATEGORY.permanent'));
        return $model->newQuery()->with('permanent_customer');
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
            'name' => ['data' => 'name', 'name' => 'permanent_customer.first_name', 'title' => 'Customer Name', 'searchable' => true],
            'created_at',
            'mobile_no' => ['data' => 'permanent_customer.mobile_no', 'name' => 'permanent_customer.mobile_no', 'title' => 'Mobile No'],
            'work_type',
            'status',
            'actions',

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin\Permanent_Inquiry_' . date('YmdHis');
    }
}
