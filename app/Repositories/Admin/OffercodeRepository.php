<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Offercode;
use App\Repositories\BaseRepository;

/**
 * Class OffercodeRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 3:39 pm UTC
*/

class OffercodeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'offer_code',
        'valid_to',
        'per_user_limit',
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
        return Offercode::class;
    }
}
