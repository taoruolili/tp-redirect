<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\User;

class LoginController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //显示登录页
        return view('login/login');
    }

    /**
     * 退出登录
     *
     * @return \think\Response
     */
    public function logout()
    {
        //清空session
        session('uname',null);
        // 跳转到登录页
        return '<script>location.href="login";</script>';die;
    }

    /**
     * 执行登录
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function dologin(Request $request)
    {
        //接收用户名和密码
        $data = $request->post();
        $uname = $data['uname'];
        $upass = $data['upass'];
        //判断用户名和密码是否为空
        if(empty($uname) || empty($upass)){
            echo '<script>alert("用户名或密码不能为空!");location.href="login";</script>';die;
            }
            //用传入的uname去数据库查询有没有此用户
            $res = User::where('uname', $uname)->find();
            //判断
            if(!empty($res)){
                //有此用户  判断密码
                if($upass != $res->upass){
                    echo '<script>alert("密码不正确!");location.href="login";</script>';die;
                }
            }else{
                //查不到此用户
                echo '<script>alert("用户名不正确!");location.href="login";</script>';die;
            }
            //给session存入一个标记，用作判断是否登录
            session('uname',$uname);
            // 跳转到首页
            echo '<script>alert("登录成功!");location.href="admin_index";</script>';die;
        }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
