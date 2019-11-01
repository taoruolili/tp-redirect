<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\DB;

class SkuController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取数据
        $data = DB::table('sku_redirect')->select();
        //显示sku对应url
        return view('skuredirect/index',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //显示添加页面
        return view('skuredirect/add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //添加到数据库
        $res = DB::table('sku_redirect')->insert($request->post());
        //判断返回结果
         if($res){
            //成功
            return '<script>alert("添加成功");location.href="/sku_index";</script>';
        }
            //失败
            return '<script>alert("添加失败");location.href="/sku_add";</script>';
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
        // 获取要修改的数据
        $data = DB::table('sku_redirect')->find($id);
        //显示修改页面
        return view('skuredirect/edit',['data'=>$data]);
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
        //接收要修改的数据
        $data = $request->post();
        //修改数据
        $res = DB::table('sku_redirect')->where('id',$id)->update($data);
        //判断返回结果
        if($res){
            //成功
            return '<script>alert("修改成功");location.href="/sku_index";</script>';
        }
            //失败
            return '<script>alert("修改失败");location.href="/sku_index";</script>';
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //删除数据
        $res = DB::table('sku_redirect')->delete($_GET['id']);
        //判断
        if($res){
            //成功
            return json_encode(['code'=>'1']);
        }
            //失败
            return json_encode(['code'=>'0']);

    }
}
