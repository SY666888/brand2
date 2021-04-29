<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AnxjmNew extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;
 
    protected $table = 'anxjm_news';
	protected $fillable = ['untype','state','brand_userid'];
	 public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    
}
