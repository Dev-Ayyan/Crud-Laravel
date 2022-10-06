<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Counterstat extends Model
{

    public $table = 'counterstats';
    


    public $fillable = [
        'heading',
        'sub_heading',
        'box1_title',
        'box1_number',
        'box1_type',
        'box2_title',
        'box2_number',
        'box2_type',
        'box3_title',
        'box3_number',
        'box3_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'heading' => 'string',
        'sub_heading' => 'string',
        'box1_title' => 'string',
        'box1_number' => 'string',
        'box1_type' => 'string',
        'box2_title' => 'string',
        'box2_number' => 'string',
        'box2_type' => 'string',
        'box3_title' => 'string',
        'box3_number' => 'string',
        'box3_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'heading' => 'required',
        'sub_heading' => 'required',
        'box1_title' => 'required',
        'box1_number' => 'required',
        'box1_type' => 'required',
        'box2_title' => 'required',
        'box2_number' => 'required',
        'box2_type' => 'required',
        'box3_title' => 'required',
        'box3_number' => 'required',
        'box3_type' => 'required'
    ];
}
