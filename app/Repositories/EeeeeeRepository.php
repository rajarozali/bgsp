<?php

namespace App\Repositories;

use App\Models\Eeeeee;
use InfyOm\Generator\Common\BaseRepository;

class EeeeeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'field0'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Eeeeee::class;
    }
}
