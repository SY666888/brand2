<?php

namespace App\Admin\Repositories;

use App\Models\AnxjmBrand as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AnxjmBrand extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
