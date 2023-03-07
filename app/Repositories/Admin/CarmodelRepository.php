<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Carmodel;
use App\Repositories\BaseRepository;

/**
 * Class CarmodelRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 3:20 pm UTC
*/

class CarmodelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'model_name',
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
        return Carmodel::class;
    }
}
