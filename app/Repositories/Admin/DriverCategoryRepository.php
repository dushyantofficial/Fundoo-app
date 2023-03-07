<?php

namespace App\Repositories\Admin;

use App\Models\Admin\DriverCategory;
use App\Repositories\BaseRepository;

/**
 * Class DriverCategoryRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 7:50 am UTC
*/

class DriverCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'category_name',
        'category_key'
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
        return DriverCategory::class;
    }
}
