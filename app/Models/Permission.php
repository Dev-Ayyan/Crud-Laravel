<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permissions';

    public $fillable = [
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];



    /**
     * Return Validation rules
     *
     * @return array
     */
    public static function rules($id = 0, $merge = [])
    {
        return array_merge(
            [
                'name' => 'required',
            ],
            $merge);
    }
}
