<?php

namespace App\Repositories;

use App\Models\Footer;
use InfyOm\Generator\Common\BaseRepository;

class FooterRepository extends BaseRepository
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
        return Footer::class;
    }
}
