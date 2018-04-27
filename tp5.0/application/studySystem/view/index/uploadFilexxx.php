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



        <?php
        /*
         * 获取学校id列表
         */
        use app\studySystem\controller\Index;

        $uid=$_SESSION['uid'];
        $c=new Index();
        $data=$c->getCourses($uid);
        $dataresult=$data['result'];
        if($dataresult){
        $courses = $data['data'];

        ?>
            <FORM method="post" enctype="multipart/form-data" class="form" action="/studySystem/uploadFile2">
                选择课程：


                <select id="coursename" name="coursename" style="height: 25pt;font-size:12pt;align-content: center;color: black">
                    <?php
                    for ($i = 0; $i < count($courses); $i++) {
                        $coursename = $courses[$i]['coursename'];
                        $academy = $courses[$i]['academy'];

                        echo "<option  value=" . $coursename . '(' . $academy . ')' . ">" . $coursename . '(' . $academy . ')' . "</option>";
                    }


                    ?>
                </select>

                <br>
                <br>
                选择课程：
                <select id="coursename" name="coursename" style="height: 25pt;font-size:12pt;align-content: center;color: black">
                    <?php
                    for ($i = 0; $i < count($courses); $i++) {
                        $coursename = $courses[$i]['coursename'];
                        $academy = $courses[$i]['academy'];
                        $cid = $c->getCid($uid,$coursename,$academy)['cid'];
                        echo "<option  value=" . $cid ." >" . $coursename . '(' . $academy . ')' . "</option>";
                    }


                    ?>
                </select>

    <br>
    <br>
    选择文件：<INPUT type="file" class="file" name="file">
    <br>
    <br/>
    <INPUT type="submit" style="margin-left: 20%" class="btn" value=" 提交 ">
</FORM>

<?php
}else {
    ?>

    <div id="edit" align="center"
         style="margin-left:5%;margin-top:2%;float: left;position: relative;align-self:center;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: center;align-content: center">

        <p style="color: red;">您还未添加过课程,无法进行资料上传</p>
    </div>
    <?php
}
        ?>



</body>
</html>