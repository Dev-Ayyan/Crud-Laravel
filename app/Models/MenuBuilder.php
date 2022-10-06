<?php

namespace App\models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class MenuBuilder extends Model
{
    use Sluggable;

    public $table = 'menus';

    public $fillable = [
        'name',
        'description',
        'slug',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'type' => 'enum',
        // 'sort' => 'integer',
        // 'parent' => 'integer',
        // 'thumb' => 'string',
        // 'target' => 'enum',
        // 'href' => 'string'
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
                 'description' => 'required',
//                 'title' => 'required',
                // 'name_ar' => 'required',
                // 'type' => 'required',
                // 'target' => 'required',
            ],
            $merge);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function menu_items()
    {

        return $this->hasMany('App\Models\Builder','menu_id','id')->orderBy('order', 'asc');
    }

}
