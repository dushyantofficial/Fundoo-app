<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class State
 * @package App\Models\Admin
 * @version June 23, 2022, 1:59 pm UTC
 *
 * @property string $state_name
 * @property integer $status
 */
class State extends Model
{
    use SoftDeletes;


    public $table = 'states';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'state_name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state_name' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'state_name' =>'required'
    ];

    public function city()
    {
        return $this->belongsTo(\App\Models\Admin\State::class, 'state_id','id');
    }

    public function post_ads_state()
    {
        return $this->hasMany(\App\Models\Admin\State::class,  'post_ads_state','id');
    }


}
