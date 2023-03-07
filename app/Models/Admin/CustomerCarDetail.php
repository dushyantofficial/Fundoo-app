<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CustomerCarDetail
 * @package App\Models\Admin
 * @version June 25, 2022, 8:00 am UTC
 *
 * @property integer $user_id
 * @property integer $company_id
 * @property integer $model_id
 * @property integer $year_id
 * @property string $manual_or_automatic
 * @property string $number_plate
 * @property string $car_photos
 * @property integer $status
 */
class CustomerCarDetail extends Model
{
    use SoftDeletes;


    public $table = 'customer_car_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'company_name',
        'model_name',
        'year',
        'manual_or_automatic',
        'number_plate',
        'car_photos',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'company_name' => 'string',
        'model_name' => 'string',
        'year' => 'string',
        'manual_or_automatic' => 'string',
        'number_plate' => 'string',
        'car_photos' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'company_name' => 'required',
        'model_name' => 'required',
        'year' => 'required',
        'manual_or_automatic' => 'required',
        'number_plate' => 'required',
        'car_photos' => 'required'
    ];
    public function get_car_model()
    {
        return $this->belongsTo(\App\Models\Admin\Carmodel::class,'model_id');
    }
    public function get_car_year()
    {
        return $this->belongsTo(\App\Models\Admin\Caryear::class,'year_id');
    }
    public function get_car_company()
    {
        return $this->belongsTo(\App\Models\Admin\Carcompany::class,'company_id');
    }


}
