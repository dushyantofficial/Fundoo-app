<?php

namespace App\Repositories\Admin;

use App\Models\Admin\FuelDetail;
use App\Repositories\BaseRepository;

/**
 * Class FuelDetailRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 9:10 am UTC
*/

class FuelDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assign_driver_id',
        'fuel_litter',
        'rate',
        'total_amount',
        'date'
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
        return FuelDetail::class;
    }
}
