<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DriverCategory
 * @package App\Models\Admin
 * @version June 25, 2022, 7:50 am UTC
 *
 * @property integer $user_id
 * @property string $category_name
 * @property string $category_key
 */
class DriverCategory extends Model
{
    use SoftDeletes;


    public $table = 'driver_categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'category_name',
        'category_key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'category_name' => 'string',
        'category_key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'category_name' => 'required',
        'category_key' => 'required',


    ];



}
