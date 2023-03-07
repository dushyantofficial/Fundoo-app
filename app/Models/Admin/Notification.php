<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public $table = 'notifications';

    public $fillable = [
        'user_id',
        'title',
        'body',
        'read_at',
        'type',
        'type_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'body' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */


    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookingNotification()
    {
        return $this->belongsTo(Booking::class, 'type_id');
    }

}


