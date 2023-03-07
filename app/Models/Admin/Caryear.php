<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Caryear
 * @package App\Models\Admin
 * @version June 23, 2022, 3:25 pm UTC
 *
 * @property integer $id
 * @property integer $model_id
 * @property integer $year
 * @property integer $status
 */
class Caryear extends Model
{
    use SoftDeletes;


    public $table = 'caryears';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'model_id',
        'year',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'model_id' => 'integer',
        'year' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model_id' => 'Required',
        'year' => 'Required',
    ];

    public function modelName()
    {
        return $this->belongsTo(\App\Models\Admin\Carmodel::class, 'model_id');
    }

    public function car_model_name()
    {
        return $this->belongsTo(\App\Models\Admin\Carmodel::class, 'model_id');
    }

}
