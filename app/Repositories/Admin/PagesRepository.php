<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Pages;
use App\Repositories\BaseRepository;

/**
 * Class PagesRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 11:05 am UTC
*/

class PagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'page_title',
        'description',
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
        return Pages::class;
    }
}
