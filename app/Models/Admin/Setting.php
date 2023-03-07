<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Setting
 * @package App\Models\Admin
 * @version June 23, 2022, 7:32 am UTC
 *
 * @property string $app_logo
 * @property string $intro_screen_one_img
 * @property string $intro_screen_one_title
 * @property string $intro_screen_one_desc
 * @property string $intro_screen_two_img
 * @property string $intro_screen_two_title
 * @property string $intro_screen_two_desc
 * @property string $intro_screen_three_img
 * @property string $intro_screen_three_title
 * @property string $intro_screen_three_desc
 * @property number $refer_comission_amt
 * @property integer $pagination_limit
 * @property string $helpline_number
 * @property string $helpline_email
 */
class Setting extends Model
{
    use SoftDeletes;


    public $table = 'setting';
    public $timestamps = true;
    protected $dates = ['deleted_at'];



    public $fillable = [
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
        'km_rate',
        'helpline_email',
        'per_km_panelty_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'app_logo' => 'string',
        'intro_screen_one_img' => 'string',
        'intro_screen_one_title' => 'string',
        'intro_screen_one_desc' => 'string',
        'intro_screen_two_img' => 'string',
        'intro_screen_two_title' => 'string',
        'intro_screen_two_desc' => 'string',
        'intro_screen_three_img' => 'string',
        'intro_screen_three_title' => 'string',
        'intro_screen_three_desc' => 'string',
        'refer_comission_amt' => 'decimal:2',
        'per_km_panelty_rate' => 'decimal:2',
        'km_rate' => 'decimal:2',
        'pagination_limit' => 'integer',
        'helpline_number' => 'string',
        'helpline_email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'app_logo' => 'Required',
        'refer_comission_amt' => 'Required',
        'pagination_limit' => 'Required',
        'km_rate' => 'Required',
        'helpline_number' => 'Required',
        'per_km_panelty_rate' => 'Required',
        'helpline_email' => 'Required | email',
//        'intro_screen_one_img' => 'Required',
//        'intro_screen_one_title' => 'Required',
//        'intro_screen_one_desc' => 'Required',
//        'intro_screen_two_title' => 'Required',
//        'intro_screen_two_desc' => 'Required',
//        'intro_screen_three_title' => 'Required',
//        'intro_screen_three_desc' => 'Required',

    ];


}
