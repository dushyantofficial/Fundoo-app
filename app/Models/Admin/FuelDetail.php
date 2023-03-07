<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class FuelDetail
 * @package App\Models\Admin
 * @version June 25, 2022, 9:10 am UTC
 *
 * @property integer $assign_driver_id
 * @property number $fuel_litter
 * @property integer $rate
 * @property number $total_amount
 * @property string $date
 */
class FuelDetail extends Model
{
    use SoftDeletes;


    public $table = 'fuel_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'assign_driver_id',
        'fuel_litter',
        'fuel_type',
        'rate',
        'total_amount',
        'date',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'assign_driver_id' => 'integer',
        'fuel_litter' => 'decimal:2',
        'fuel_type' => 'string',
        'rate' => 'integer',
        'total_amount' => 'decimal:2',
        'date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'assign_driver_id' => 'required',
        'fuel_litter' => 'required',
        'fuel_type' => 'required',
        'rate' => 'required',
        'total_amount' => 'required',
        'date' => 'required'
    ];

    public function driver()
    {
        return $this->belongsTo(\App\Models\User::class, 'assign_driver_id');
    }


}
