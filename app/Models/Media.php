<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Media extends Model
{
    use SoftDeletes;

    public $table = 'Medias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'path',
        'alt'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'path' => 'string',
        'alt' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
