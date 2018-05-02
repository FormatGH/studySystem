<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/19
 * Time: 17:39
 */

namespace app\studySystem\model;
use think\Model;
use think\Db;

class SCourse extends Model
{

    public function addSCourse($sid,$cid)
    {

        $result=Db::execute('insert into scourse(sid,cid) values("' . $sid  . '","' . $cid . '")');
//        if($result){
//            return true;
//        }else{
//            return false;
//        }

    }

    public function getSCourse($sid)
    {

        $result=Db::query('select realname,course.* from course,userdata where cid in (select cid from scourse where sid = "' . $sid .'") and tid=userdata.uid');
        if($result){
            return array('status'=>true,'data'=>$result);
        }else{
            return array('status'=>false,'data'=>"未选课");
        }

    }



}