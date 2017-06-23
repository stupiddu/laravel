<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{

    public function login()
    {
        return view('admin/manager/login');
    }

    public function showlist()
    {
        //获取管理员列表
        //Manager::get();全部数据
        //Manager::first();获得一条数据
        //Manager::find(数字/数组); 根据主键为条件获得记录

//        $info =  Manager::select('mg_id','username')->get();
//        $info =  Manager::select('mg_id','username')->where('mg_id','>=',4)->get();
//        $info = Manager::select('mg_id','username')->where('mg_id','>=',2)->where('mg_phone','like','186%')->get();


        $info = Manager::get();
        return view('admin/manager/showlist',['info'=>$info]);
    }

    public function adduser(Request $request)
    {
        if($request->isMethod('post')){
            //收集数据，存储入库
            //var_dump($request -> all());
            //$shuju = $request -> except(['_token']);
            //① 添加方式
            //$obj = new Manager();
            //$obj -> username = $request->input('username');
            //$obj -> password = $request->input('password');
            //$obj -> mg_email = $request->input('mg_email');
            //...
            //$obj -> save();

            //② create()方法添加
            $shuju = $request->all();
            $shuju['password'] = bcrypt($shuju['password']);//加密处理
            if(Manager::create($shuju)){
                return ['success'=>true];  //array()  会返回json格式，自动json转化
            }else{
                return ['success'=>false];  //array()
                //return array('success'=>true);
            }
        }else{
            //展示添加管理员的表单效果
            return view('admin/manager/adduser');
        }
    }
    public function updateuser(Request $request,Manager $manager)
    {
        if($request->isMethod('post')){

            //② create()方法添加
            $shuju = $request->all();
            $rst = $manager->update($shuju);
            if($rst){
                return ['success'=>true];  //array()  会返回json格式，自动json转化
            }else{
                return ['success'=>false];  //array()
                //return array('success'=>true);
            }
        }
        //修改表单展示
        return view('admin/manager/updateuser',['manager'=>$manager]);
    }

    public function deluser(Manager $manager){
        if($manager->delete()){
            return ['success'=>true ];
        }else{
            return ['success'=>false ];
        }
    }
}
