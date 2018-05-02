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

class Course extends Model
{

    public function getCourse($tid,$coursename,$academy){
        $result=Db::query('select * from course where tid ="' .$tid  . '" and coursename="' . $coursename . '" and academy="' . $academy .'"');
        if($result){
            return array("result"=>true,"data"=>$result[0]);
        }else{
            return array("result"=>false);
        }
    }

    public function getCourseByCid($cid){
        $result=Db::query('select * from course where cid ="' .$cid  . '"');
        if($result){
            return array("result"=>true,"data"=>$result[0]);
        }else{
            return array("result"=>false);
        }
    }

    public function getSection($cid,$chapter){
        $result=Db::query('select * from coursemsg where cid ="' .$cid  . '" and chapter="' . $chapter .'" order by section desc');
        if($result){
            return array("result"=>true,"section"=>$result[0]['section']);
        }else{
            return array("result"=>false);
        }
    }

    public function addCourse($tid,$coursename,$academy,$chapter)
    {

        $result=Db::execute('insert into course(tid,coursename,academy,chapter) values("' . $tid  . '","' . $coursename . '","' . $academy . '","' . $chapter .'")');
        if($result){
            return true;
        }else{
            return false;
        }

    }


    public function getCourses($tid){
        $result=Db::query('select * from course where tid = "' .$tid  . '" order by tid asc');
        if($result){
            return array("result"=>true,"data"=>$result);
        }else{
            return array("result"=>false);
        }
    }

    public function getCid($tid,$coursename,$academy){
        $result=Db::query('select cid from course where tid ="' .$tid  . '" and coursename="' . $coursename . '" and academy="' . $academy .'"');
        if($result){
            return array("result"=>true,"cid"=>$result[0]['cid']);
        }else{
            return array("result"=>false);
        }
    }

    public function getCName($cid,$chapter){
        $result=Db::query('select cname from coursemsg where cid ="' . $cid  . '" and chapter="' . $chapter . '"');
        if($result){
            return array("result"=>true,"cname"=>$result[0]['cname']);
        }else{
            return array("result"=>false);
        }
    }

    public function getSName($cid,$chapter,$section){
        $result=Db::query('select sname from coursemsg where cid ="' . $cid  . '" and chapter="' . $chapter . '" and section="' . $section .'"');
        if($result){
            return array("result"=>true,"sname"=>$result[0]['sname']);
        }else{
            return array("result"=>false);
        }
    }

    public function addCourseMsg($cid,$chapter,$cname,$section,$sname)
    {

        $result=Db::execute('insert into coursemsg(cid,chapter,cname,section,sname) values("' . $cid  . '","' . $chapter . '","' . $cname . '","' . $section .  '","' . $sname .'")');
        if($result){
            return true;
        }else{
            return false;
        }

    }

    public function addCourseFile($cid,$chapter,$section,$filename,$filetype)
    {

        $result=Db::execute('insert into coursefile(cid,chapter,section,filename,filetype) values("' . $cid  . '","' . $chapter . '","' . $section . '","' . $filename .  '","' . $filetype .'")');
        if($result){
            return true;
        }else{
            return false;
        }

    }


    public  function getCourseFile($cid,$chapter,$section,$filetype){
        $result=Db::query('select * from coursefile where cid ="' . $cid  . '" and chapter="' . $chapter . '" and section="' . $section .'" and filetype="' . $filetype . '"');
        if($result){
            return $result[0];
        }else{
            return false;
        }
    }

    public function searchCourse($academy,$search,$value){
        if($value==""){
            return array('status'=>false,'result'=>"未搜索到相关课程");
        }
        if($search=='coursename'){
            $result=Db::query('select * from course where coursename like "%' .$value  . '%" and academy="' . $academy .'"');
            if($result){
                return array('status'=>true,'result'=>$result);
            }else{
                return array('status'=>false,'result'=>"未搜索到相关课程");
            }

        }elseif($search=='teacher'){
            $result=Db::query("select * from course where tid in(select uid from user,userdata where user.id=userdata.uid and usertype=1 and realname like". "'%" . $value . "%') and academy='" . $academy . "'");
            if($result){
                return array('status'=>true,'result'=>$result);
            }else{
                return array('status'=>false,'result'=>"未搜索到相关课程");
            }

        }
    }


}