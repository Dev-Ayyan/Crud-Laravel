<?php

namespace App\Repositories;

use App\Models\Media;
use InfyOm\Generator\Common\BaseRepository;

class MediaRepository extends BaseRepository
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
        return Media::class;
    }
}
