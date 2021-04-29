<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;
    public function anxjmbrand()
    {
        return $this->hasOne(AnxjmBrand::class,'brand_id');
    }
	public function anxjmnew()
    {
        return $this->hasOne(AnxjmNew::class,'brand_id');
    }
	
    }
