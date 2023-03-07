<?php

namespace App\Repositories\Admin;

use App\Models\Admin\leave_detail;
use App\Repositories\BaseRepository;

/**
 * Class leave_detailRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 9:06 am UTC
*/

class leave_detailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assign_driver_id',
        'from_date',
        'to_date',
        'status',
        'remark'
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
        return leave_detail::class;
    }
}
