<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Language extends Model
{

    public $table = 'languages';
    


    public $fillable = [
        'lang_name',
        'archived',
        'is_featured'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'lang_name' => 'string',
        'archived' => 'boolean',
        'is_featured' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
