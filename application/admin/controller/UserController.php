<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
// use app\admin\model\Userinfo;
use DB;
class UserController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        //获取总数据
        $res = DB::table('visitor_info')->select();
        //统计
        $day_count = count($res);
        // $data = array();
 
        // // 循环遍历对象，对数组赋值
        // foreach ($res as $key => $value) {
        //     $data[$key] = $value;
        // }    
        var_dump($day_count);
        //显示用户统计
        // return view('user/index',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
