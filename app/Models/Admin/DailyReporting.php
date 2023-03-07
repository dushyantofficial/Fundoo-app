<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DailyReporting
 * @package App\Models\Admin
 * @version June 25, 2022, 9:02 am UTC
 *
 * @property integer $assign_driver_id
 * @property string $check_in
 * @property string $check_out
 */
class DailyReporting extends Model
{
    use SoftDeletes;


    public $table = 'daily_reportings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'assign_driver_id',
        'check_in',
        'check_out'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'assign_driver_id' => 'integer',
        //'check_in' => 'datetime',
        //'check_out' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function driver()
    {
        return $this->belongsTo(\App\Models\User::class, 'assign_driver_id');
    }
}
