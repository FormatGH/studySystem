<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"D:\PHPstudy\PHPTutorial\WWW\studySystem\tp5.0\public/../application/studysystem\view\index\uploadFile1.php";i:1524756725;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>文件上传示例</title>

    <script  src="/static/studySystem/js/jquery-1.7.2.min.js"></script>


    <script>
        $(function () {
            $('#coursename').change(function(){

                var cname=$('#coursename').val();
                    $.ajax({
                        async:false,
                        type:"POST",
                        url:"http://localhost/studySystem/uploadFile1",
                        data: {"cid":cname,"select":'chapter'},
                        dataType:"json",
                        success:function(data){
                            alert(data);
                            $('#chapter').html(data);
                        }
                    });
            });

            $('#chapter').change(function(){

                var chapter=$('#chapter').val();
                var cid=$('#coursename').val()
                $.ajax({
                    async:false,
                    type:"POST",
                    url:"http://localhost/studySystem/uploadFile1",
                    data: {"cid":cid,"chapter":chapter,"select":'section'},
                    dataType:"json",
                    success:function(data){
                        alert(data);
                        $('#section').html(data);
                    }
                });
            });
        })

    </script>

    <style>
        body {
            font-family:"Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size:16px;
            padding:5px;
            background: #555;
            padding: 20px 30px 20px 30px;
            font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
            /*color: #D3D3D3;*/
            color:yellow;
            font-family: KaiTi;
            font-size: large;
            font-weight: 900;

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

            <?php
            use app\studySystem\controller\Index;
            $ftype=input('ftype');
            $uid=$_SESSION['uid'];
            $index=new Index();

            $courses=$index->getCourses($uid)['data'];
            if($ftype=='file'){
                $ftypes='txt/doc/pdf';
                $type='文档文件';
            }else if($ftype=='video'){
                $ftypes='mp4/mkv/flv/rmvb/wmv/avi';
                $type='视频文件';
            }

            ?>

            <FORM method="post" enctype="multipart/form-data" class="form" action="/studySystem/uploadFile2">
                <input name="ftypes" hidden="hidden" value="<?php echo $ftypes; ?>"/>
                <input name="ftype" hidden="hidden" value="<?php echo $ftype; ?>"/>

                选择课程：


                <select id="coursename" name="coursename" style="height: 25pt;font-size:12pt;align-content: center;color: black" >
                    <option value="0" >----请选择课程----</option>
                    <?php
                    foreach ($courses as $c){
                        $cid=$index->getCid($uid,$c['coursename'],$c['academy'])['cid'];
                        ?>
                        <option value="<?php echo $cid; ?>"><?php echo $c['coursename']; ?>(<?php echo $c['academy']; ?>)</option>
                    <?php

                    }
                    ?>


                </select>



                <br>
                <br>
                选择章数：
                <select id="chapter" name="chapter" style="height: 25pt;font-size:12pt;align-content: center;color: black">
                    <option></option>
                </select>
                <br>
                <br>
                选择节数：
                <select id="section" name="section" style="height: 25pt;font-size:12pt;align-content: center;color: black">
                    <option></option>
                </select>



    <br>
    <br>
    选择<?php echo $type; ?>：<INPUT type="file" class="file" name="file">
    <br>
    <br/>
    <INPUT type="submit" style="height: 25pt;font-size: 13pt;font-weight: 900; background-color:yellow;margin-left: 20%;font-family: KaiTi" class="btn" value=" 提交 ">
</FORM>



    <div id="edit" align="center"
         style="margin-left:5%;margin-top:2%;float: left;position: relative;align-self:center;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">

        <p style="color: red;">您还未添加过课程,无法进行资料上传</p>
    </div>




</body>
</html>