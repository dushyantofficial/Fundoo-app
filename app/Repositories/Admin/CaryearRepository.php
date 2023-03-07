<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Caryear;
use App\Repositories\BaseRepository;

/**
 * Class CaryearRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 3:25 pm UTC
*/

class CaryearRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'model_id',
        'year',
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
        return Caryear::class;
    }
}
