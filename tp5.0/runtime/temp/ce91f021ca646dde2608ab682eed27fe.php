<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"E:\phpStudy\PHPTutorial\WWW\tp5.0\public/../application/studysystem\view\index\userBasicData.php";i:1519801862;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>基于amazeui框架头像上传代码</title>

<link rel="stylesheet" type="text/css" href="/static/studySystem/css/font-awesome.4.6.0.css">
<link rel="stylesheet" href="/static/studySystem/css/amazeui.min.css">
<link rel="stylesheet" href="/static/studySystem/css/amazeui.cropper.css">
<link rel="stylesheet" href="/static/studySystem/css/custom_up_img.css">
<style type="text/css">
	.up-img-cover {width: 100px;height: 150px;}
	.up-img-cover img{width: 100%;}
</style>

	<!--新增-->
	<style>
		.dark-matter {
			margin-left: auto;
			margin-right: auto;
			height: 800pt;
			/*max-width: 500px;*/
			background: #555;
			padding: 20px 30px 20px 30px;
			font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #D3D3D3;
			text-shadow: 1px 1px 1px #444;
			border: none;
			border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
		}
		.dark-matter h1 {
			padding: 0px 0px 10px 40px;
			display: block;
			border-bottom: 1px solid #444;
			margin: -10px -30px 30px -30px;
		}
		.dark-matter h1>span {
			display: block;
			font-size: 11px;
		}
		.dark-matter label {
			display: block;
			margin: 0px 0px 5px;
		}
		.dark-matter label>span {
			float: left;
			width: 20%;
			text-align: right;
			padding-right: 10px;
			margin-top: 10px;
			font-weight: bold;
		}
		.dark-matter input[type="text"], .dark-matter input[type="email"], .dark-matter textarea, .dark-matter select {
			border: none;
			color: #525252;
			height: 25px;
			line-height:15px;
			margin-bottom: 16px;
			margin-right: 6px;
			margin-top: 2px;
			outline: 0 none;
			padding: 5px 0px 5px 5px;
			width: 30%;
			border-radius: 2px;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			background: #DFDFDF;
		}
		.dark-matter select {
			background: #DFDFDF url('down-arrow.png') no-repeat right;
			background: #DFDFDF url('down-arrow.png') no-repeat right;
			appearance:none;
			-webkit-appearance:none;
			-moz-appearance: none;
			text-indent: 0.01px;
			text-overflow: '';
			width: 30%;
			height: 35px;
			color: #525252;
			line-height: 25px;
		}
		.dark-matter textarea{
			height:100px;
			padding: 5px 0px 0px 5px;
			width: 30%;
		}
		.dark-matter .button {
			background: #FFCC02;
			border: none;
			padding: 10px 25px 10px 25px;
			color: #585858;
			border-radius: 4px;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			text-shadow: 1px 1px 1px #FFE477;
			font-weight: bold;
			box-shadow: 1px 1px 1px #3D3D3D;
			-webkit-box-shadow:1px 1px 1px #3D3D3D;
			-moz-box-shadow:1px 1px 1px #3D3D3D;
		}
		.dark-matter .button:hover {
			color: #333;
			background-color: #EBEBEB;
			background: #FFCC02;
		}

	</style>

<script>
	function closeUploadDiv() {


        document.getElementById('closeUploadDiv').click();

    }
    function editData() {
        var x=document.getElementById('editData');
        var y=document.getElementById('lookData');
        x.style.display="block";
        y.style.display="none";
    }
    function lookData() {
        var x=document.getElementById('editData');
        var y=document.getElementById('lookData');
        x.style.display="none";
        y.style.display="block";
    }

</script>

</head>
<body>

<div class="dark-matter">
	<h1>个人基本资料
		<span>Please fill all the texts in the fields.</span>
	</h1>
	<center>
	<div class="up-img-cover"  id="up-img-touch" >
		<?php
        $user=unserialize($_SESSION['myuser']);
        $str = "E:\\phpStudy\\PHPTutorial\\WWW\\tp5.0\\public\\static\\studySystem\\img\\upload\\";
        $imagename=$user->uname . $user->utype . ".png";
        $photo=$str . $imagename;
        if(!file_exists($photo)){
            $imagename="init.png";
        }
        $imagename="/static/studySystem/img/upload/" . $imagename;
        $username=$user->uname;

            //echo '<img class="am-circle" alt="点击图片上传" src="/static/studySystem/img/upload/' .$imagename . '" data-am-popover="{content: "' . "'点击上传', trigger: 'hover focus'}>";
        ?>
        <img class="am-circle" alt="点击图片上传" src="<?php echo $imagename; ?>" data-am-popover="{content: '点击上传', trigger: 'hover focus'}" >
	</div>
	<!--新增-->
	</center>

	<div id="lookData">
        <form action="" method="post" class="STYLE-NAME" style="text-align: center;align-content: center" onclick="editData()">

            <label>
                Your Name :<?php echo $username; ?>
