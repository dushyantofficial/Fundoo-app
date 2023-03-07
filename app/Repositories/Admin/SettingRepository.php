<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Setting;
use App\Repositories\Admin;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SettingRepository
 * @package App\Repositories\Admin
 * @version June 23, 2022, 7:32 am UTC
*/

class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'app_logo',
        'intro_screen_one_img',
        'intro_screen_one_title',
        'intro_screen_one_desc',
        'intro_screen_two_img',
        'intro_screen_two_title',
        'intro_screen_two_desc',
        'intro_screen_three_img',
        'intro_screen_three_title',
        'intro_screen_three_desc',
        'refer_comission_amt',
        'pagination_limit',
        'helpline_number',
        'helpline_email'
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
        return Setting::class;
    }
}
