<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Help_Line extends Model
{
    use HasFactory;


    use SoftDeletes;


    public $table = 'help__lines';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'reason',
        'nots',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'reason' => 'string',
        'nots' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reason' => 'required',
        'nots' => 'required',
    ];

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class,  'user_id');
    }


}


