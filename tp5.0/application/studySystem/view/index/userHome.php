<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
</head>

<?php
use app\studySystem\controller\Index;
$index=new Index();
$uid=$_SESSION['uid'];
//echo $uid;
$user=unserialize($_SESSION['myuser']);
$usertype=$user->utype;
if($usertype==1){
    $left='Tleft.html';
}elseif ($usertype==2){
    $left='Sleft.html';
}
//var_dump($user);
?>

<frameset rows="100,*" cols="*" scrolling="no" noresize="noresize" framespacing="0" frameborder="no" border="0">
    <frame src="/studySystem/userHomeHead" name="headmenu" scrolling="no"  framespacing="0" frameborder="no" border="0" id="mainFrame" title="mainFrame"><!-- 引用头部 -->
<!-- 引用左边和主体部分 -->
    <frameset rows="100*" cols="220,*" scrolling="No" framespacing="0" frameborder="no" border="0">
        <frame src="/static/studySystem/{$left}" name="leftmenu" id="mainFrame" title="mainFrame">
        <frame src="" name="main" scrolling="yes" noresize="noresize" id="rightFrame" title="rightFrame">
    </frameset>
</frameset>
</html>