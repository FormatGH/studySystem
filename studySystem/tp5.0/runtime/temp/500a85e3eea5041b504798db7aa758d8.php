<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\phpStudy\PHPTutorial\WWW\tp5.0\public/../application/test\view\mysqldb\csrf.php";i:1519696819;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form display="none" action="http://localhost/verfiy" method="post" >
    <input type="hidden" name="username" value="20">
    <input type="hidden" name="__token__" value="3ae7bc845cf888f7d93c6f0c1b6a3465">
    <button type="submit">提交</button>
</form>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 18:04
 */
echo "<a href='/verfiy'>xx</a>";