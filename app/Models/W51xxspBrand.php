<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class W51xxspBrand extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = '51xxsp_brands';
    protected $fillable = ['untype','state','brand_userid'];
    //设置禁止写入的字段
    //protected $guarded = [];
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

}
