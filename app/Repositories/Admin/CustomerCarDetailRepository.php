<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CustomerCarDetail;
use App\Repositories\BaseRepository;

/**
 * Class CustomerCarDetailRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 8:00 am UTC
*/

class CustomerCarDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'company_id',
        'model_id',
        'year_id',
        'manual_or_automatic',
        'number_plate',
        'car_photos',
        'status'
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
        return CustomerCarDetail::class;
    }
}
