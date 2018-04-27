<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"E:\phpStudy\PHPTutorial\WWW\tp5.0\public/../application/test\view\mysqldb\index.php";i:1519694717;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if(isset($_SESSION['token'])){
   echo "欢迎~！" ;
}else{
    echo "未登录.";
}
?>
</body>
</html>