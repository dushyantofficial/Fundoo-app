<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PermanentInquiry
 * @package App\Models\Admin
 * @version June 25, 2022, 8:09 am UTC
 *
 * @property integer $user_id
 * @property number $salary_start
 * @property number $salary_end
 * @property string $weekly_off
 * @property string $accomodetion
 * @property string $need_local_person
 * @property string $work_time_from
 * @property string $work_time_to
 * @property integer $status
 * @property string $type
 * @property integer $no_of_drivers
 * @property string $from_date
 * @property string $to_date
 */
class PermanentInquiry extends Model
{
    use SoftDeletes;


    public $table = 'permanent_inquiries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'salary_start',
        'salary_end',
        'weekly_off',
        'accomodation',
        'need_local_person',
        'work_time_from',
        'work_time_to',
        'status',
        'type',
        'no_of_drivers',
        'from_date',
        'to_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'salary_start' => 'decimal:2',
        'salary_end' => 'decimal:2',
        'weekly_off' => 'string',
        'accomodation' => 'string',
        'need_local_person' => 'string',
        'work_time_from' => 'datetime',
        'work_time_to' => 'datetime',
        'status' => 'string',
        'type' => 'string',
        'no_of_drivers' => 'integer',
        'from_date' => 'date',
        'to_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function permanent_customer()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function valet_customer()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

}
