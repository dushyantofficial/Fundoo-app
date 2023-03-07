<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class leave_detail
 * @package App\Models\Admin
 * @version June 25, 2022, 9:06 am UTC
 *
 * @property integer $assign_driver_id
 * @property string $from_date
 * @property string $to_date
 * @property integer $status
 * @property string $remark
 */
class leave_detail extends Model
{
    use SoftDeletes;


    public $table = 'leave_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'assign_driver_id',
        'from_date',
        'to_date',
        'leave_type',
        'status',
        'remark'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'assign_driver_id' => 'integer',
        'from_date' => 'datetime',
        'to_date' => 'datetime',
        'leave_type' => 'string',
        'status' => 'string',
        'remark' => 'string'
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
        'leave_type' => 'required',
        'remark' => 'required'
    ];


}
