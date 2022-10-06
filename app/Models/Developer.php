<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Developer extends Model
{

    public $table = 'developers';
    


    public $fillable = [
        'name',
        'email',
        'age',
        'job',
        'archived',
        'is_featured',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'age' => 'string',
        'job' => 'string',
        'archived' => 'boolean',
        'is_featured' => 'boolean',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
