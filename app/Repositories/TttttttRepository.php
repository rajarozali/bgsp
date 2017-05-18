<?php

namespace App\Repositories;

use App\Models\Ttttttt;
use InfyOm\Generator\Common\BaseRepository;

class TttttttRepository extends BaseRepository
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
        return Ttttttt::class;
    }
}
