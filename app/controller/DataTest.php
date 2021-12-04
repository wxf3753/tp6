<?php

namespace app\controller;
use think\facade\Db;
use app\model\user;


class DataTest
{

    public function index()
    {
       // $user=Db::connect('mysql')->table('tp_user')->select();
       //$user=Db::table('tp_user')->Where('id',1)->find();
       //$user=Db::table('tp_user')->Where('id',1)->findOrFail();
       //$user=Db::table('tp_user')->Where('id',1)->findOrEmpty();
       //$user=Db::table('tp_user')->select();
       //$user=Db::table('tp_user')->select()->toArray();
       //$user=Db::name('user')->select();
       //dump($user);
       //return Db::getlastSql();

        //$user=Db::table('tp_user')->where('id',27)->value('username');
        //$user=Db::name('user')->column('username','id');
        //return json($user);

    //     Db::name('user')->chunk(3,function($users)
    //     {
    //         foreach($users as $a)
    //         {
    //             dump($a);
    //         }
    //         echo 1;
    //     }
        
        
    // );


    //游标
        // $cursor=Db::name('user')->cursor();

        // foreach ($cursor as $k) {
        //     dump($k);
        // }
        // echo 1;

        // $df=Db::name('user')->where('id',27)->select();
        // dump($df);

        $useerQuery=Db::name('user');
        // $dataFind=$useerQuery->where('id',27)->find();
        $data1=$useerQuery->order('id','desc')->select();
        
        $data2=$useerQuery->select();
        $useerQuery->removeOption('order')->select();
        return Db::getlastsql();
        //return  json($dataFind);
    }


    public function demo()
    {
        $user=Db::connect('demo')->table('tp_user')->select();
    
        return json($user);
    }

    public function getUser()
    {
        $user=User::select();
        return json($user);
    }
}