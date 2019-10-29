<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next)
    {
    	//判断session中用户名是否存在
    	if(empty(session('uname'))){
    		return redirect('/login');
    	}
    	return $next($request);
    }
}
