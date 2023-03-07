<?php

namespace App\Repositories\Admin;

use App\Models\Admin\AssignDriver;
use App\Repositories\BaseRepository;

/**
 * Class AssignDriverRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 9:00 am UTC
*/

class AssignDriverRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'driver_id',
        'type',
        'weekly_off',
        'accomodation',
        'work_time_from',
        'work_tome_to',
        'from_date',
        'to_date',
        'salary'
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
        return AssignDriver::class;
    }
}
