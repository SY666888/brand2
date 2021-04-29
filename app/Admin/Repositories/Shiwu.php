<?php

namespace App\Admin\Repositories;

use App\Models\Shiwu as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Shiwu extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
