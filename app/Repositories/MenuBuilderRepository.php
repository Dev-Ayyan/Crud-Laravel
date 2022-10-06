<?php

namespace App\Repositories;

use App\Models\MenuBuilder;
use InfyOm\Generator\Common\BaseRepository;

class MenuBuilderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MenuBuilder::class;
    }
}
