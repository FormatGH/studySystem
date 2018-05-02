<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:107:"D:\PHPstudy\PHPTutorial\WWW\studySystem\tp5.0\public/../application/studysystem\view\index\userHomeHead.php";i:1524989777;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部</title>
<link rel="stylesheet" type="text/css" href="/static/studySystem/css/public.css" />
<script type="text/javascript" src="/static/studySystem/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/studySystem/js/public.js"></script>
</head>

<body>
	<!-- 头部 -->
	<div class="head">
		<div class="headL" style="text-align: left" >
            <?php
            use app\studySystem\controller\Index;
            $user=unserialize($_SESSION['myuser']);


            $uid=$_SESSION['uid'];
            $c=new Index();
            $data=$c->getUserData($uid);
            //$dataresult=$data['result'];
            if($data){
                $imagename=$data['photo']==""?"init.png":$data['photo'];
            }else{
                $imagename="init.png";
            }
            $imagename="/static/studySystem/img/upload/" . $imagename;
            $username=$user->uname;
            ?>
			<img class="headLogo" name="photo"  id="photo" src="<?php echo $imagename; ?>"/>
            <?php
            $user=unserialize($_SESSION['myuser']);
            echo $user->uname;
            if($user->utype==2){
                echo "同学";
            }else if($user->utype==1){
                echo "教师";
            }
            ?>
            <a href="/studySystem/logout"  target="_parent" > 【退出】</a>
		</div>
        <div style="font-family: KaiTi;font-size: x-large;font-weight: 900">
            <br>
            欢迎使用课程学习系统
        </div>
		<div class="headR">
			<span style="color:#FFF">欢迎：
                <?php
                    $user=unserialize($_SESSION['myuser']);
                    echo $user->uname;
                    if($user->utype==2){
                        echo "同学";
                    }else if($user->utype==1){
                        echo "教师";
                    }
                ?>
            </span>
            <a href="/studySystem/logout"  target="_parent" > 【退出】</a>
		</div>
	</div>
</body>
</html>