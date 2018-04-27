<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"D:\PHPstudy\PHPTutorial\WWW\studySystem\tp5.0\public/../application/studysystem\view\index\lookTCourse.php";i:1524815175;}*/ ?>
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

</head>
<body style="background: #555;color: #D3D3D3;">



<div class="dark-matter" align="" style="">
    <h1>查看课程
        <span>Please fill all the texts in the fields.</span>
    </h1>

<!--    --><?php
//    use app\studySystem\controller\Index;
//    $i=new Index();
//    echo $i->showPage(2, 5);
//    

    use app\studySystem\controller\Index;
    define("APP_DEBUG", true);
    $uid=$_SESSION['uid'];
    $c=new Index();
    $data=$c->getCourses($uid);
    $dataresult=$data['result'];
    if($dataresult){
        $courses=$data['data'];
        for($i=0;$i<count($courses);$i++){
            $coursename=$courses[$i]['coursename'];
            $academy=$courses[$i]['academy'];

            //echo $courses[$i]['coursename'];
 ?>

        <div id="edit" align="center" style="margin-left:5%;margin-top:2%;float: left; align-self:center;width:200pt;height:200pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">
            <a href="/static/studySystem/upload/xxx.pdf" >资料</a>
            <form name="add" action="/studySystem/addCourse" method="post">
                <label style="color: yellow;">
                    <center>
                        <img src="/static/studySystem/img/logBanner.png" style="margin-top:5%;height: 90pt;width: 90pt;">

                    </center>
                    <br>
                    <x style="color: #D3D3D3">课程名:</x>
                    《<?php echo $coursename; ?>》
                    <br>
                    <x style="color: #D3D3D3">学院:</x>
                    <?php echo $academy; ?>
                    <br>

                    <br>



                        <a style="font-size: small;font-family: 'Microsoft Yahei'" href="/studySystem/LookTCourseFile?coursename=<?php echo $coursename; ?>&academy=<?php echo $academy; ?>"><文件资料</a>
                    <a href="/studySystem/LookCourseMsg?coursename=<?php echo $coursename; ?>&academy=<?php echo $academy; ?>" style="color:red;font-size: small;font-family: 'Microsoft Yahei'">课程大纲</a>

                        <a style="font-size: small;font-family: 'Microsoft Yahei'" href="">视频资料></a>




                </label>


            </form>
        </div>

<?php

        }
//        var_dump($courses[0]);
    }else{

?>
    <div  align="center" style="margin-left:5%;margin-top:2%;float: left;position: relative;align-self:center;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">

    <p style="color: yellow;">您还未添加过课程</p>
    </div>
<?php
    }
?>




</div>
</body>
</html>





