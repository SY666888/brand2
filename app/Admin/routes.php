<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->any('/quchong', 'YijianQuchongController@index');
    //网站配置
    $router->resource('admin_users','AdminUserController');// 修改用户管理/auth/users
    $router->get('/settings', 'SettingsController@index')->name('settings.index');
    $router->resource('brand','brandController');
    $router->resource('brand_get','BrandGetController');//安心品牌获取
    $router->resource('brand_get_51xxsp','BrandGet51xxspControlle');//51品牌获取
    $router->resource('anxjm_brand','AnxjmBrandController');
	$router->resource('anxjm_news','AnxjmNewsController');
    $router->resource('anxjm','AnxjmPaiziController');
    $router->resource('w51xxsp_brand','W51xxspBrandController');
    $router->resource('w51xxsp','W51xxspPaiziControlle');
	$router->resource('lc','LiuchengkuControlle');
	$router->resource('lcdo','LiuchengDoControlle');
	$router->resource('shiwu','ShiwuController');
	$router->resource('specific_tasks','TeshuBrandController');
	$router->resource('specific_tasksdo','TeshuBrandDoController');



});
