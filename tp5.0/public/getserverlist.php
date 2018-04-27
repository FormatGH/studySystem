<?php
header('Content-Type:application/json; charset=utf-8');
$SECURE_KEY="";



 $tStateRetMsg=array(
	"Success" => "成功",
	"QueryError" => "查询异常",
	"LoseParam" => "缺少参数",
	"SignError" => "签名错误",
	"LinkOverdue" => "链接已过有效期",
	"Other" => "CP其它定义"
);


function  get_con(){
    $host="118.89.138.175";
    $dbname="yunwei_dev";
    $port=3306;
    $username="root";
    $password="PIRr5zMQfNQ31dnkV26Zkl";

	try {
    	$conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    	return $conn;
	}
		catch(PDOException $e)
	{
    	return false;
	} 
}


function RetResult($state, $data, $msg)
{
    assert(is_integer($state));
    assert(is_string($data));
    assert(is_string($msg));

    //返回值
    $tRet = array(
        "state" => $state,
        "data" => $data,
        "msg" => $msg
    );

    //转化为json格式的字符串
    $szJsonStr = json_encode($tRet);

    echo $szJsonStr;
    return true;
}


function get_query_set($pid,$gid){
    global $tStateRetMsg;
    $conn = get_con();
	if(!$conn){
		RetResult(0,"",$tStateRetMsg['QueryError']);
		return false;
	}

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('set names utf8');
    $sql="SELECT `id` from game_gernal_server_list where chanel_id =? and game_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($pid, $gid));
    $result = $stmt->fetch();
    $server_list=array();
    if(!$result){
        return false;
    }
    $pgid = $result['id'];
    $sql2="SELECT  `name`,`game_id`,`game_contor_list`  from game_game;";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $res=$stmt2 ->fetchAll();
    if(!$res){
        $conn=null;
        return false;
    };

    foreach($res as $val){
        $game_control_list = json_decode($val['game_contor_list']);
        if($game_control_list){
            if(in_array($pgid,$game_control_list)){
                $server = array("dsid"=>$val['game_id'],"name"=>$val['name']);
                array_push($server_list,$server);
            }
        }
    }
    RetResult(0,$server_list,$tStateRetMsg['Success']);
    $conn=null;
    return true;
}

function  ValidParams($pid,$gid,$time,$sign){
    global $tStateRetMsg;
	if(empty($pid) || empty($gid) ||
	empty($time) || empty($sign) ){
		RetResult(0,'',$tStateRetMsg['LoseParam']);
		return false;
	}
	return true;
}



function test_input($data) {  //对提交过来的post/get 请求进行过滤
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$pid = test_input($_POST["pid"]);
	$gid = test_input($_POST["gid"]);
	$time = test_input($_POST["time"]);
	$ext = test_input($_POST["ext"]);
	$sign = test_input($_POST["sign"]);


	if(ValidParams($pid,$gid,$time,$sign))
	{
	    return get_query_set($pid,$gid);
	}



}else if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$pid = test_input($_GET["pid"]);
	$gid = test_input($_GET["gid"]);
	$time = test_input($_GET["time"]);
	$ext = test_input($_GET["ext"]);
	$sign = test_input($_GET["sign"]);

    if(ValidParams($pid,$gid,$time,$sign))
    {
        return get_query_set($pid,$gid);
    }
}
?>