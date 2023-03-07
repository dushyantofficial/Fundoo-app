<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;

    use SoftDeletes;


    public $table = 'bookings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer_id',
        'driver_id',
        'pickup_drop_or_temp',
        'incity_or_out_city',
        'live_or_advance',
        'start_late',
        'start_long',
        'destination_late',
        'destination_long',
        'start_or_pickup_date',
        'start_or_pickup_time',
        'end_or_drop_date',
        'end_or_drop_time',
        'assign_driver_date',
        'total_payment',
        'status',
        'city',
        'state',
        'address',
        'destination_city',
        'destination_state',
        'destination_address',
        'picture_befor_start',
        'picture_befor_end',
        'cancel_reason',
        'total_panelty',
        'car_id',
        'reffer_amount',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'car_id' => 'integer',
//        'customer_id' => 'string',
//        'driver_id' => 'integer',
        'pickup_drop_or_temp' => 'string',
        'incity_or_out_city' => 'string',
        'cancel_reason' => 'string',
        'live_or_advance' => 'string',
        'start_late' => 'string',
        'start_long' => 'string',
        'destination_late' => 'string',
        'destination_long' => 'string',
        'start_or_pickup_date' => 'string',
        'end_or_drop_date' => 'string',
        'assign_driver_date' => 'string',
        'total_payment' => 'string',
        'incity_or_out_city' => 'string',
        'status' => 'string',
        'picture_befor_start' => 'string',
        'picture_befor_end' => 'string',


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pickup_drop_or_temp' => 'required',
        'incity_or_out_city' => 'required',
        'live_or_advance' => 'required',
        'start_late' => 'required',
        'start_long' => 'required',
        'destination_late' => 'required',
        'destination_long' => 'required',
        'start_or_pickup_date' => 'required',
        'start_or_pickup_time' => 'required',
        'end_or_drop_date' => 'required',
        'end_or_drop_time' => 'required',
        'assign_driver_date' => 'required',
        'total_payment' => 'required',
        'status' => 'required',
        'picture_befor_start' => 'required',
        'picture_befor_end' => 'required',

    ];


    public function customer()
    {
        return $this->belongsTo(\App\Models\User::class,  'customer_id');
    }

    public function driver()
    {
        return $this->belongsTo(\App\Models\User::class,  'driver_id');
    }

    public function customer_book()
    {
        return $this->belongsTo(\App\Models\User::class, 'customer_id');
    }


}
