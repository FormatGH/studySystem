<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">


    <?php

    /*
     * add
    */
    use app\studySystem\controller\Index;
    $uid=$_SESSION['uid'];
    $c=new Index();
    $data=$c->getUserData($uid);
    if($data){
        $imagename=$data['photo']==""?"init.png":$data['photo'];
        $realname=$data['realname']==""?"(未填写)":$data['realname'];
        $email=$data['email']==""?"(未填写)":$data['email'];
        $message=$data['message']==""?"(未填写)":$data['message'];

    }else{
        $imagename="init.png";
        $realname="(未填写)";
        $email="(未填写)";
        $message="(未填写)";
    }
    $imagename="/static/studySystem/img/upload/" . $imagename;

    ?>

<link rel="stylesheet" type="text/css" href="/static/studySystem/css/font-awesome.4.6.0.css">
<link rel="stylesheet" href="/static/studySystem/css/amazeui.min.css">
<link rel="stylesheet" href="/static/studySystem/css/amazeui.cropper.css">
<link rel="stylesheet" href="/static/studySystem/css/custom_up_img.css">
<style type="text/css">
	.up-img-cover {width: 100px;height: 150px;}
	.up-img-cover img{width: 100%;}
</style>

	<!--新增-->
<style>
    .dark-matter {
        margin-left: auto;
        margin-right: auto;
        height: 800pt;
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
    function closeUploadDiv() {
        document.getElementById('closeUploadDiv').click();
    }

    function edit(x) {
        var a=document.getElementById(x);
        var save=document.getElementById('save'+x);
        var look=document.getElementById('look'+x);
        var hint=document.getElementById(x+'hint');
        var tophint=document.getElementById('tophint');
        if(a.value=="(未填写)"){
            a.value="";
        }
        a.disabled="";
        a.style="background-color: white;color:black";
        a.removeAttribute('readonly');
        save.hidden="";
        look.hidden="";
        tophint.hidden='hidden';
        hint.hidden="";
    }

    function look(x) {
        var a=document.getElementById(x);
        var save=document.getElementById('save'+x);
        var look=document.getElementById('look'+x);
        var hint=document.getElementById(x+'hint');
        var tophint=document.getElementById('tophint');
        if(x=="realname"){
            a.value="{$realname}";
        }else if(x=="email"){
            a.value="{$email}";
        }else if(x=="message"){
            a.value="{$message}";
        }
        a.setAttribute('readonly','readonly');
        a.style="background-color: #555;color: yellow";
        save.hidden="hidden";
        look.hidden="hidden";
        hint.hidden="hidden";
        tophint.hidden=""
    }

    function save(x,oldvalue) {
    var a=document.getElementById(x);
    var save=document.getElementById('save'+x);
    var look=document.getElementById('look'+x);
    var hint=document.getElementById(x+'hint');
    var tophint=document.getElementById('tophint');
    newvalue=a.value;
    // alert(x.value.length);
    if(x=="realname"){
            if(newvalue.length>0){
                var pattern1 =  /^[\u4E00-\u9FA5]+$/;
                verfiyName=pattern1.test(newvalue);
                if(verfiyName){
                    if(newvalue.length<=6){
                        document.forms[x+'_form'].submit();
                    }else{
                        alert('姓名最长为6个字符！');
                        a.value=oldvalue;
                    }
                }else{
                    alert('姓名只能为中文！');
                    a.value=oldvalue;
                }
            }else{
                alert('所填姓名不能为空！');
                a.value=oldvalue;
            }
        }else if(x=="email"){
        if(newvalue.length>0){
            var pattern1 =  /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            verfiyName=pattern1.test(newvalue);
            if(verfiyName){
                if(newvalue.length<=20){
                    document.forms[x+'_form'].submit();
                }else{
                    alert('邮箱最长为20个字符！');
                    a.value=oldvalue;
                }
            }else{
                alert('请输入正确的邮箱格式！');
                a.value=oldvalue;
            }
        }else{
            alert('所填邮箱不能为空！');
            a.value=oldvalue;
        }
    }else if(x=="message"){
        if(newvalue.length>0){
                if(newvalue.length<=30){
                    document.forms[x+'_form'].submit();
                }else{
                    alert('个人签名最长为30个字符！');
                    a.value=oldvalue;
                }

        }else{
            alert('所填个人签名不能为空！');
            a.value=oldvalue;
        }
    }


    a.style="background-color: #555;color:yellow";
    save.hidden="hidden";
    look.hidden="hidden";
    hint.hidden="hidden";
    tophint.hidden="";
    }
    </script>



</head>
<body>

<div class="dark-matter">
	<h1>个人基本资料
		<span>Please fill all the texts in the fields.</span>
	</h1>
	<center>

    <div style="width:800pt;height:350pt;border: 2pt solid ">
        <br>
        <div class="up-img-cover"  id="up-img-touch" >

            <img class="am-circle" alt="点击图片上传" src="{$imagename}" style="align-self: center" data-am-popover="{content: '点击上传', trigger: 'hover focus'}" >
        </div>



        <div id="lookData" >
            <x class="STYLE-NAME" style="text-align: center;align-content: center;" id="myform" >
                <table align="center" style="font-size: large;font-weight: 900;font-family: 楷体;color:  #D3D3D3">

                    <tr>
                        <td width="800" height="30" align="center" style="align-content: center">
                            <form action="/studySystem/updateRealname" method="post" id="realname_form" name="realname_form" >
                                <input type="text"  disabled="disabled"  style="background-color: #555;width:80pt;"></input>
                                <input type="text"  disabled="disabled"  style="width:50pt;background-color: #555;color:#D3D3D3" value="姓名 :"></input>
                                <input type="text"  id="realname" name="realname"   readonly="readonly" value="{$realname}" style="width=400pt;background-color: #555;color: yellow" ondblclick="edit('realname')">
                                <input type="text"  id="saverealname" hidden="hidden" value="保存"  readonly="readonly" style="width:35pt;background-color:green;color: black" onclick="save('realname','{$realname}')">
                                <input type="text"  id="lookrealname" hidden="hidden" value="取消"  readonly="readonly" style="width:35pt;background-color:cornflowerblue;color: black" onclick="look('realname')">

                            </form>
                        </td>
                    </tr>
                </table>
                <div type="text" style="color: red" id="realnamehint" hidden="hidden" >（提示：只能为中文,且不超过6个字符)</div>

                <br>
                <table align="center" style="font-size: large;font-weight: 900;font-family: 楷体;color:  #D3D3D3">
                    <tr>
                        <td width="800" height="30" align="center" style="align-content: center">
                            <form action="/studySystem/updateEmail" method="post" id="email_form" name="email_form">
                                <input type="text"  disabled="disabled"  style="background-color: #555;width:80pt;"></input>
                                <input type="text"  disabled="disabled"  style="width:50pt;background-color: #555;color: #D3D3D3" value="邮箱 :"></input>
                                <input type="text"  id="email" name="email"  readonly="readonly" value="{$email}" style="width=400pt;background-color: #555;color: yellow" ondblclick="edit('email')">
                                <input type="text"  id="saveemail" hidden="hidden" value="保存"  readonly="readonly" style="width:35pt;background-color:green;color: black" onclick="save('email','{$email}')">
                                <input type="text"  id="lookemail" hidden="hidden" value="取消"  readonly="readonly" style="width:35pt;background-color:cornflowerblue;color: black" onclick="look('email')">
                            </form>
                        </td>
                    </tr>
                </table>
                <div style="color: red" id="emailhint" hidden="hidden">（提示：格式为test@example.com,不可超过20个字符）</div>
                <br>


                <table align="center" style="font-size: large;font-weight: 900;font-family: 楷体;color:  #D3D3D3">
                    <tr>
                        <td width="800" height="30" align="center" style="align-content: center">
                            <form action="/studySystem/updateMessage" method="post" id="message_form" name="message_form">
                                <input type="text"  disabled="disabled"  style="background-color: #555;width:53pt;"></input>
                                <input type="text"  disabled="disabled"  style="width:77.5pt;background-color: #555;color: #D3D3D3" value="个人简介 :"></input>
                                <textarea id="message" name="message"  style="width:180pt;;background-color: #555;color: yellow" ondblclick="edit('message')">{$message}</textarea>
