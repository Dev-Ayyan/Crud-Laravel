<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Page extends Model
{

    public $table = 'pages';
    


    public $fillable = [
        'heading',
        'sub_heading',
        'banner_id',
        'meta_title',
        'meta_description',
        'thumbnail',
        'schema',
        'type',
        'description',
        'slug',
        'tagline'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'heading' => 'string',
        'sub_heading' => 'string',
        'banner_id' => 'integer',
        'meta_title' => 'string',
        'meta_description' => 'string',
        'thumbnail' => 'string',
        'schema' => 'string',
        'type' => 'string',
        'description' => 'string',
        'slug' => 'string',
        'tagline' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'heading' => 'required',
        'type' => 'required',
        
    ];

    public function banner()
    {
        return $this->belongsTo('App\Models\Banner');
    }
    /**
     * Get the categories for the page.
     */
    public function categories()
    {
        return $this->hasMany('App\Models\Category')->where('id' ,'!=' ,'0')->orderby('title','asc');
    }
}
