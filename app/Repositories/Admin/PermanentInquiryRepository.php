<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PermanentInquiry;
use App\Repositories\BaseRepository;

/**
 * Class PermanentInquiryRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 8:09 am UTC
*/

class PermanentInquiryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'salary_start',
        'salary_end',
        'weekly_off',
        'accomodetion',
        'need_local_person',
        'work_time_from',
        'work_time_to',
        'status',
        'type',
        'no_of_drivers',
        'from_date',
        'to_date'
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
        return PermanentInquiry::class;
    }
}
