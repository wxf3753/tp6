<?php

namespace app\controller;
use think\facade\Db;
use app\model\user;
use think\Db as ThinkDb;
use think\db\Where;

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
        $cursor=Db::name('user')->cursor();

        foreach ($cursor as $k) {
            dump($k);
        }
        echo 1;
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