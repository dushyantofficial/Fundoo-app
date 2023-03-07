<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Offercode
 * @package App\Models\Admin
 * @version June 23, 2022, 3:39 pm UTC
 *
 * @property string $offer_code
 * @property string $valid_to
 * @property integer $per_user_limit
 * @property integer $status
 */
class Offercode extends Model
{
    use SoftDeletes;


    public $table = 'offercodes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'offer_code',
        'valid_to',
        'per_user_limit',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'offer_code' => 'string',
        'valid_to' => 'datetime',
        'per_user_limit' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'offer_code' => 'Required',
        'valid_to' => 'Required',
        'per_user_limit' => 'Required',
        'status' => 'Required'
    ];


}
