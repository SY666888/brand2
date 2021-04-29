<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class AnxjmPaizi extends Model
{
	use HasDateTimeFormatter;
    //protected $table = 'anxjm_paizis';
    //没有指定的话，默认使用 mysql
    protected $table = 'anxjm_paizis';
     protected $guarded = [];


}
