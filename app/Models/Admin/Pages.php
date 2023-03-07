<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Pages
 * @package App\Models\Admin
 * @version June 23, 2022, 11:05 am UTC
 *
 * @property string $page_title
 * @property string $description
 * @property integer $status
 */
class Pages extends Model
{
    use SoftDeletes;


    public $table = 'pages';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'page_title',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page_title' => 'string',
        'description' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'page_title' => 'Required',
        'description' => 'Required'
    ];


}
