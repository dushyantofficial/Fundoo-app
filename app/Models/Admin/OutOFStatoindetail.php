<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OutOFStatoindetail
 * @package App\Models\Admin
 * @version June 25, 2022, 9:14 am UTC
 *
 * @property integer $assign_driver_id
 * @property string $from_date
 * @property string $to_date
 * @property string $from_time
 * @property string $to_time
 * @property string $location
 * @property number $late
 * @property number $longe
 */
class OutOFStatoindetail extends Model
{
    use SoftDeletes;


    public $table = 'out_o_f_statoindetails';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'assign_driver_id',
        'from_date',
        'to_date',
        'from_time',
        'to_time',
        'location',
        'late',
        'longe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'assign_driver_id' => 'integer',
        'from_date' => 'date',
        'to_date' => 'date',
        'from_time' => 'datetime',
        'to_time' => 'datetime',
        'location' => 'string',
        'late' => 'decimal:2',
        'longe' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'assign_driver_id' => 'required',
        'from_date' => 'required',
        'to_date' => 'required',
        'from_time' => 'required',
        'to_time' => 'required',
        'location' => 'required',
        'late' => 'required',
        'longe' => 'required'
    ];

    
}
