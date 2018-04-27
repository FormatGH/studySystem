<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		<div class="headL">
            <?php
            use app\studySystem\controller\Index;
            $user=unserialize($_SESSION['myuser']);


            $uid=$_SESSION['uid'];
            $c=new Index();
            $data=$c->getUserData($uid);
            $dataresult=$data['result'];
            if($dataresult){
                $imagename=$data['data']['photo']==""?"init.png":$data['data']['photo'];
            }else{
                $imagename="init.png";
            }
            $imagename="/static/studySystem/img/upload/" . $imagename;
            $username=$user->uname;
            ?>
			<img class="headLogo" name="photo"  id="photo" src="{$imagename}"/>
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