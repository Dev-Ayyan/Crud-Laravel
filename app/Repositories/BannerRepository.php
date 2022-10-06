<?php

namespace App\Repositories;

use App\Models\Banner;
use InfyOm\Generator\Common\BaseRepository;

class BannerRepository extends BaseRepository
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
        return Banner::class;
    }
}
