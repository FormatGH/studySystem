<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"E:\phpStudy\PHPTutorial\WWW\tp5.0\public/../application/studysystem\view\index\editUserSchool.php";i:1521461882;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="/static/studySystem/css/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="/static/studySystem/css/amazeui.min.css">
    <link rel="stylesheet" href="/static/studySystem/css/amazeui.cropper.css">
    <style type="text/css">
        .up-img-cover {
            width: 100px;
            height: 150px;
        }

        .up-img-cover img {
            width: 100%;
        }
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

        .dark-matter h1 > span {
            display: block;
            font-size: 11px;
        }

        .dark-matter label {
            display: block;
            margin: 0px 0px 5px;
        }

        .dark-matter label > span {
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
            line-height: 15px;
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
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 0.01px;
            text-overflow: '';
            width: 30%;
            height: 35px;
            color: #525252;
            line-height: 25px;
        }

        .dark-matter textarea {
            height: 100px;
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
            -webkit-box-shadow: 1px 1px 1px #3D3D3D;
            -moz-box-shadow: 1px 1px 1px #3D3D3D;
        }

        .dark-matter .button:hover {
            color: #333;
            background-color: #EBEBEB;
            background: #FFCC02;
        }

    </style>


    <script>
        function save() {
            document.forms['update'].submit();
        }

        function back() {
            document.forms['tolook'].submit();
        }

    </script>

</head>
<body>

<?php

/*
 * 获取用户信息
*/

use app\studySystem\controller\Index;

$uid = $_SESSION['uid'];
$c = new Index();
$data = $c->getUserData($uid);
$dataresult = $data['result'];
if ($dataresult) {
    $realname = $data['data']['realname'] == "" ? "(未填写)" : $data['data']['realname'];
    $number = $data['data']['number'] == "" ? "(未填写)" : $data['data']['number'];
    $academy = $data['data']['academy'] == "" ? "(未选择)" : $data['data']['academy'];
} else {
    $realname = "(未填写)";
    $number = "(未填写)";
    $academy = "(未选择)";
}

?>


<div class="dark-matter" align="" style="">
    <h1>学院认证
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <center>
        <div id="edit" align="center"
             style="align-self:center;width:400pt;height:200pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">
            <form name="update" action="/studySystem/updateUserSchool" method="post">
                <label>
                    <br>
                    <br>
                    姓名 : <input style="width:120pt;color: black;" value="<?php echo $realname; ?>">
                    <br>
                    <br>
                    学号 : <input style="width:120pt;color: black" value="<?php echo $number; ?>">
                    <br>
                    <br>
                    学院 :
                    <select id="school" name="school" style="height: 25pt;font-size:12pt;align-content: center;color: black">

                        <?php
                        /*
                         * 获取学校id列表
                         */
                        $academylist=array('计算机学院','自动化学院','外国语学院','机电学院');
                        for ($i = 0; $i < count($academylist); $i++) {
                            $acad=$academylist[$i];
                            if($acad==$academy){
                                echo "<option value=" . $acad . " selected='selected' >" .$acad ."</option>";
                            }else{
                                echo "<option  value=" . $acad . ">" .$acad ."</option>";
                            }

                        }
                        ?>
                    </select>


                </label>
                <label style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" style="font-size:10pt;font-family: 楷体; font-weight: 600;" class="button"
                           value="保存" onclick="save()"/>
                    <input type="button" style="font-size:10pt;font-family: 楷体; font-weight: 600;" class="button"
                           value="取消" onclick="back()"/>
                </label>
            </form>
        </div>

        <form name="tolook" action="/studySystem/lookUserSchool" method="post">

        </form>

    </center>


</body>
</html>