<!--                                <input type="text"  id="message" name="message"  style="width:180pt;;background-color: #555;color: yellow" value="{$message}" ondblclick="edit('message')">-->
                                <input type="text"  id="savemessage" hidden="hidden" value="保存"  readonly="readonly" style="width:35pt;background-color:green;color: black" onclick="save('message','{$message}')">
                                <input type="text"  id="lookmessage" hidden="hidden" value="取消"  readonly="readonly" style="width:35pt;background-color:cornflowerblue;color: black" onclick="look('message')">
                            </form>
                        </td>
                    </tr>
                </table>

                <div style="color: red" id="messagehint" hidden="hidden">（提示：不可超过30个字符）</div>
                <br>
            </x>
        </div>

            <div style="color: red" id="tophint">（提示：双击进行修改）</div>
        </center>
    </div>
</div>


<div><a style="text-align: center; display: block;"  id="pic"></a></div>

<!--图片上传框-->
<div class="am-modal am-modal-no-btn up-frame-bj " tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog up-frame-parent up-frame-radius">
	<div class="am-modal-hd up-frame-header">
	   <label>修改头像</label>
	  <a href="javascript: void(0)" id="closeUploadDiv" class="am-close am-close-spin" data-am-modal-close>&times;</a>
	</div>
	<div class="am-modal-bd  up-frame-body">
	  <div class="am-g am-fl">
		<div class="am-form-group am-form-file">
		  <div class="am-fl">
			<button type="button" class="am-btn am-btn-default am-btn-sm">
			  <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
		  </div>
		  <input type="file" id="inputImage">
		</div>
	  </div>
	  <div class="am-g am-fl" >
		<div class="up-pre-before up-frame-radius">
			<img alt="" src="" id="image" >
		</div>
		<div class="up-pre-after up-frame-radius">
		</div>
	  </div>
	  <div class="am-g am-fl">
		<div class="up-control-btns">
			<span class="am-icon-rotate-left"  onclick="rotateimgleft()"></span>
			<span class="am-icon-rotate-right" onclick="rotateimgright()"></span>
			<span class="am-icon-check" id="up-btn-ok" url="http://localhost/studySystem/uploadUserPhoto?uid={$uid}"></span>
		</div>
	  </div>
	  
	</div>
  </div>
</div>

<!--加载框-->
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
  <div class="am-modal-dialog">
	<div class="am-modal-hd">正在上传...</div>
	<div class="am-modal-bd">
	  <span class="am-icon-spinner am-icon-spin"></span>
	</div>
  </div>
</div>

<!--警告框-->
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
	<div class="am-modal-hd">信息</div>
	<div class="am-modal-bd"  id="alert_content">
			  成功了
	</div>
	<div class="am-modal-footer">
	  <span class="am-modal-btn" onclick="closeUploadDiv('{$imagename}')">确定</span>
	</div>
  </div>
</div>
<script src="/static/studySystem/js/jquery-1.8.3.min.js"></script>
<script src="/static/studySystem/js/amazeui.min.js" charset="utf-8"></script>
<script src="/static/studySystem/js/cropper.min.js" charset="utf-8"></script>
<script src="/static/studySystem/js/custom_up_img.js" charset="utf-8"></script>

</body>
</html>
