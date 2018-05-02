<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>文件上传示例</title>

    <script  src="/static/studySystem/js/jquery-1.7.2.min.js"></script>


    <script>
        function changecolor(x){
            alert(x);
            e=document.getElementById(x);
            y='';
            z='';
            if(x=='vinput'){
                y='finput';
                z='cinput'
            }
            if(x=='finput'){
                y='vinput';
                z='cinput'
            }
            if(x=='cinput'){
                y='finput';
                z='vinput'
            }
            e1=document.getElementById(y);
            e2=document.getElementById(z);
            e1.style.backgroundColor="gray";
            e2.style.backgroundColor="gray";
            e.style.backgroundColor="yellow";
        }

        $(function () {
            $('#chapter').change(function(){

                var chapter=$('#chapter').val();
                var cid=$('#cid').val();

                $.ajax({
                    async:false,
                    type:"POST",
                    url:"http://localhost/studySystem/sGetSection",
                    data: {"cid":cid,"chapter":chapter},
                    dataType:"json",
                    success:function(data){
                        alert(data);
                        $('#section').html(data);
                    }
                });
            });

            $('#section').change(function(){

                var chapter=$('#chapter').val();
                var section=$('#section').val();
                var cid=$('#cid').val();
                alert(chapter);
                alert(section);

                $('#video').attr('href',"/studySystem/studyVideo?cid="+cid+"&chapter="+chapter+"&section="+section);
                $('#file').attr('href',"/studySystem/studyFile?cid="+cid+"&chapter="+chapter+"&section="+section);
                $('#coursemsg').attr('href',"/studySystem/studyCourseMsg?cid="+cid);

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
            $uid=$_SESSION['uid'];
            $index=new Index();
            $coursename=$course['coursename'];
            $chapter=$course['chapter'];


            ?>


                <input id="cid" name="cid" value="{$cid}" hidden="hidden"/>
                选择章数：
                <select id="chapter" name="chapter" style="height: 25pt;font-size:12pt;align-content: center;color: black" >
                    <option value="0" >----请选择章节----</option>
                    <?php
                    for($i=1;$i<=$chapter;$i++){
                        $cname=$index->getCName($cid,$i)['cname'];
                        ?>
                        <option value="{$i}">第{$i}章({$cname})</option>
                    <?php

                    }
                    ?>


                </select>
                &nbsp;
                选择节数：
                <select id="section" name="section" style="height: 25pt;font-size:12pt;align-content: center;color: black">
                    <option></option>
                </select>



    <br>
    <br>
    <a id="video" href="javascript:viod()" target="data">
                <INPUT id="vinput" type="submit" style="height: 25pt;width:150pt;font-size: 13pt;font-weight: 900; background-color:gray;margin-left: 10%;font-family: KaiTi" class="btn" value="视频" onclick="changecolor('vinput')">
            </a>
            <a id="file" href="javascript:viod()" target="data">
     <INPUT type="submit" id="finput"  style="height: 25pt;width:150pt;font-size: 13pt;font-weight: 900; background-color:gray;font-family: KaiTi" class="btn" value="资料文件" onclick="changecolor('finput')">
            </a>
            <a id="coursemsg" href="javascript:viod()" target="data">
                <INPUT type="submit" id="cinput"  style="height: 25pt;width:150pt;font-size: 13pt;font-weight: 900; background-color:gray;font-family: KaiTi" class="btn" value="课程大纲" onclick="changecolor('cinput')">
            </a>
             <INPUT type="submit" style="height: 25pt;width:150pt;font-size: 13pt;font-weight: 900; background-color:gray;font-family: KaiTi" class="btn" value=" 提交 " >




    <div style="margin-left:10%;padding:0px;width: 620pt;height: 380pt;background-color: whitesmoke" >
        <iframe  style="padding:0px;" name="data" src="" height="100%" width="100%" frameborder="0">

        </iframe>
    </div>

</body>
</html>