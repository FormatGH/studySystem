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

class Academy extends Model
{
    /*
     * 获取所有学院
     */
    public function getAcademy()
    {
        $result=Db::query('select * from academy');
       if($result){
           return $result;
       }else{
           return $result;
       }
    }



}
