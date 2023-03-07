<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Salary;
use App\Repositories\BaseRepository;

/**
 * Class SalaryRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 9:04 am UTC
*/

class SalaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'assign_driver_id',
        'amount',
        'date',
        'type'
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
        return Salary::class;
    }
}