<!--                <input id="name" type="text" name="name" disabled="disabled" placeholder="Your Full Name" />-->
            </label>
            <label>
                Your Email :<?php echo $username; ?>@test.com
<!--                <input id="email" type="email" name="email" placeholder="Valid Email Address" />-->
            </label>

            <label>
                Message :<?php echo $username; ?> is a student
<!--                <textarea id="message" name="message" placeholder="Your Message to Us"></textarea>-->
            </label>
            <label>
                Subject :
                <select name="selection">
                    <option value="Job Inquiry">Job Inquiry</option>
                    <option value="General Question">General Question</option>
                </select>
            </label>

                <input type="button" class="button" value="Send" />

        </form>
    </div>


    <div id="editData" style="display: none">
        <form action="/studySystem/editUserData"  method="post" class="STYLE-NAME" style="text-align: center;align-content: center;" onsubmit="lookData()">

            <label>
                HHHH :
                <input id="name" type="text" name="name" disabled="disabled" placeholder="Your Full Name" />
            </label>
            <label>
                Your Email :
                <input id="email" type="email" name="email" placeholder="Valid Email Address" />
            </label>

            <label>
                Message :
                <textarea id="message" name="message" placeholder="Your Message to Us"></textarea>
            </label>
            <label>
                Subject :
                <select name="selection">
                    <option value="Job Inquiry">Job Inquiry</option>
                    <option value="General Question">General Question</option>
                </select>
            </label>


                <input type="submit" class="button" value="Send" />

        </form>
    </div>


</div>


<div><a style="text-align: center; display: block;"  id="pic"></a></div>

<!--图片上传框-->
<div class="am-modal am-modal-no-btn up-frame-bj " tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog up-frame-parent up-frame-radius">
	<div class="am-modal-hd up-frame-header">
	   <label>修改头像</label>
	  <a href="javascript: void(0)" id="closeUploadDiv" class="am-close am-close-spin" data-am-modal-close>&times;</a>
	</div>
	<div class="am-modal-bd  up-frame-body">
	  <div class="am-g am-fl">
		<div class="am-form-group am-form-file">
		  <div class="am-fl">
			<button type="button" class="am-btn am-btn-default am-btn-sm">
			  <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
		  </div>
		  <input type="file" id="inputImage">
		</div>
	  </div>
	  <div class="am-g am-fl" >
		<div class="up-pre-before up-frame-radius">
			<img alt="" src="" id="image" >
		</div>
		<div class="up-pre-after up-frame-radius">
		</div>
	  </div>
	  <div class="am-g am-fl">
		<div class="up-control-btns">
			<span class="am-icon-rotate-left"  onclick="rotateimgleft()"></span>
			<span class="am-icon-rotate-right" onclick="rotateimgright()"></span>
			<span class="am-icon-check" id="up-btn-ok" url="http://localhost/studySystem/uploadUserPhoto"></span>
		</div>
	  </div>
	  
	</div>
  </div>
</div>

<!--加载框-->
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
  <div class="am-modal-dialog">
	<div class="am-modal-hd">正在上传...</div>
	<div class="am-modal-bd">
	  <span class="am-icon-spinner am-icon-spin"></span>
	</div>
  </div>
</div>

<!--警告框-->
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
	<div class="am-modal-hd">信息</div>
	<div class="am-modal-bd"  id="alert_content">
			  成功了
	</div>
	<div class="am-modal-footer">
	  <span class="am-modal-btn" onclick="closeUploadDiv('<?php echo $imagename; ?>')">确定</span>
	</div>
  </div>
</div>
<script src="/static/studySystem/js/jquery-1.8.3.min.js"></script>
<script src="/static/studySystem/js/amazeui.min.js" charset="utf-8"></script>
<script src="/static/studySystem/js/cropper.min.js" charset="utf-8"></script>
<script src="/static/studySystem/js/custom_up_img.js" charset="utf-8"></script>


</body>
</html>
