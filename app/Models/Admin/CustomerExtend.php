<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CustomerExtend
 * @package App\Models\Admin
 * @version June 25, 2022, 7:54 am UTC
 *
 * @property integer $user_id
 * @property string $apartment
 * @property string $block_flat
 * @property integer $pincode
 * @property integer $city
 * @property integer $state
 * @property string $type
 */
class CustomerExtend extends Model
{
    use SoftDeletes;


    public $table = 'customer_extends';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'apartment',
        'block_flat',
        'pincode',
        'city',
        'state',
        'status',
        'address_type',
        'start_late',
        'start_long',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
//        'id' => 'integer',
//        'user_id' => 'integer',
//        'apartment' => 'string',
//        'block_flat' => 'string',
//        'pincode' => 'integer',
//        'city' => 'string',
//        'state' => 'string',
//        'address_type' => 'string',
//        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'user_id' => 'required',
        'apartment' => 'required',
        'block_flat' => 'required',
        'pincode' => 'required',
        'city' => 'required',
        'state' => 'required',
//        'start_late' => 'required',
//        'start_long' => 'required',

        /*User Validation*/
        'first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        //'mobile_no' => 'required|min:10|max:10',
//        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'gender' => 'required',
//        'email' => 'required|unique:users,email',
        'date_of_birth' => 'required',
        'profile_image' => 'required',
    ];

//    public function customerExtend()
//    {
//        return $this->belongsTo(\App\Models\Admin\City::class,  'city');
//    }

    public function citys()
    {
        return $this->belongsTo(\App\Models\Admin\City::class,  'city');
    }

    public function customerStatus()
    {
        return $this->belongsTo(\App\Models\Admin\State::class,  'state');
    }

    public function customerUser()
    {
        return $this->belongsTo(\App\Models\User::class,  'user_id');
    }

    public function contact()
    {
        return $this->belongsTo(\App\Models\User::class,  'user_id');
    }

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class,  'user_id');
    }

    public function customer()
    {
        return $this->hasOne(\App\Models\User::class, 'id','user_id' );
    }


}
