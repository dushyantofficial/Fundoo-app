<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class City
 * @package App\Models\Admin
 * @version June 23, 2022, 3:08 pm UTC
 *
 * @property \App\Models\Admin\State $state
 * @property string $city_name
 * @property integer $status
 * @property integer $state_id
 */
class City extends Model
{
    use SoftDeletes;


    public $table = 'cities';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'city_name',
        'pincode',
        'status',
        'state_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_name' => 'string',
        'pincode' => 'string',
        'status' => 'string',
        'state_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required',
        'city_name' => 'required',
        'pincode' => 'required'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\Admin\State::class, 'state_id','id');
    }
}
