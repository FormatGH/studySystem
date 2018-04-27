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
            height: 100%;
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
<body style="     background: #555;color: #D3D3D3;">

<?php

/*
 * 获取用户信息
*/
use app\studySystem\controller\Index;
$uid=$_SESSION['uid'];
$c=new Index();
$data=$c->getUserData($uid);
$coursename=$_GET['coursename'];
$academy=$_GET['academy'];
$cid=$c->getCid($uid,$coursename,$academy)['cid'];
$chapter=$c->getCourse($uid,$coursename,$academy)['data']['chapter'];

?>

<div class="dark-matter" align="" style="">
    <h1>课程大纲
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <center>

        <div  align="left" style="align-self:center;width:400pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: left;align-content: center">
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;《{$coursename}》--({$academy}) <br>
            <?php

            for($i=1;$i<=$chapter;$i++){

                $cname=$c->getCName($cid,$i)['cname'];
                echo '&nbsp;&nbsp;' .$i . '、' . $cname . '<br>';
                $section=$c->getSection($cid,$chapter)['section'];
                for($j=1;$j<=$section;$j++){
                    $sname=$c->getSName($cid,$i,$j)['sname'];
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    echo $i;
                    echo '-';
                    echo   $j . '.' . $sname . '<br>';
                }
                echo '<br>';

                //var_dump($sname);
            }
            ?>


        </div>
    </center>


</body>
</html>
