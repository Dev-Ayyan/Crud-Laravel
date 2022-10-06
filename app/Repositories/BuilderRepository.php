<?php

namespace App\Repositories;

use App\Models\Builder;
use InfyOm\Generator\Common\BaseRepository;

class BuilderRepository extends BaseRepository
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
        return Builder::class;
    }
}
