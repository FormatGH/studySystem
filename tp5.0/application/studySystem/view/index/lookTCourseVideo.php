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

    <style>
        .file {
            position: relative;
            display: inline-block;
            background: #ccc;
            border: 1px solid #333;
            padding: 2px 10px;
            overflow: hidden;
            text-decoration: none;
            text-indent: 0;
            line-height: 20px;
            border-radius: 20px;
            color: #333;
            font-size: 13px;

        }
        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }


        .gradient{

            filter:alpha(opacity=100 finishopacity=50 style=1 startx=0,starty=0,finishx=0,finishy=150) progid:DXImageTransform.Microsoft.gradient(startcolorstr=#fff,endcolorstr=#ccc,gradientType=0);
            -ms-filter:alpha(opacity=100 finishopacity=50 style=1 startx=0,starty=0,finishx=0,finishy=150) progid:DXImageTransform.Microsoft.gradient(startcolorstr=#fff,endcolorstr=#ccc,gradientType=0);/*IE8*/
            background:#ccc; /* 一些不支持背景渐变的浏览器 */
            background:-moz-linear-gradient(top, #fff, #ccc);
            background:-webkit-gradient(linear, 0 0, 0 bottom, from(#fff), to(#ccc));
            background:-o-linear-gradient(top, #fff, #ccc);
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
    function upload(x) {  alert('xxx');

        upload=document.getElementById('upload'+x);
        upload.submit();

    }
</script>
</head>
<body style="background: #555;color: #D3D3D3;">


<?php

/*
 * 获取用户信息
*/
use app\studySystem\controller\Index;
$uid=$_SESSION['uid'];
$c=new Index();
$userdata=$c->getUserData($uid);
$tid=$c->getCourseByCid($cid)['tid'];


?>

<div class="dark-matter" align="" style="">
    <h1>课程文件资料
        <span>课程名：{$coursename}-({$academy})  章数:{$chapter}</span>
    </h1>
    <center>
<?php

    $filetype='video';

    for($i=1;$i<=$chapter;$i++){
        $cname=$c->getCName($cid,$i)['cname'];
        ?>

        <div id="look" align="center" style="align-self:center;width:600pt;height:150pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">
            第{$i}章:{$cname}
            <br>
<!--            --><?php
            $section=$c->getSection($cid,$i)['section'];
            for($j=1;$j<=$section;$j++){
                $sname=$c->getSName($cid,$i,$j)['sname'];

                $file=$c->getCourseFile($cid,$i,$j,$filetype);
                if($file) {


                    ?>

                    <div style="text-align: left;float: left;margin-left:5%;margin-top:2%;">
                        第{$i}-{$j}节:{$sname}
                        <!--                    <a href="/static/studySystem/upload/{$tid}/{$coursename}({$academy})/第{$i}章-{$cname}/{$i}-{$j}{$sname}/test.pdf">-->
                        <br>&nbsp;&nbsp;
<!--                            <video src="/static/studySystem/upload/{$tid}/{$coursename}({$academy})/第{$i}章-{$cname}/{$i}-{$j}{$sname}/{$file['filename']}"></video>-->
<!--                        <video src="/static/studySystem/upload/test.avi"></video>-->
                        <a href="/static/studySystem/upload/{$tid}/{$coursename}({$academy})/第{$i}章-{$cname}/{$i}-{$j}{$sname}/{$file['filename']}" target="_blank">
                            <img src="/static/studySystem/img/video.png" >
                            <br>
                            &nbsp;课程视频
                        </a>
<!--                        <video width="320" height="240" controls>-->
<!--                            <source src="/static/studySystem/upload/{$tid}/{$coursename}({$academy})/第{$i}章-{$cname}/{$i}-{$j}{$sname}/{$file['filename']}" type="video/mp4">-->
<!--                        </video>-->



                    </div>

                    <?php
                }else{


                    ?>
                    <div style="text-align: left;float: left;margin-left:5%;margin-top:2%;">
                        第{$i}-{$j}节:{$sname}
                        <!--                    <a href="/static/studySystem/upload/{$tid}/{$coursename}({$academy})/第{$i}章-{$cname}/{$i}-{$j}{$sname}/test.pdf">-->
                        <br>
                        <p style="color: red">还未上传资料</p>


                        <a href="javascript:;" class="file gradient">上传
                            <form id="upload{$i}_{$j}" method="post" enctype="multipart/form-data"
                                  action="/studySystem/uploadFile2">
                                <input name="returnaddr" hidden="hidden" value="/studySystem/lookTCourseVideo?coursename={$coursename}&academy={$academy}"/>
                                <input name="ftypes" hidden="hidden" value="mp4"/>
                                <input name="ftype" hidden="hidden" value="video"/>
                                <input hidden="hidden" name="coursename" value="{$cid}">

                                <input hidden="hidden" name="chapter" value="{$i}">
                                <input hidden="hidden" name="section" value="{$j}">
                                <input type="file" name="file" style="color: transparent;" onchange="upload('{$i}_{$j}')">
                            </form>
                        </a>
                    </div>

            <?php
                }
            }
//            ?>


        </div>
        <br>

        <?php
    }
?>

    </center>


</body>
</html>
