<?php
namespace app\test\controller;


use think\Db;
use app\studySystem\model\User;


class Mysqldb
{
    use \traits\controller\Jump;

    public function getConn(){
        $user = new User;

        $conn=$user->getConnection();
        $conn->setConfig('type ','mysql');
        $conn->setConfig('hostname','localhost');
        $conn->setConfig('database','test');
        $conn->setConfig('username','root');
        $conn->setConfig('password','root');
        $conn->setConfig('hostport','3306');
        return $conn;
    }

    public function add2(){
        $user = new User;
        $conn=$user->getConnection();
        $conn->execute('insert into user values(?,?,?)',["","test","aa"]);
    }


    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function myIndex(){
        return view('index');
    }

    public function addUser(){
        $user=new User;
        $username=input('username');
        $password=input('password');
        //var_dump($password);
        $result=$user->register($username,$password);
        if($result['status']==0){
            $this->error($result['message']);
        }else{
            $this->success($result['message'],url('/login'));
        }
    }


    public function verfiy(){
        $user=new User;
        $data=input('post.');
        $name=input('username');
        $password=input('password');
        //var_dump($data);
        $result=$user->login($name,$password);
        if($result['status']==0){
            $this->success($result['message'],url('/myindex'),'','3');
        }elseif($result['status']==1){
            $this->error($result['message']);
        }else{
            $this->error($result['message'],url('/register'));
        }
    }
}
?>


