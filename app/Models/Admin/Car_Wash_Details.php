<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car_Wash_Details extends Model
{
    use HasFactory;

    use SoftDeletes;


    public $table = 'car_wash_details';
    public $fillable = [
        'customer_id',
        'driver_id',
        'car_id',
        'status',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'id' => 'integer',
//        'customer_id' => 'integer',
//        'driver_id' => 'integer',
//        'company_id' => 'string',
//        'model_name' => 'string',
//        'status' => 'string'
//    ];

    /**
     * Validation rules
     *
     * @var array
     */
//    public static $rules = [
//        'company_id' => 'Required',
//        'model_name' => 'Required'
//    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customers()
    {
        return $this->belongsTo(\App\Models\User::class, 'customer_id');
    }

    public function drivers()
    {
        return $this->belongsTo(\App\Models\User::class, 'driver_id');
    }

    public function cars()
    {
        return $this->belongsTo(\App\Models\Admin\CustomerCarDetail::class, 'car_id');
    }
}

