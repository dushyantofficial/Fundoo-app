<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Carmodel
 * @package App\Models\Admin
 * @version June 23, 2022, 3:20 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $carcompanies
 * @property string $company_id
 * @property string $model_name
 * @property integer $status
 */
class Carmodel extends Model
{
    use SoftDeletes;


    public $table = 'carmodels';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'model_name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'string',
        'model_name' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'Required',
        'model_name' => 'Required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function carcompanies()
    {
        return $this->belongsTo(\App\Models\Admin\Carcompany::class, 'company_id');
    }
}
