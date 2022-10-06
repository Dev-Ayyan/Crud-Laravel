<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable=[
        'name',
        'nationality',
        'iso2',
        'iso3',
        'code',
    ];
    protected $guarded  = ['id'];
    protected $searchableColumns = ['name'];
}
