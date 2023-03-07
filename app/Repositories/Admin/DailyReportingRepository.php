<?php

namespace App\Repositories\Admin;

use App\Models\Admin\DailyReporting;
use App\Repositories\BaseRepository;

/**
 * Class DailyReportingRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 9:02 am UTC
*/

class DailyReportingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assign_driver_id',
        'check_in',
        'check_out'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DailyReporting::class;
    }
}
