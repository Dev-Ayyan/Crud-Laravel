<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Banner extends Model
{

    public $table = 'banners';
    


    public $fillable = [
        'name',
        'heading',
        'heading_color',
        'heading_fontsize',
        'description',
        'description_color',
        'description_fontsize',
        'type',
        'source',
        'btn1_label',
        'btn1_link',
        'btn1_target',
        'btn1_type',
        'btn2_label',
        'btn2_link',
        'btn2_target',
        'btn2_type',
        'position',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'heading' => 'string',
        'heading_color' => 'string',
        'heading_fontsize' => 'string',
        'description' => 'string',
        'description_color' => 'string',
        'description_fontsize' => 'string',
        'type' => 'string',
        'source' => 'string',
        'btn1_label' => 'string',
        'btn1_link' => 'string',
        'btn1_target' => 'string',
        'btn1_type' => 'string',
        'btn2_label' => 'string',
        'btn2_link' => 'string',
        'btn2_target' => 'string',
        'btn2_type' => 'string',
        'position' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

}
