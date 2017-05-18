<?php

namespace App\Repositories;

use App\Models\Yyyyyy;
use InfyOm\Generator\Common\BaseRepository;

class YyyyyyRepository extends BaseRepository
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
        return Yyyyyy::class;
    }
}
