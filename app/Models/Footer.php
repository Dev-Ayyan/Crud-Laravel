<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Footer extends Model
{

    public $table = 'footers';
    


    public $fillable = [
        'copyrights',
        'contact_area',
        'cta_form_heading',
        'cta_form_subheading',
        'cta_form_bg',
        'cart_field_placeholder',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'maps'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'copyrights' => 'string',       
        'contact_area' => 'string',
        'cta_form_heading' => 'string',
        'cta_form_subheading' => 'string',
        'cta_form_bg' => 'string',
        'cart_field_placeholder' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'twitter' => 'string',
        'linkedin' => 'string',
        'youtube' => 'string',
        'maps' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'copyrights' => 'required',
       
        'cta_form_heading' => 'required',
    ];
}
