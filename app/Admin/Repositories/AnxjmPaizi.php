<?php

namespace App\Admin\Repositories;

use App\Models\AnxjmPaizi as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AnxjmPaizi extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
