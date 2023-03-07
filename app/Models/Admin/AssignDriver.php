<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AssignDriver
 * @package App\Models\Admin
 * @version June 25, 2022, 9:00 am UTC
 *
 * @property integer $user_id
 * @property integer $driver_id
 * @property string $type
 * @property string $weekly_off
 * @property string $accomodation
 * @property string $work_time_from
 * @property string $work_tome_to
 * @property string $from_date
 * @property string $to_date
 * @property number $salary
 */
class AssignDriver extends Model
{
    use SoftDeletes;


    public $table = 'assign_drivers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'driver_id',
        'type',
        'weekly_off',
        'accomodation',
        'work_time_from',
        'work_time_to',
        'from_date',
        'to_date',
        'salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'driver_id' => 'integer',
        'type' => 'string',
        'weekly_off' => 'string',
        'accomodation' => 'string',
        'work_time_from' => 'datetime',
        'work_time_to' => 'datetime',
        'from_date' => 'datetime',
        'to_date' => 'datetime',
        'salary' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'driver_id' => 'required',
        'type' => 'required',
        'weekly_off' => 'required',
        'accomodation' => 'required',
        'work_time_from' => 'required',
        'work_time_to' => 'required',
        'from_date' => 'required',
        'to_date' => 'required',
        'salary' => 'required'
    ];

    public function daily_report_driver()
    {
        return $this->hasMany(\App\Models\Admin\DailyReporting::class,'assign_driver_id','driver_id' );
    }

    public function customers()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function drivers()
    {
        return $this->belongsTo(\App\Models\User::class, 'driver_id');
    }

}
