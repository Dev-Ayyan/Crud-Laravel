<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Infobox extends Model
{
    use SoftDeletes;

    public $table = 'infoboxs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'category_id',
        'title',
        'subtitle',
        'description',
        'icon',
        'sample',
        'price',
        'type',
        'status',
        'add_to_menu',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'title' => 'string',
        'subtitle' => 'string',
        'description' => 'string',
        'icon' => 'string',
        'sample' => 'string',
        'type' => 'string',
        'status' => 'string',
        'add_to_menu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required'
    ];
}
