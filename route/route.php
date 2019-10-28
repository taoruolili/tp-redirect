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
Route::rule('admin_login.php','admin/LoginController/dologin');
//显示后台首页
Route::rule('admin','admin/IndexController/index');



//前台
Route::rule('/','home/IndexController/index');

