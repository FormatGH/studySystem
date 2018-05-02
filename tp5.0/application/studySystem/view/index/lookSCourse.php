<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="/static/studySystem/css/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="/static/studySystem/css/amazeui.min.css">
    <link rel="stylesheet" href="/static/studySystem/css/amazeui.cropper.css">
    <style type="text/css">
        .up-img-cover {width: 100px;height: 150px;}
        .up-img-cover img{width: 100%;}
    </style>

    <!--新增-->
    <style>
        .dark-matter {
            margin-left: auto;
            margin-right: auto;
            height: 580pt;
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



</head>
<body style="background: #555;color: #D3D3D3;">

<?php

/*
 * 获取用户信息
*/
use app\studySystem\controller\Index;
$uid=$_SESSION['uid'];
$c=new Index();
$data=$c->getUserData($uid);


?>

<div class="dark-matter" align="" style="">
    <h1>已选课程
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <center>

            <?php
              if(!$scourse['status']){
                  echo $scourse['data'];
              }else{
                  for($i=0;$i<count($scourse['data']);$i++){
                      $cid=$scourse['data'][$i]['cid'];
                      $coursename=$scourse['data'][$i]['coursename'];
                      $academy=$scourse['data'][$i]['academy'];
                      $teacher=$scourse['data'][$i]['realname'];
                      if($academy==$data['academy']) {


                          ?>

                          <div id="edit" align="center"
                               style="margin-left:5%;margin-top:2%;float: left; align-self:center;width:200pt;height:220pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: left;align-content: center">
                              <!--            <a href="/static/studySystem/upload/xxx.pdf" >资料</a>-->

                              <label style="color: yellow;">
                                  <center>
                                      <img src="/static/studySystem/img/logBanner.png"
                                           style="margin-top:5%;height: 90pt;width: 90pt;">

                                  </center>
                                  <br>
                                  <a href="/studySystem/LookCourseMsg?cid={$cid}" target="_blank">
                                  <x style="color:yellow">&nbsp;&nbsp;&nbsp;&nbsp;课程名:</x>
                                  《{$coursename}》
                                  </a>
                                  <br>
                                  <a href="/studySystem/lookAcademyMsg?academy={$academy}" target="_blank">
                                  <x style="color:yellow">&nbsp;&nbsp;&nbsp;&nbsp;学院:</x>
                                  {$academy}
                                  </a>
                                  <br>

                                  <a href="/studySystem/lookTeacherMsg?tname={$teacher}" target="_blank">
                                      <x style="color:yellow;text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;教师:</x>
                                      {$teacher}
                                  </a>

<!---->
<!---->
<!--                                  <a style="font-size: small;font-family: 'Microsoft Yahei'"-->
<!--                                     href="/studySystem/LookTCourseFile?cid={$cid}" target="_blank">-->
<!--                                      <文件资料-->
<!--                                  </a>-->
<!--                                  <a href="/studySystem/LookCourseMsg?cid={$cid}"-->
<!--                                     style="color:red;font-size: small;font-family: 'Microsoft Yahei'">课程大纲</a>-->
<!---->
<!--                                  <a style="font-size: small;font-family: 'Microsoft Yahei'"-->
<!--                                     href="/studySystem/LookTCourseVideo?cid={$cid}">视频资料></a>-->
                                    <br>
                                  <br>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <button style="	background: #FFCC02;
			border: none;
			padding: 5px 20px 5px 20px;
			color: #585858;
			border-radius: 4px;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			text-shadow: 1px 1px 1px #FFE477;
			font-weight: bold;
			box-shadow: 1px 1px 1px #3D3D3D;
			-webkit-box-shadow:1px 1px 1px #3D3D3D;
			-moz-box-shadow:1px 1px 1px #3D3D3D;">

                                      <a style="color: black" href="/studySystem/studyCourse?cid={$cid}" target="_blank">开始学习</a>
                                  </button>

                              </label>


                          </div>

                          <?php
                      }
                  }
              }

            ?>

    </center>

</body>
</html>