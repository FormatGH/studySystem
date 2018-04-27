<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:105:"D:\PHPstudy\PHPTutorial\WWW\studySystem\tp5.0\public/../application/studysystem\view\index\uploadFile.php";i:1524637832;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文件上传示例</title>

    <script type="text/javascript" src="/static/studySystem/js/jquery.min.js"></script>

    <style>
        body {
            font-family:"Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size:16px;
            padding:5px;
        } .
          form{
              padding: 15px;
              font-size: 16px;
          }
        .form .text {
            padding: 3px;
            margin:2px 10px;
            width: 240px;
            height: 24px;
            line-height: 28px;
            border: 1px solid #D4D4D4;
        } . form . btn{
              margin:6px;
              padding: 6px;
              width: 120px;
              font-size: 16px;
              border: 1px solid #D4D4D4;
              cursor: pointer;
              background:#eee;
          }
        . form . file{
            margin:6px;
            padding: 6px;
            width: 220px;
            font-size: 16px;
            border: 1px solid #D4D4D4;
            cursor: pointer;
            background:#eee;
        }
        a{
            color: #868686;
            cursor: pointer;
        } a:hover{
              text-decoration: underline;
          } h2{
                color: #4288ce;
                font-weight: 400;
                padding: 6px 0;
                margin: 6px 0 0;
                font-size: 28px;
              border-bottom: 1px solid #eee;
          }
        div{
                margin:8px;
            }
        . info{
                  padding: 12px 0;
                  border-bottom: 1px solid #eee;
              }
        .copyright{
            margin-top: 24px;
            padding: 12px 0;
            border-top: 1px solid #eee;
        }

    </style>
</head>
<body>



            <FORM method="post" enctype="multipart/form-data" class="form" action="/studySystem/uploadFile2">
                选择课程：


                <select id="coursename" name="coursename" style="height: 25pt;font-size:12pt;align-content: center;color: black">

                </select>

                <br>
                <br>
                选择章数：
                <select id="chapter" name="chapter" style="height: 25pt;font-size:12pt;align-content: center;color: black">

                </select>
                <br>
                <br>
                选择节数：
                <select id="section" name="section" style="height: 25pt;font-size:12pt;align-content: center;color: black">

                </select>


    <br>
    <br>
    选择文件：<INPUT type="file" class="file" name="file">
    <br>
    <br/>
    <INPUT type="submit" style="margin-left: 20%" class="btn" value=" 提交 ">
</FORM>



    <div id="edit" align="center"
         style="margin-left:5%;margin-top:2%;float: left;position: relative;align-self:center;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">

        <p style="color: red;">您还未添加过课程,无法进行资料上传</p>
    </div>




</body>
</html>