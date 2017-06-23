<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//匹配get方式
//Route::get('home\index\index', 'Home\IndexController@index');
//匹配POST方式
//Route::post('abc', 'Home\IndexController@index');
//匹配多个响应方式
//Route::match(['get,post'],'abc', 'Home\IndexController@index');

//前台首页路由--首页
Route::get('/','Home\IndexController@index');
//前台学员登录
Route::get('home/student/login','Home\StudentController@login');
//后台管理员登录
Route::get('admin/manager/login','Admin\ManagerController@login');
//管理员展示
Route::get('admin/manager/showlist','Admin\ManagerController@showlist');
//添加管理员
Route::match(['get','post'],'admin/manager/adduser','Admin\ManagerController@adduser');
//修改管理员
Route::match(['get','post'],'admin/manager/updateuser/{manager}','Admin\ManagerController@updateuser');
//后台管理员删除
Route::post('admin/manager/deluser/{manager}','Admin\ManagerController@deluser');



//后台首页路由
Route::get('admin/index/index','Admin\IndexController@index');
Route::get('admin/index/welcome','Admin\IndexController@welcome');






