<?php

namespace App\DataTables;

use App\Models\DriverExtended;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

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

        return $dataTable->addColumn('action', 'driver_extendeds.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DriverExtended $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DriverExtended $model)
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
            'user_id',
            'aditional_contact_no',
            'expriance',
            'post_ads_appartment',
            'post_ads_block_flat',
            'post_ads_proof',
            'post_ads_pincode',
            'post_ads_city',
            'post_ads_state',
            'post_ads_type',
            'resi_ads_apartment',
            'resi_ads_block_flate',
            'resi_ads_pincode',
            'resi_ads_city',
            'resi_ads_state',
            'resi_ads_proof',
            'license',
            'aadhar_card',
            'pancard',
            'light_bill',
            'language_known',
            'monthly_salary',
            'work_type',
            'work_station',
            'is_kyc_verify'
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
