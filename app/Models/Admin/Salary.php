<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Salary
 * @package App\Models\Admin
 * @version June 25, 2022, 9:04 am UTC
 *
 * @property integer $assign_driver_id
 * @property number $amount
 * @property string $date
 * @property string $type
 */
class Salary extends Model
{
    use SoftDeletes;


    public $table = 'salaries';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'assign_driver_id',
        'amount',
        'date',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'assign_driver_id' => 'integer',
        //'amount' => 'decimal:2',
        //'date' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
