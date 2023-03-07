<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OutOFStatoindetail;
use App\Repositories\BaseRepository;

/**
 * Class OutOFStatoindetailRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 9:14 am UTC
*/

class OutOFStatoindetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assign_driver_id',
        'from_date',
        'to_date',
        'from_time',
        'to_time',
        'location',
        'late',
        'longe'
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
        return OutOFStatoindetail::class;
    }
}
