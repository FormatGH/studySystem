<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录界面</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="stylesheet" href="/static/studySystem/css/bootstrap.css">
<link href="/static/studySystem/iconfont/style.css" type="text/css" rel="stylesheet">
<style>
	body{color:#fff; font-family:"微软雅黑"; font-size:14px;}
	.wrap1{position:absolute; top:0; right:0; bottom:0; left:0; margin:auto }/*把整个屏幕真正撑开--而且能自己实现居中*/
	.main_content{background:url(/static/studySystem/img/a.png) repeat; margin-left:auto; margin-right:auto; text-align:left; float:none; border-radius:8px;}
	.form-group{position:relative;}
	.login_btn{display:block; background:#3872f6; color:#fff; font-size:15px; width:100%; line-height:50px; border-radius:3px; border:none; }
	.login_input{width:100%; border:1px solid #3872f6; border-radius:3px; line-height:40px; padding:2px 5px 2px 30px; background:none;}
	.icon_font{position:absolute; bottom:15px; left:10px; font-size:18px; color:#3872f6;}
	.font16{font-size:16px;}
	.mg-t20{margin-top:20px;}
	@media (min-width:200px){.pd-xs-20{padding:20px;}}
	@media (min-width:768px){.pd-sm-50{padding:50px;}}
	#grad {
	  background: -webkit-linear-gradient(#4990c1, #52a3d2, #6186a3); /* Safari 5.1 - 6.0 */
	  background: -o-linear-gradient(#4990c1, #52a3d2, #6186a3); /* Opera 11.1 - 12.0 */
	  background: -moz-linear-gradient(#4990c1, #52a3d2, #6186a3); /* Firefox 3.6 - 15 */
	  background: linear-gradient(#4990c1, #52a3d2, #6186a3); /* 标准的语法 */
	}

     .rdo {
         width: 0px;
         height: 0px;
         background-color: green;
         margin-right:100px;
         margin-left: 100pt;
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
        left: -25px;
        width: 18px;
        height: 18px;
        background-color: #fff;
        border: 1px solid green;
    }
    .rdo:after {
        top: -12px;
        left: -22px;
        width: 8px;
        height: 8px;
        background-color: #fff;
    }
    .rdo:checked:after {
        top: -12px;
        left: -22px;
        width: 12px;
        height: 12px;
        background-color:green;
    }
    .rdo:checked:before {
        border-color:green;
    }
</style>

</head>

<script src="/static/studySystem/js/md5.js" type="text/javascript"></script>

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
// 采用MD5加密密码后，再进行传递
                document.getElementById('password').value=hex_md5(y);
                return true;
            }
        }
    }
</script>



<body style="background:url(/static/studySystem/img/bg.jpg) no-repeat;">
    
    <div class="container wrap1" style="height:450px;">

            <div class="col-sm-8 col-md-5 center-auto pd-sm-50 pd-xs-20 main_content">
                <p  style="text-align:center;font-size:12pt;color: #000;">欢迎注册</p>
                <form action="/studySystem/addUser" method="post" onsubmit="return check()" name="myform">
                    <div class="form-group mg-t20">
                        <i class="icon-user icon_font"></i>
                        <input type="text" class="login_input" required="required" name="uname" style="color: #232323" placeholder="请输入用户名" />
                    </div>
                    <div class="form-group mg-t20">
                        <i class="icon-lock icon_font"></i>
                        <input type="password" class="login_input" required="required" name="passwd" style="color: #232323"  placeholder="请输入密码" />
                    </div>
                    <div  align="center" style="font-size: 10pt;color: #232323;">
                        <x style="font-family: 楷体;font-size: large;font-weight: 900;color: red">选择注册身份：</x>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  type="radio"  class="rdo" name="utype" value="2" checked>&nbsp;<x style="font-size:14pt;font-family: 楷体; font-weight: 600">学生</x>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input  type="radio" class="rdo" name="utype" value="1">&nbsp;<x style="font-size:14pt;font-family: 楷体;font-weight: 600">教师</x>
                    </div>
                    <br>
                    <input  hidden="hidden" name="password" id="password">
                    <button type="submit" style="submit" class="login_btn">注册</button>
               </form>
                <br>
                <div style="align-items: right;">
                    <a href="login" >已有账号？返回去登录！>></a>
                </div>
        </div>
    </div>
</body>
</html>
