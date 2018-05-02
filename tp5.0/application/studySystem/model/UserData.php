<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28
 * Time: 9:44
 */

namespace app\studySystem\model;
use think\Model;
use think\Db;
use think\Request;
header('Content-type:text/html;charset=utf-8');

class UserData extends Model
{
//    var $uid;
//    var $realname;
//    var $email;
//    var $message;
//    var $photo;
//
//    function __construct($uid, $realname, $email, $message,$photo)
//    {
//        $this->uid = $uid;
//        $this->realname = $realname;
//        $this->email = $email;
//        $this->message = $message;
//        $this->photo=$photo;
//
//    }

    /*
     * 获取用户的基本资料
     */
    public function getUserData($uid)
    {
        $result=Db::query('select * from userdata where uid = "' .$uid  . '"');
       if($result){
           return $result['0'];
       }else{
           return $result;
       }
    }

    public function getUserData2()
    {
        $result=Db::query('select * from userdata');
        if($result){
            return array("result"=>true,"data"=>$result);
        }else{
            return array("result"=>false);
        }
    }

    /*
    * 更新头像路径
    */
    public function updatePhoto($uid,$filename)
    {
        $result=Db::query('select * from userdata where uid = "' .$uid  . '"');
        if($result){
            $result=Db::execute('update userdata set photo="' . $filename .'" where uid="' . $uid . '"');
        }else{
            $result=Db::execute('insert into userdata(uid,photo) values("' . $uid . '",'  . '"' . $filename . '")');
        }
//
////        echo json_encode(array(
////            'result' => 'ok',
////            'endstr'=>$filename,
////            'uid'=>$uid,
////        ));
    }

    /*
     * 更新用户姓名
     */
    public function updateRealname($uid,$realname)
    {
        $result=Db::query('select * from userdata where uid = "' .$uid  . '"');
        if($result){
            $result=Db::execute('update userdata set realname="' . $realname .'" where uid="' . $uid . '"');
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            $result=Db::execute('insert into userdata(uid,realname) values("' . $uid . '",'  . '"' . $realname . '")');
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

    /*
     * 更新用户邮箱
     */
    public function updateEmail($uid,$email)
    {
        $result=Db::query('select * from userdata where uid = "' .$uid  . '"');
        if($result){
            $result=Db::execute('update userdata set email="' . $email .'" where uid="' . $uid . '"');
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            $result=Db::execute('insert into userdata(uid,email) values("' . $uid . '",'  . '"' . $email . '")');
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

    /*
    * 更新个人简介
    */
    public function updateMessage($uid,$message)
    {
        $result=Db::query('select * from userdata where uid = "' .$uid  . '"');
        if($result){
            $result=Db::execute('update userdata set message="' . $message .'" where uid="' . $uid . '"');
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            $result=Db::execute('insert into userdata(uid,message) values("' . $uid . '",'  . '"' . $message . '")');
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

    /*
* 更新个人简介
*/
    public function updateAcademy($uid,$realname,$number,$academy)
    {
        $result=Db::query('select * from userdata where uid = "' .$uid  . '"');
        if($result){
            $result=Db::execute('update userdata set realname="' . $realname .'",number="' . $number . '",academy="' . $academy .  '" where uid="' . $uid . '"');
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            $result=Db::execute('insert into userdata(uid,realname,number,academy) values("' . $uid . '","' . $realname .   '","' . $number .  '","'  . $academy . '")');
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }

}
