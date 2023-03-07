<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Rating extends Model
{
    use HasFactory;

    use SoftDeletes;


    public $table = 'user_retings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'rated_to',
        'rated_by',
        'star',
        'coment',
        'status',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        // 'rated_to ' => 'integer',
        // 'rated_by' => 'integer',
        'star' => 'integer',
        'coment' => 'string',


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'star' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',

    ];


    public function rated_to_user()
    {
        return $this->belongsTo(\App\Models\User::class,  'rated_to');
    }

    public function user_rating()
    {
        return $this->belongsTo(\App\Models\User::class, 'rated_by');
    }

}
