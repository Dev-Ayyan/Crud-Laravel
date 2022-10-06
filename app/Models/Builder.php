<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    use Sluggable;

    public $table = 'menu_items';

    public $fillable = [
        'menu_id',
        'title',
        'slug',
        'url',
        'target',
        'icon_class',
        'color',
        'parent_id',
        'route',
        'order',
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
//                 'title' => 'required',
//                 'url' => 'required',
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
                'source' => 'title'
            ]
        ];
    }

    //each category might have one parent
    public function parent() {
        return $this->belongsToOne(static::class, 'parent_id');
    }

    //each category might have multiple children
    // public function children() {
    public function childs() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('order', 'asc');
    }

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    // public function childs() {
    //     return $this->hasMany('App\Models\Builder','parent_id','id') ;
    // }

    public function menu()
    {
        return $this->belongsTo('App\Models\MenuBuilder');
    }

}
