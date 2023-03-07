<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory;

    use SoftDeletes;


    public $table = 'faqs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'answer',
        'question',
        'status'
    ];


    public static $rules = [
        'answer' => 'Required',
        'question' => 'Required',
    ];
}
