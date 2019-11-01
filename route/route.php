<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });

// Route::get('hello/:name', 'index/hello');

// return [

// ];
//显示后台登录页
Route::rule('login','admin/LoginController/index');
//执行后台登录
Route::rule('admin_login','admin/LoginController/dologin');
//后台退出登录
Route::rule('logout','admin/LoginController/logout');
//显示后台首页
Route::rule('admin_index','admin/IndexController/index')->middleware('check');
//显示用户统计列表
Route::rule('user_index','admin/UserController/index')->middleware('check');

//显示sku对应url页面
Route::rule('sku_index','admin/SkuController/index')->middleware('check');
//显示添加sku对应url页面
Route::rule('sku_add','admin/SkuController/create')->middleware('check');
//执行添加sku对应url
Route::rule('sku_doadd','admin/SkuController/save')->middleware('check');
//显示修改sku对应url页面
Route::rule('sku_edit/:id','admin/SkuController/edit')->middleware('check');
//执行修改sku
Route::rule('sku_update/:id','admin/SkuController/update')->middleware('check');
//删除sku
Route::rule('sku_delete/:id','admin/SkuController/delete')->middleware('check');

//显示推广站对应下单站域名列表
Route::rule('exandor_index','admin/ExandorController/index')->middleware('check');
//显示添加推广站对应下单站域名页面
Route::rule('exandor_add','admin/ExandorController/create')->middleware('check');
//执行添加推广站对应下单站域名
Route::rule('exandor_doadd','admin/ExandorController/save')->middleware('check');
//显示修改推广站对应下单站域名页面
Route::rule('exandor_edit/:id','admin/ExandorController/edit')->middleware('check');
//执行修改推广站对应下单站域名
Route::rule('exandor_update/:id','admin/ExandorController/update')->middleware('check');
//删除推广站对应下单站域名
Route::rule('exandor_delete/:id','admin/ExandorController/delete')->middleware('check');

//前台
Route::rule('/','home/IndexController/index');

