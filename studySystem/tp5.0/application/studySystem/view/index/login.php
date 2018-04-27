<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/static/studySystem/css/public.css" />
<link rel="stylesheet" type="text/css" href="/static/studySystem/css/page.css" />
<script type="text/javascript" src="/static/studySystem/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/studySystem/js/public.js"></script>
<script src="/static/studySystem/js/md5.js" type="text/javascript"></script>
</head>
<body>

<style>
    .rdo {
        width: 0px;
        height: 0px;
        background-color: green;
        margin-right:25px;
        margin-left: 10pt;
        border-radius: 50%;
        position: relative;
    }
    .rdo:before,.rdo:after {
        content: '';
        display: block;
        position: absolute;
        border-radius: 50%;
        transition: .3s ease;
    }
    .rdo:before {
        top: -15px;
        left: 0px;
        width: 18px;
        height: 18px;
        background-color: #fff;
        border: 1px solid green;
    }
    .rdo:after {
        top: -12px;
        left: 6px;
        width: 8px;
        height: 8px;
        background-color: #fff;
    }
    .rdo:checked:after {
        top: -11px;
        left: 4px;
        width: 12px;
        height: 12px;
        background-color:green;
    }
    .rdo:checked:before {
        border-color:green;
    }
</style>

<!--验证输入的信息-->
<script>
    function check() {
        var x=document.forms['myform']['uname'].value;
        var y=document.forms['myform']['passwd'].value;
        if(x==null || x==""){
            alert("用户名不能为空！");
            return false;
        }else{
            if(y==null||y==""){
                alert("密码不能为空！");
                return false;
            }else{
// 采用MD5加密密码，再进行传送
                document.getElementById('password').value=hex_md5(y);
                return true;
            }
        }
    }
</script>

	<!-- 登录body -->
	<div class="logDiv">
		<img class="logBanner" src="/static/studySystem/img/logBanner.png" />
		<div class="logGet" style="top:10%;right: 15%">
            <center>
                <br>
                <x style="color: #0a6999 ;font-family: KaiTi;font-size: x-large;font-weight: 900">课程学习系统</x>
            </center>

			<!-- 头部提示信息 -->
			<div class="logD logDtip">
				<x style="font-size: large">登录</x>
			</div>
			<!-- 输入框 -->
			<form  action="/studySystem/checklogin" name="myform" method="post" onsubmit="return check()">

                <div class="lgD">
					<img class="img1" src="/static/studySystem/img/logName.png" />
                    <input type="text"  required="required" name="uname" placeholder="输入用户名" />
				</div>
				<div class="lgD">
					<img class="img1" src="/static/studySystem/img/logPwd.png" />
                    <input type="password"  required="required" name="passwd" placeholder="输入用户密码" />
                    <input  hidden="hidden" name="password" id="password">
				</div>
                <div  align="center" style="font-size: 10pt;color: #232323;">
                    <input  type="radio"  class="rdo" name="utype" value="2" checked><x style="font-size:14pt;font-family: 楷体; font-weight: 600">学生</x>
                    <input  type="radio" class="rdo" name="utype" value="1"><x style="font-size:14pt;font-family: 楷体;font-weight: 600">教师</x>
                </div>
				<div class="logC">
					<button type="submit">登 录</button>
				</div>
                <br>
                <div class="lgD">
                    <a href="register">没有账号？前往注册>></a>
                </div>
			</form>

		</div>
	</div>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->

   
</body>
</html>