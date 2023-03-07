<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Carcompany;
use App\Repositories\BaseRepository;

/**
 * Class CarcompanyRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 3:17 pm UTC
*/

class CarcompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_name',
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
        return Carcompany::class;
    }
}
