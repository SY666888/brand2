<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnxjmBrand;
use App\Models\Brand;


class TestController extends Controller
{
    public function  test()
    {
    $brand=Brand::where([['id','>',3],['id','<=',10],['type','小吃']])->take(3)->get();
	foreach ($brand as $val)
	{
		echo  $val->brandname;
		
	}
 return view('test',compact('brand'));
    }



}
