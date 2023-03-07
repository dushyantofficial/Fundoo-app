<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Staticdata
 * @package App\Models\Admin
 * @version June 23, 2022, 3:51 pm UTC
 *
 * @property string $key_lable
 * @property string $value_lable
 * @property integer $status
 */
class Staticdata extends Model
{
    use SoftDeletes;


    public $table = 'staticdatas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'key_lable',
        'value_lable',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key_lable' => 'string',
        'value_lable' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key_lable' => 'Required',
        'value_lable' => 'Required'
    ];


}
