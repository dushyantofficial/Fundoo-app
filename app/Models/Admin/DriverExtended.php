<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DriverExtended
 * @package App\Models\Admin
 * @version June 25, 2022, 7:46 am UTC
 *
 * @property integer $user_id
 * @property integer $aditional_contact_no
 * @property number $expriance
 * @property string $post_ads_appartment
 * @property string $post_ads_block_flat
 * @property string $post_ads_proof
 * @property integer $post_ads_pincode
 * @property integer $post_ads_city
 * @property integer $post_ads_state
 * @property string $post_ads_type
 * @property string $resi_ads_apartment
 * @property string $resi_ads_block_flate
 * @property integer $resi_ads_pincode
 * @property integer $resi_ads_city
 * @property integer $resi_ads_state
 * @property string $resi_ads_proof
 * @property string $license
 * @property string $aadhar_card
 * @property string $pancard
 * @property string $light_bill
 * @property string $language_known
 * @property number $monthly_salary
 * @property string $work_type
 * @property string $work_station
 * @property integer $is_kyc_verify
 */
class DriverExtended extends Model
{
    use SoftDeletes;


    public $table = 'driver_extendeds';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'aditional_contact_no',
        'expriance',
        'post_ads_appartment',
        'post_ads_block_flat',
        'post_ads_proof',
        'post_ads_pincode',
        'post_ads_city',
        'post_ads_state',
        'post_ads_type',
        'resi_ads_apartment',
        'resi_ads_block_flate',
        'resi_ads_pincode',
        'resi_ads_city',
        'resi_ads_state',
        'resi_ads_proof',
        'bank_name',
        'license',
        'aadhar_card',
        'pancard',
        'light_bill',
        'language_known',
        'monthly_salary',
        'work_type',
        'work_station',
        'is_kyc_verify',
        'driver_type',
        'vehicle_type',
        'select_vehicle_type',
        'account_number',
        'account_holder_name',
        'ifsc_code',
        'branch_name',
        'work_time',
        'aadhar_card_status',
        'pancard_status',
        'license_status',
        'light_bill_status',
        'aadhar_card_reject_reason',
        'driving_licence_reject_reason',
        'pancard_reject_reason',
        'light_bill_reject_reason',
        'resi_ads_type',
        'post_ads_late',
        'post_ads_long',
        'resi_ads_late',
        'resi_ads_long',
        'multi_work_type',
        'current_location'


    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'aditional_contact_no' => 'integer',
        'aadhar_card_status' => 'integer',
        'pancard_status' => 'integer',
        'license_status' => 'integer',
        'light_bill_status' => 'integer',
        'expriance' => 'string',
        'post_ads_appartment' => 'string',
        'post_ads_block_flat' => 'string',
        'post_ads_proof' => 'string',
        'post_ads_pincode' => 'integer',
        'post_ads_city' => 'string',
        'post_ads_state' => 'string',
        'post_ads_type' => 'string',
        'resi_ads_apartment' => 'string',
        'resi_ads_block_flate' => 'string',
        'resi_ads_pincode' => 'integer',
        'resi_ads_city' => 'string',
        'resi_ads_state' => 'string',
        'resi_ads_proof' => 'string',
        'license' => 'string',
        'aadhar_card' => 'string',
        'pancard' => 'string',
        'light_bill' => 'string',
        'language_known' => 'string',
        'multi_work_type' => 'array',
        'monthly_salary' => 'decimal:2',
        'work_type' => 'string',
        'work_station' => 'string',
        'is_kyc_verify' => 'integer',
        'driver_type' => 'string',
        'vehicle_type' => 'string',
        'select_vehicle_type' => 'array',
        'account_number' => 'string',
        'account_holder_name' => 'string',
        'bank_name' => 'string',
        'ifsc_code' => 'string',
        'branch_name' => 'string',
        'work_time' => 'string',
        'aadhar_card_reject_reason' => 'string',
        'driving_licence_reject_reason' => 'string',
        'pancard_reject_reason' => 'string',
        'light_bill_reject_reason' => 'string',
        'resi_ads_type' => 'string',
        'current_location'=>'string'


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
//        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
        'aditional_contact_no' => 'required|numeric|digits:10',
        'monthly_salary' => 'nullable',
        'work_station' => 'required',
        'resi_ads_apartment' => 'required',
        'resi_ads_block_flate' => 'required',
        'post_ads_appartment' => 'required',
        'post_ads_block_flat' => 'required',
         'post_ads_pincode' => 'required',
         'resi_ads_pincode' => 'required',
        'resi_ads_state' => 'required',
        'resi_ads_city' => 'required',
        'post_ads_state' => 'required',
        'date_of_birth' => 'required',
        'post_ads_city' =>'required',
        'work_type' => 'nullable',
        'post_ads_type' => 'nullable',
        'resi_ads_type' => 'nullable',
        'work_time' =>'required',
       // 'driver_type' => 'required',
        'profile_image' => 'mimes:png,jpeg,jpg',
        'resi_ads_proof' => 'mimes:png,jpeg,jpg',
        'post_ads_proof' => 'mimes:png,jpeg,jpg',
        'license' => 'mimes:png,jpeg,jpg',
        'aadhar_card' => 'mimes:png,jpeg,jpg',
        'pancard' => 'mimes:png,jpeg,jpg',
        'light_bill' => 'mimes:png,jpeg,jpg',
        //  'vehicle_type' => 'required',
        'language_known' => 'required',
        'multi_work_type' => 'required',
        //  'select_vehicle_type' => 'required_without_all',
//        'account_number' => 'required',
//        'account_holder_name' => 'required',
//        'ifsc_code' => 'required',
//        'branch_name' => 'required',

    ];
    public function assignDriver()
    {
        return $this->hasMany(\App\Models\Admin\Booking::class, 'driver_id', 'user_id');
    }

    public function permanent_driv()
    {
        return $this->hasMany(\App\Models\Admin\AssignDriver::class, 'driver_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function verify_user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id')->where('verify_user', 1);
    }

    public function permanent_drivers()
    {
        return $this->belongsTo(\App\Models\Admin\DriverCategory::class,  'work_type');
    }


    public function city()
    {
        return $this->belongsTo(\App\Models\Admin\City::class,  'user_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Admin\DriverCategory::class,  'user_id');
    }

    public function post_ads_statess()
    {
        return $this->belongsTo(\App\Models\Admin\State::class,  'post_ads_state');
    }


    public function post_ads_citys()
    {
        return $this->belongsTo(\App\Models\Admin\City::class,  'post_ads_city');
    }

    public function driver()
    {
        return $this->hasOne(\App\Models\User::class, 'id','user_id' );
    }


    public function firstName()
    {
        return $this->belongsTo(\App\Models\User::class,  'user_id');
    }

    public function Email()
    {
        return $this->belongsTo(\App\Models\User::class,  'user_id');
    }

    public function No()
    {
        return $this->belongsTo(\App\Models\Admin\DriverExtended::class,  'id');
    }

    public function userId()
    {
        return $this->hasOne(\App\Models\User::class, 'user_id');
    }

    public function resi_ads_statess()
    {
        return $this->belongsTo(\App\Models\Admin\State::class, 'resi_ads_state');
    }


    public function resi_ads_citys()
    {
        return $this->belongsTo(\App\Models\Admin\City::class, 'resi_ads_city');
    }

}
