<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Homeblock extends Model
{

    public $table = 'homeblocks';
    


    public $fillable = [
        'heading',
        'sub_heading',
        'img',
        'description',
        'btn_label',
        'btn_link',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'heading' => 'string',
        'sub_heading' => 'string',
        'img' => 'string',
        'description' => 'string',
        'btn_label' => 'string',
        'btn_link' => 'string',
        'position' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'heading' => 'required',
        'sub_heading' => 'required'
    ];
}
