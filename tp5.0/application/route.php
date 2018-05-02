<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    //全局变量定义
    '__pattern__' => [
        'name' => '\w+',//name为多字母类型
        'id'   => '\d{4}',//id为4位数字的类型
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'a/:name' => 'index/Index/hello',
    'myHello2/[:name]/[:city]' => 'test/MyIndex/myHello2',
    'getConn' => 'test/MysqlDB/getConn',
    //'testMysql' => 'test/MyIndex/testMysql',
    'login' => 'test/Mysqldb/login',
    'register' => 'test/Mysqldb/register',
    'verfiy' => 'test/Mysqldb/verfiy',
    'useradd' => 'test/Mysqldb/addUser',
    'myindex' => 'test/Mysqldb/myIndex',
    'add/:name/:status' => 'test/Testdb/add',
    'update/:name/:status' => 'test/Testdb/update',
    'readall' => 'test/Testdb/readAll',
    'studySystem/index' => 'studySystem/Index/index',
    'studySystem/userHome' => 'studySystem/Index/userHome',
    'studySystem/login' => 'studySystem/Index/login',
    'studySystem/logout' => 'studySystem/Index/logout',
    'studySystem/checklogin' => 'studySystem/Index/checklogin',
    'studySystem/register' => 'studySystem/Index/register',
    'studySystem/adduser' => 'studySystem/Index/adduser',
    'studySystem/userHomeHead' => 'studySystem/Index/userHomeHead',
    'studySystem/lookBasicData'=>'studySystem/Index/lookBasicData',
    'studySystem/editBasicData'=>'studySystem/Index/editBasicData',
    'studySystem/updateRealname'=>'studySystem/Index/updateRealname',
    'studySystem/updateEmail'=>'studySystem/Index/updateEmail',
    'studySystem/updateMessage'=>'studySystem/Index/updateMessage',
    'studySystem/updateUserData'=>'studySystem/Index/updateUserData',
    'studySystem/uploadUserPhoto'=>'studySystem/Index/uploadUserPhoto',
    'studySystem/lookUserAcademy'=>'studySystem/Index/lookUserAcademy',
    'studySystem/editUserAcademy'=>'studySystem/Index/editUserAcademy',
    'studySystem/updateUserAcademy'=>'studySystem/Index/updateUserAcademy',
    'studySystem/uploadFileForm'=>'studySystem/Index/uploadFileForm',
    'studySystem/uploadFile2'=>'studySystem/Index/uploadFile2',
    'studySystem/addCourseForm'=>'studySystem/Index/addCourseForm',
    'studySystem/addCourse'=>'studySystem/Index/addCourse',
    'studySystem/lookTCourse'=>'studySystem/Index/lookTCourse',
    'studySystem/lookTCourseFile'=>'studySystem/Index/lookTCourseFile',
    'studySystem/lookTCourseVideo'=>'studySystem/Index/lookTCourseVideo',
    'studySystem/lookCourseMsg'=>'studySystem/Index/lookCourseMsg',
    'studySystem/searchCourseForm'=>'studySystem/Index/searchCourseForm',
    'studySystem/searchCourse'=>'studySystem/Index/searchCourse',
    'studySystem/addSCourse'=>'studySystem/Index/addSCourse',
    'studySystem/lookSCourse'=>'studySystem/Index/lookSCourse',
    'studySystem/studyCourse'=>'studySystem/Index/studyCourse',
    'studySystem/sGetSection'=>'studySystem/Index/sGetSection',
    'studySystem/studyVideo'=>'studySystem/Index/studyVideo',
    'studySystem/studyFile'=>'studySystem/Index/studyFile',
    'studySystem/studyCourseMsg'=>'studySystem/Index/studyCourseMsg',
    'studySystem/test'=>'studySystem/Index/test',
    'csrf'=>'test/Mysqldb/csrf',
    'tab' => 'test/Admin/tab',
    'testSession' => 'test/Mysqldb/testSession',
    'captchas' => 'test/Captcha/index',
    'uploads' => 'test/Uploads/index',

    'game/getServerList' => 'game/Index/getServerList',
    'test2' => 'studySystem/Index/getUserData2'


];
