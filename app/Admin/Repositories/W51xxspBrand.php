<?php

namespace App\Admin\Repositories;
use App\Models\W51xxspBrand as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class W51xxspBrand extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
    public static function get_users()
    {
        $options = \DB::table('brands')->select('type')->distinct()->get();
        //$options = Model::where('type','餐饮')->get();
        $selectOption = [];
        foreach ($options as $option){
            $selectOption[trim($option->type)]=trim($option->type);
        }
        return $selectOption;
    }
}
