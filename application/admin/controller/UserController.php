<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Userinfo;
use think\DB;
class UserController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        //获取当天数据
        $dayAll = DB::table('visitor_info')->where('to_days(created_at) = to_days(now())')->select();
        //如果当天数据为空说明没有访问信息
        if (empty($dayAll)) {
            $res1[0]['user'] = 0;
            $res1[0]['pachong'] = 0;
        } else {
            //处理当天访问数据
            $res1 = getUBvalue($dayAll);
        }
        //查询visitor_info数据表中所有数据
        $all = DB::table('visitor_info')->select();
        //处理总访问数据
        $res = getUBvalue($all);
        //将当天数据和总数据放入一个数组 $res中
        foreach ($res1 as $k => $v) {
            foreach ($res as $key => $value) {
                if ($k == $key) {
                    if (isset($v['user'])) {
                        $res[$key]['day_user'] = $v['user'];
                    } else {
                        $res[$key]['day_user'] = 0;
                    }
                    if (isset($v['pachong'])) {
                        $res[$key]['day_pachong'] = $v['pachong'];
                    } else {
                        $res[$key]['day_pachong'] = 0;
                    }
                }
            }
        }  
        // 显示用户统计
        return view('user/index',['data'=>$res]);
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
