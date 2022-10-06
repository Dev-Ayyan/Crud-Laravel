<?php

namespace App\Repositories;

use App\Models\Developer;
use InfyOm\Generator\Common\BaseRepository;

class DeveloperRepository extends BaseRepository
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
        return Developer::class;
    }
}
