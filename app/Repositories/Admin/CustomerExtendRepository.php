<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CustomerExtend;
use App\Repositories\BaseRepository;

/**
 * Class CustomerExtendRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 7:54 am UTC
*/

class CustomerExtendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'apartment',
        'block_flat',
        'pincode',
        'city',
        'state',
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
        return CustomerExtend::class;
    }
}
