<?php

namespace App\Repositories\Admin;

use App\Models\Admin\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 3:08 pm UTC
*/

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'city_name',
        'status',
        'state_id'
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
        return City::class;
    }
}
