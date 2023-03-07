<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'mobile_no',
        'auth_otp',
        'pincode',
        'gender',
        'reffral_code',
        'is_doc_verified',
        'email',
        'verify_user',
        'lati',
        'longi',
        'city',
        'state',
        'status',
        'role',
        'is_online',
        'reffer_by',
        'date_of_birth',
        'profile_image',
        'device_token',
        'country_code',
        'expire_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
    public function customerEx()
    {
        return $this->hasMany(\App\Models\Admin\CustomerExtend::class,'user_id' );
    }

    public function driverEx()
    {
        return $this->hasMany(\App\Models\Admin\DriverExtended::class,'user_id' );
    }

    public function get_city()
    {
        return $this->belongsTo(\App\Models\Admin\City::class,'city');
    }
    public function get_state()
    {
        return $this->belongsTo(\App\Models\Admin\State::class,'state');
    }
    public function customer_car_details()
    {
        return $this->hasOne(\App\Models\Admin\CustomerCarDetail::class,'user_id');
    }

    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }

    public function driverExtend()
    {
        return $this->hasOne(\App\Models\Admin\DriverExtended::class,'user_id' );
    }

    public function daily_report()
    {
        return $this->hasMany(\App\Models\Admin\AssignDriver::class,'user_id' );
    }

    public function driverExten()
    {
        return $this->belongsTo(\App\Models\Admin\DriverExtended::class, 'id');
    }

    public function customerExtend()
    {
        return $this->hasOne(\App\Models\Admin\CustomerExtend::class, 'user_id');
    }

    public function extends()
    {
        return $this->hasOne(\App\Models\Admin\CustomerExtend::class, 'user_id');
    }

    public function refer_user()
    {
        return $this->belongsTo(\App\Models\User::class, 'reffer_by', 'id');
    }

    public function BookingassignDriver()
    {
        return $this->hasMany(\App\Models\Admin\Booking::class, 'driver_id', 'id');
    }
}
