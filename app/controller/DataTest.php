<?php

namespace app\controller;
use think\facade\Db;
use app\model\user;
use think\Db as ThinkDb;

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

    public function insert()
    {

        $data=[

            'username'=>'wxf',
            'password'=>'1234565',
            'gender'  =>'男',
            'email' => 'huiye@163.com',
            'price' => 90, 
            'details' => '123',
            // 'abd'     => 'yyyu'
       
   
    ];

        // return Db::name('user')->strict(false)->insert($data);
        // Db::name('user')->replace()->insert($data);
        // return Db::getlastsql();
        // return Db::name('user')->insertGetId($data);
         return Db::name('user')->save($data);
    }

    public function insert2()
    {

        $dataAll=[[

            'username'=>'wxf',
            'password'=>'1234565',
            'gender'  =>'男',
            'email' => 'huiye@163.com',
            'price' => 90, 
            'details' => '123',
            // 'abd'     => 'yyyu'
        ],
        [ 
            'username' => '辉夜', 
            'password' => '123', 
            'gender' => '女', 
            'email' => 'huiye@163.com', 
            'price' => 90, 
            'details' => '123' 
            ]
    ];

        // return Db::name('user')->insertAll($dataAll);
        // return Db::name('user')->replace()->insertAll($dataAll);
       
    }

    public function update()
    {
        // $data=[
        //     'username'    =>'wxf',
        // ];

        // return Db::name('user')->where('id',308)->update($data);
        $data=[
                'id'          =>308,
                'username'    =>'李白'
                
             ];
    
            //  return Db::name('user')->update($data);

            // Db::name('user')->where('id',308)
            //                 ->update([
            //                     'email'     =>   Db::raw('upper(email)'),
            //                     'price'     =>   Db::raw('price+1'),
            //                     'status'    =>   Db::raw('status-2')
            //                 ]);

            // return Db::name('user')->where('id',308)->save(['username' =>  '李黑']);
           return Db::name('user')->fetchSql(true)->select();

    }


    public function select_l()
    {
        // $user=Db::name('user')->where(
        //     [
        //         'gender'    =>    '男',
        //         'price'     =>    100
        //     ]
        // )->select();


        // $user=Db::name('user')->field('id,username,password')->select();
        // $user=Db::name('user')->field('id,username as name')->select();
        // $user=Db::name('user')->fieldRaw('id,SUM(price)')->select();
        // return Db::name('user')->fieldRaw('id,SUM(price) as s')->select();
        // return json($user) ;

    //    return Db::name('user')->alias('a')->select();

            return Db::name('user')->fieldRaw('gender, SUM(price)') ->group('gender')->select();
    }
}