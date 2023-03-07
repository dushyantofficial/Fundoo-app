<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Carcompany
 * @package App\Models\Admin
 * @version June 23, 2022, 3:17 pm UTC
 *
 * @property string $company_name
 * @property integer $status
 */
class Carcompany extends Model
{
    use SoftDeletes;


    public $table = 'carcompanies';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_name' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'company_name' => 'Required'

    ];


}
