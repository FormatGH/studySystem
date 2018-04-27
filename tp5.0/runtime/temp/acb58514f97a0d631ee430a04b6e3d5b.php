<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:108:"D:\PHPstudy\PHPTutorial\WWW\studySystem\tp5.0\public/../application/studysystem\view\index\addCourseForm.php";i:1524465852;}*/ ?>
<!DOCTYPE html>
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
        function  f() {

            chapter=document.getElementById('chapter').value;
            chaptermsg=document.getElementById('chaptermsg');
            chaptermsg.hidden="hidden";

            alert(chapter);

            i=1;
            while(i<=10){
                c=document.getElementById('x'+i);
                c.hidden="hidden";
                i++;
            }

            i=1;
            while(chapter>=i){
                c=document.getElementById('x'+i);
                c.hidden="";
                i++;
            }


            if(chapter>0){
                chaptermsg.hidden="";
            }



        }

        function  s1() {
            c='c1_s';
            alert('xx');
            section=document.getElementById(c).value;
           sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }

            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s2() {
            c='c2_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


        i=5;
        while(i>section){

            s=document.getElementById(c+i);
            s.hidden="hidden";
            i--;
        }

        alert(section);
        if(section>0){
            sdiv.hidden="";
        }
        }

        function  s3() {
            c='c3_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s4() {
            c='c4_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s5() {
            c='c5_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s6() {
            c='c6_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s7() {
            c='c7_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s8() {
            c='c8_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s9() {
            c='c9_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }

        function  s10() {
            c='c10_s';
            alert('xx');
            section=document.getElementById(c).value;
            sdiv=document.getElementById(c+'_div');

            i=1;
            while(section>=i){
                s=document.getElementById(c+i);
                s.hidden="";
                i++;
            }


            i=5;
            while(i>section){

                s=document.getElementById(c+i);
                s.hidden="hidden";
                i--;
            }

            alert(section);
            if(section>0){
                sdiv.hidden="";
            }
        }




        function save() {
            var coursename=document.getElementById('coursename').value;

            if(coursename.length>0){
                var pattern1 =  /^[\u4E00-\u9FA5]+$/;
                verfiyName=pattern1.test(coursename);
                if(verfiyName){
                    if(coursename.length<=10){
                        document.forms['add'].submit();
                    }else{
                        alert('课程名最长为10个字符！');
                    }
                }else{
                    alert('课程名只能为中文！');
                }
            }else{
                alert('课程名不能为空！');
            }
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
//    $realname = $data['data']['realname'] == "" ? "(未填写)" : $data['data']['realname'];
//    $number = $data['data']['number'] == "" ? "(未填写)" : $data['data']['number'];
    $academy = $data['data']['academy'] == "" ? "(未选择)" : $data['data']['academy'];
} else {
//    $realname = "";
//    $number = "";
    $academy = "";
}

?>


<div class="dark-matter" align="" style="height: 100%">
    <h1>新增课程
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <center>
        

        <div id="edit" align="center" style="align-self:center;width:400pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">
            <form name="add" action="/studySystem/addCourse" method="post">
                <label>
                    <input hidden="hidden" id="tid" name="tid" value="<?php echo $uid; ?>">
                    <br>
                    <br>
                    课程名:<input id="coursename" name="coursename" style="width:120pt;color: black;" >

                    <br>
                    <br>
                    章节数:
                    <select id="chapter" name="chapter" onchange="f()" style="height: 25pt;font-size:12pt;align-content: center;color: black">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <br>
                    <br>
                    学院 :
                    <select id="academy" name="academy" style="height: 25pt;font-size:12pt;align-content: center;color: black">

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

                <x id="chaptermsg" >

                    <x id="x1" hidden="hidden" style="color: black">
                        <p style="color: yellow">---------各章节名称----------</p>

                        <br>
                        <br>
                        &nbsp;第一章:&nbsp;&nbsp;
                        <input id="c1"  name="c1">
                        节数:<select id="c1_s" name="c1_s" onchange="s1()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                            <option value="0"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <br>
                        <br>
                        <br>
                    </x>

                    <x id="c1_s_div" hidden="hidden" style="color: black">
                        <x id="c1_s1" >&nbsp;1-1:&nbsp;&nbsp;<input name="c1_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c1_s2" hidden="hidden">&nbsp;1-2:&nbsp;&nbsp;<input name="c1_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c1_s3" hidden="hidden">&nbsp;1-3:&nbsp;&nbsp;<input name="c1_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c1_s4" hidden="hidden">&nbsp;1-4:&nbsp;&nbsp;<input name="c1_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c1_s5" hidden="hidden">&nbsp;1-5:&nbsp;&nbsp;<input name="c1_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                    <x id="x2" hidden="hidden" style="color: black">
                        &nbsp;第二章:&nbsp;&nbsp;<input id="c2"  name="c2">
                        节数:<select id="c2_s" name="c2_s" onchange="s2()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                            <option value="0"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <br>
                        <br>
                        <br>
                    </x>

                    <x id="c2_s_div" hidden="hidden" style="color: black">
                        <x id="c2_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c2_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c2_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c2_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c2_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c2_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c2_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c2_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c2_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c2_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x3" hidden="hidden" style="color: black">
                            &nbsp;第三章:&nbsp;&nbsp;<input id="c3" name="c3" >
                            节数:<select id="c3_s" name="c3_s" onchange="s3()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c3_s_div" hidden="hidden" style="color: black">
                        <x id="c3_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c3_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c3_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c3_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c3_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c3_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c3_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c3_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c3_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c3_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x4" hidden="hidden" style="color: black">&nbsp;第四章:&nbsp;&nbsp;<input id="c4" name="c4">
                            节数:<select id="c4_s" name="c4_s" onchange="s4()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c4_s_div" hidden="hidden" style="color: black">
                        <x id="c4_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c4_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c4_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c4_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c4_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c4_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c4_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c4_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c4_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c4_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x5" hidden="hidden" style="color: black">&nbsp;第五章:&nbsp;&nbsp;<input id="c5" name="c5" >
                            节数:<select id="c5_s" name="c5_s" onchange="s5()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c5_s_div" hidden="hidden" style="color: black">
                        <x id="c5_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c5_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c5_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c5_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c5_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c5_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c5_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c5_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c5_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c5_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x6" hidden="hidden" style="color: black">&nbsp;第六章:&nbsp;&nbsp;<input id="c6" name="c6">
                            节数:<select id="c6_s" name="c6_s" onchange="s6()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c6_s_div" hidden="hidden" style="color: black">
                        <x id="c6_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c6_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c6_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c6_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c6_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c6_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c6_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c6_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c6_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c6_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x7" hidden="hidden" style="color: black">&nbsp;第七章:&nbsp;&nbsp;<input id="c7" name="c7">
                            节数:<select id="c7_s" name="c7_s" onchange="s7()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c7_s_div" hidden="hidden" style="color: black">
                        <x id="c7_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c7_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c7_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c7_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c7_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c7_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c7_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c7_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c7_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c7_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x8" hidden="hidden" style="color: black">&nbsp;第八章:&nbsp;&nbsp;<input id="c8" name="c8">
                            节数:<select id="c8_s" name="c8_s" onchange="s8()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c8_s_div" hidden="hidden" style="color: black">
                        <x id="c8_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c8_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c8_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c8_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c8_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c8_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c8_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c8_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c8_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c8_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x9" hidden="hidden" style="color: black">&nbsp;第九章:&nbsp;&nbsp;<input id="c9" name="c9">
                            节数:<select id="c9_s" name="c9_s" onchange="s9()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c9_s_div" hidden="hidden" style="color: black">
                        <x id="c9_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c9_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c9_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c9_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c9_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c9_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c9_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c9_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c9_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c9_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>

                        <x id="x10" hidden="hidden" style="color: black">&nbsp;第十章:&nbsp;&nbsp;<input id="c10" name="c10">
                            节数:<select id="c10_s" name="c10_s" onchange="s10()" style="width:50pt;height: 22pt;font-size:12pt;align-content: center;color: black">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <br>
                            <br>
                        </x>

                    <x id="c10_s_div" hidden="hidden" style="color: black">
                        <x id="c10_s1" >&nbsp;①:&nbsp;&nbsp;<input name="c10_s1_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c10_s2" hidden="hidden">&nbsp;②:&nbsp;&nbsp;<input name="c10_s2_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c10_s3" hidden="hidden">&nbsp;③:&nbsp;&nbsp;<input name="c10_s3_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c10_s4" hidden="hidden">&nbsp;④:&nbsp;&nbsp;<input name="c10_s4_name"  >
                            <br>
                            <br>
                        </x>
                        <x id="c10_s5" hidden="hidden">&nbsp;⑤:&nbsp;&nbsp;<input name="c10_s5_name"  >
                            <br>
                            <br>
                        </x>
                    </x>



                </x>

                <label style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" style="font-size:10pt;font-family: 楷体; font-weight: 600;" class="button"
                           value="保存" onclick="save()"/>

                </label>
            </form>

        </div>



        <div style="height: 100pt"></div>
    </center>


</body>
</html>
