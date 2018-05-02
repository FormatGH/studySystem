<?php
namespace app\studySystem\controller;
use app\studySystem\model\Academy;
use app\studySystem\model\Course;
use app\studySystem\model\SCourse;
use think\Request;
header('Content-type:text/html;charset=utf-8');
ob_start();
session_start();

use app\studySystem\model\UserData;
use think\Controller;
use think\exception\ErrorException;
use app\studySystem\model\User;


class Index extends Controller
{
    use \traits\controller\Jump;
    /*
     * 首页
     */
    public function index()
    {
      return view('index');
     }

     /*
      * 登录
      */
    public function login()
    {
        return view("login");
    }

    /*
     * 检查登录信息
     */
    public function checklogin(){

        try{
            $username=$_POST['uname'];
            $password=$_POST['password'];
            $usertype=$_POST['utype'];
            if($username=="" || $username==null || $password=="" || $password==null || $usertype=="" || $usertype==null){
                return $this->redirect('/studySystem/login');
            }else{
                $user=new User($username,$password,$usertype);
                $result=$user->checklogin();
                if($result['status']==0){
                    $_SESSION['myuser']=serialize($user);
                    $_SESSION['uid']=$result['uid'];
                    return $this->redirect('/studySystem/userHome');
                }else{

                    $this->error($result['message'],'/studySystem/login');
                }
            }
        }catch (ErrorException $e){
            echo $e;
            return $this->redirect('/studySystem/login');
        }

    }

    /*
    * 注册页面
    */
    public function register(){
        return view('register');
    }

    /*
     * 注册用户操作
     */
    public function addUser(){
        $username=$_POST['uname'];
        $password=$_POST['password'];
        $usertype=$_POST['utype'];
        $user=new User($username,$password,$usertype);
        $result=$user->register();
        if($result['status']==1){
            return $this->success($result['message'],'/studySystem/login');
        }else{
            $this->error($result['message']);
        }

    }

    /*
     * 退出
     */
    public function logout(){
        if(isset($_SESSION['uid'])){
            unset($_SESSION['uid']);
        }
        if(isset($_SESSION['myuser'])){
            unset($_SESSION['myuser']);

            return $this->redirect('/studySystem/login');
        }
    }

    /*
     * 个人中心
     */
    public function userHome()
    {
       if (!isset($_SESSION['myuser'])){
            return $this->redirect('/studySystem/login');
       }
        return view("userHome");
    }

    /*
     * 个人首页顶部
     */
    public function userHomeHead(){
        return view("userHomeHead");
    }

    /*
     * 查看个人基本资料
     */
    public function lookBasicData(){
        return view('lookBasicData');
    }

    public function getUserData($uid){
        $userdata=new UserData();
        $data=$userdata->getUserData($uid);
        return $data;
    }

    public function getUserData2(){
        $userdata=new UserData();
        $data=$userdata->getUserData2();
        return json_encode(
            array(
                'state'=>1,
                'data' =>$data['data'],
            )
        );
    }

    /*
     * 编辑个人基本资料
     */
    public function editBasicData(){
        return view('editBasicData');
    }

    /*
     * 更新个人头像
     */
    public function uploadUserPhoto()
    {
        if(isset($_SESSION['myuser'])){
        $user=unserialize($_SESSION['myuser']);
        $uid=input('uid');
        $image=$_POST['image'];
        $new_file="";
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $image, $result))
        {
            $filename= uniqid() . "." . $result[2];
            $new_file = "D:\\PHPstudy\\PHPTutorial\\WWW\\studySystem\\tp5.0\\public\\static\\studySystem\\img\\upload\\" .$filename;
            if(file_exists($new_file)){
                unlink($new_file);
            }
            $data=str_replace($result[1],'',$image);
            $data=base64_decode($data);
            file_put_contents($new_file,$data);
            $userdata=new UserData;
            $userdata->updatePhoto($uid,$filename);



            //$userdata->updatePhoto(uid)
        }
        echo json_encode(array(
            'result' => 'ok',
            'filename'=>$new_file,
            'username'=>$user->uname,
            'endstr'=>$filename,
            'uid'=>$uid,
        ));


        }

    }


    /*
     * 更新姓名
     */
    public function updateRealname(){
        $realname=$_POST['realname'];
        $uid=$_SESSION['uid'];
        $userdata=new UserData();
        $result=$userdata->updateRealname($uid,$realname);
        if($result){
            $_SESSION['updateresult']='更新成功！';
        }else{
            $_SESSION['updateresult']='更新失败！';
        }
        return view('lookBasicData');
    }

    /*
    * 更新邮箱
    */
    public function updateEmail(){
        $email=$_POST['email'];
        $uid=$_SESSION['uid'];
        $userdata=new UserData();
        $result=$userdata->updateEmail($uid,$email);
        if($result){
            $_SESSION['updateresult']='更新成功！';
        }else{
            $_SESSION['updateresult']='更新失败！';
        }
        return view('lookBasicData');
    }

    /*
    * 更新个人简介
    */
    public function updateMessage(){
        $message=$_POST['message'];
        $uid=$_SESSION['uid'];
        $userdata=new UserData();
        $result=$userdata->updateMessage($uid,$message);
        if($result){
            $_SESSION['updateresult']='更新成功！';
        }else{
            $_SESSION['updateresult']='更新失败！';
        }
        return view('lookBasicData');
    }

    /*
 * 更新姓名
 */
    public function updateUserAcademy(){
        $realname=$_POST['realname'];
        $number=$_POST['number'];
        $uid=$_SESSION['uid'];
        $academy=$_POST['academy'];
        $userdata=new UserData();
        $result=$userdata->updateAcademy($uid,$realname,$number,$academy);
        if($result){
            $_SESSION['updateresult']='更新成功！';
        }else{
            $_SESSION['updateresult']='更新失败！';
        }
        return view('lookUserAcademy');
    }

    public function lookUserAcademy(){

        return view('lookUserAcademy');
    }

    public function editUserAcademy(){

        return view('editUserAcademy');
    }

    public function uploadFileForm(Request $request){
        $index=new Index();
        if($request->isPost()){
            $cid=$_POST['cid'];
            $course=$index->getCourseByCid($cid);
            $chapter=$course['chapter'];
            $select=$_POST['select'];
            if($select=='chapter'){

                $opt = '<option>--请选择章数--</option>';
                for($i=1;$i<=$chapter;$i++){
                    $cname=$index->getCName($cid,$i)['cname'];
                    $opt .= "<option value='{$i}'>第{$i}章({$cname})</option>";
                }
                echo json_encode($opt);
            }else if($select=='section'){
                $post_chapter=$_POST['chapter'];
                $section=$index->getSection($cid,$post_chapter)['section'];
                $opt = '<option>--请选择节数--</option>';
                for($i=1;$i<=$section;$i++){
                    $sname=$index->getSName($cid,$post_chapter,$i)['sname'];
                    $opt .= $sname;
                    $opt .= "<option value='{$i}'>第{$post_chapter}-{$i}节 ({$sname})</option>";
                }
                echo json_encode($opt);

            }


//            echo json_encode(array(
//                'chapter' => $chapter));
        }else{
//            $c=new Course();
//            $tid=$_SESSION['uid'];
//            $courses=$c->getCourses($tid)['data'];
//            $this->assign('courses',$courses);
//            $this->display();
            //var_dump($courses);
            return view('uploadFileForm');
        }


    }

    // 课程图片上传提交
    public function uploadFile2(Request $request)
    {
// 获取表单上传文件
        $file=$_FILES['file'];
        if (empty($file)) {
            $this->error('请选择上传文件');
        }

        $cid=$_POST['coursename'];
        $chapter=$_POST['chapter'];
        $section=$_POST['section'];
        $course=$this->getCourseByCid($cid);
        $coursename=$course['coursename'];
        $academy=$course['academy'];
        $cname=$this->getCName($cid,$chapter)['cname'];
        $sname=$this->getSName($cid,$chapter,$section)['sname'];
        $dir=$coursename . "(" . $academy . ")";
        $ftype=$_POST['ftype'];
        $returnaddr=$_POST['returnaddr'];
        $types=explode('/',$_POST['ftypes']);
        //var_dump($types);


//        $str=$coursename.str_split('(');
//        $cname=$str[0];
//        echo $cname . '<br>';
//        echo $coursename;

        $filename=$_FILES['file']['name'];

        $endstr=explode('.',$filename)[1];
        if(! in_array($endstr,$types)){
            echo "<script>alert('文件只允许" . $_POST['ftypes'] . "这些格式')</script>";
            $this->assign('ftype',$_POST['ftype']);
            return $this->redirect($returnaddr);
        }
        //$filename=$chapter . "-" . $section;
        $tmp_name=$_FILES['file']['tmp_name'];
        $filetype=$_FILES['file']['type'];
        $uid=$_SESSION['uid'];


//        $file = $request->file('file');
//        $filename = $file->getInfo('name');


// 移动到框架应用根目录/public/upload/ 目录下

//        echo $filename;
//        echo "<br>";
//
//        echo $tmp_name;
//        echo "<br>";
//        echo ROOT_PATH;
//        echo DS;
        $path=ROOT_PATH . 'public' . DS . 'static' . DS . 'studySystem'. DS . 'upload'. DS .$uid .DS . $dir .DS  . "第" . $chapter ."章-" . $cname .DS .
            $chapter . "-" . $section . $sname;
        if(!is_dir(iconv("UTF-8", "GBK", $path))){

            $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);
        }
       $info=move_uploaded_file($tmp_name,iconv("UTF-8", "GBK", $path . DS) .iconv("UTF-8", "GBK",$filename ));
        $this->addCourseFile($cid,$chapter,$section,$filename,$ftype);
        return $this->redirect($returnaddr);
        //        //$info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'studySystem'. DS . 'upload'  );
//        if ($info) {
//            $this->success('文件上传成功：' . $info->getRealPath());
//        } else
//// 上传失败获取错误信息
//            $this->error($file->getError());
//        }
    }

    public function getCourse($tid,$coursename,$academy){
        $course=new Course();
        $data=$course->getCourse($tid,$coursename,$academy);
        return $data;
    }

    public function getCourseByCid($cid){
        $course=new Course();
        $data=$course->getCourseByCid($cid)['data'];
        return $data;
    }

    public function getSection($cid,$chapter){
        $course=new Course();
        $data=$course->getSection($cid,$chapter);
        return $data;
    }

    public function addCourseForm(){
        return view('addCourseForm');
    }

    public function addCourse(){

        $tid=$_POST['tid'];
        $coursename=$_POST['coursename'];
        $academy=$_POST['academy'];
        $chapter=$_POST['chapter'];

        $course = new Course();
        $result=$course->addCourse($tid,$coursename,$academy,$chapter);
        if($result){
            //echo "<script>alert('新增成功！')</script>";

            echo '  课程名:《' . $coursename  . '》  ';
            echo '章节数：' . $chapter . '<br>';
            $data=$course->getCid($tid,$coursename,$academy);
            $cid=$data['cid'];
            echo 'cid：' . $cid;
            for($i=1;$i<=$chapter;$i++){

                $section=$_POST['c' . $i . '_s'];

                $cname=$_POST['c' . $i];
                echo '第' . $i . '章:' . $cname . '，有' . $section . '节<br>';
                for($j=1;$j<=$section;$j++){
                    $sname=$_POST['c' . $i . '_s' . $j .'_name'];
                    echo '  ' . $sname . '<br>';


                    //echo $data['cid'];
                    $r=$course->addCourseMsg($cid,$i,$cname,$j,$sname);
                    if($r){
                        echo "<script>alert('新增成功！')</script>";
                    }else{
                        echo "<script>alert('新增失败！')</script>";
                    }
                }
            }


            //return view('addCourseForm');
        }else{
            echo "<script>alert('新增失败！')</script>";
        }


//        $course = new Course();
//        $result=$course->addCourse($coursename,$tid,$academy);
//        if($result){
//            echo "<script>alert('新增成功！')</script>";
//            return view('addCourseForm');
//        }else{
//            echo "<script>alert('新增失败！')</script>";
//        }
    }

    public function getCid($tid,$coursename,$academy){
        $course = new Course();
        $data=$course->getCid($tid,$coursename,$academy);
        return $data;
    }

    public function getCName($cid,$chapter){
        $course = new Course();
        $data=$course->getCName($cid,$chapter);
        return $data;
    }

    public function getSName($cid,$chapter,$section){
        $course = new Course();
        $data=$course->getSName($cid,$chapter,$section);
        return $data;
    }

    public function lookTCourse(){
        return view('lookTCourse');
    }

    public function getCourses($tid){
        $course=new Course();
        $data=$course->getCourses($tid);
        return $data;
    }

    public function lookTCourseFile(){
    $cid=$_GET['cid'];
    $course=$this->getCourseByCid($cid);
    $coursename=$course['coursename'];
    $academy=$course['academy'];
    $tid=$_SESSION['uid'];
    $chapter=$course['chapter'];
//        var_dump($course);
//        echo $cid;
//        echo $academy;
//        echo $coursename;
    $this->assign('cid',$cid);
    $this->assign('tid',$tid);
    $this->assign('coursename',$coursename);
    $this->assign('academy',$academy);
    $this->assign('course',$course);
    $this->assign('chapter',$chapter);
    return view('lookTCourseFile');
}

    public function lookTCourseVideo(){
        $cid=$_GET['cid'];
        $course=$this->getCourseByCid($cid);
        $coursename=$course['coursename'];
        $academy=$course['academy'];
        $tid=$_SESSION['uid'];
        $chapter=$course['chapter'];
//        var_dump($course);
//        echo $cid;
//        echo $academy;
//        echo $coursename;
        $this->assign('cid',$cid);
        $this->assign('tid',$tid);
        $this->assign('coursename',$coursename);
        $this->assign('academy',$academy);
        $this->assign('course',$course);
        $this->assign('chapter',$chapter);
        return view('lookTCourseVideo');
    }

    public function lookCourseMsg(){
        $cid=$_GET['cid'];
        $course=$this->getCourseByCid($cid);
        $coursename=$course['coursename'];
        $academy=$course['academy'];
        $tid=$_SESSION['uid'];
        $chapter=$course['chapter'];

        $this->assign('cid',$cid);
        $this->assign('tid',$tid);
        $this->assign('coursename',$coursename);
        $this->assign('academy',$academy);
        $this->assign('course',$course);
        $this->assign('chapter',$chapter);
        return view('lookCourseMsg');
    }


    public function addCourseFile($cid,$chapter,$section,$filename,$filetype)
    {
        $c=new Course();
        $c->addCourseFile($cid,$chapter,$section,$filename,$filetype);
    }

    /*
 * 获取所有学院
 */
    public function getAcademy()
    {
        $a=new Academy();
        $academy=$a->getAcademy();
        return $academy;
    }


    public  function getCourseFile($cid,$chapter,$section,$filetype){
        $c=new Course();
        $result=$c->getCourseFile($cid,$chapter,$section,$filetype);
        return $result;
    }

    public function searchCourseForm(){
        return view('searchCourseForm');
    }

    public function addSCourse()
    {
        $sc=new SCourse();
        $sid=$_GET['sid'];
        $cid=$_GET['cid'];
        $sc->addSCourse($sid,$cid);
        echo '<script>alert("选课成功！")</script>';
        return view('searchCourseForm');
    }

    public function searchCourse(){
        //echo json_encode('xxx');
        $uid=$_SESSION['uid'];
        $course=new Course();
        $search=$_POST['search'];
        $value=$_POST['value'];
        $post_academy=$_POST['academy'];
        $result=$course->searchCourse($post_academy,$search,$value);
        $str='';
        if($result['status']){

        for($i=0;$i<count($result['result']);$i++){
            $coursename=$result['result'][$i]['coursename'];
            $academy=$result['result'][$i]['academy'];
            $tid=$result['result'][$i]['tid'];
            $userdata=$this->getUserData($tid);
            $teacher=$userdata['realname'];
            $cid=$result['result'][$i]['cid'];
            $str .='
           <div id="edit" align="center" style="margin-left:5%;margin-top:2%;float: left; align-self:center;width:200pt;height:220pt;border: 2pt solid ;font-size:14pt;font-family: 楷体; font-weight: 600;text-align: left;talign-content: center">
        
                <label style="color: yellow;">
                    <center>
                        <img src="/static/studySystem/img/logBanner.png" style="margin-top:5%;height: 90pt;width: 90pt;">

                    </center>
                    <br>
                    <a href="/studySystem/LookCourseMsg?cid=' . $cid  . '" target="_blank">
                    
                    
                    <x style="color: #D3D3D3;text-align: left" >&nbsp;&nbsp;课程名:</x>
                    《'. $coursename . '》
                    </a>
                    <br>
                    <a href="/studySystem/lookAcademyMsg?academy=' . $academy  . '" target="_blank">
                    <x style="color: #D3D3D3">&nbsp;&nbsp;学院:</x>
                    '. $academy . '
                    </a>
                    <a href="/studySystem/lookTeacherMsg?tname=' . $teacher  . '" target="_blank">
                    <br>
                        <x style="color: #D3D3D3;text-align: left">&nbsp;&nbsp;教师:</x>
                    '. $teacher . '
                    </a>
                    <br>

                    <br>
                    &nbsp;&nbsp;
                    <button style="	background: #FFCC02;
			border: none;
			padding: 5px 20px 5px 20px;
			color: #585858;
			border-radius: 4px;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			text-shadow: 1px 1px 1px #FFE477;
			font-weight: bold;
			box-shadow: 1px 1px 1px #3D3D3D;
			-webkit-box-shadow:1px 1px 1px #3D3D3D;
			-moz-box-shadow:1px 1px 1px #3D3D3D;">
                     <a style="color: black" href="/studySystem/addSCourse?sid=' . $uid . '&cid=' . $cid . '">加入我的课程</a>
                    </button>

                </label>
        </div>
        ';
        }

        }else{
            $str=$result['result'];
        }
//
//        <br>
//                    &nbsp;
//        <a style="font-size: small;font-family: \'Microsoft Yahei\'" href="/studySystem/LookTCourseFile?cid=' . $cid  . '" target="_blank"><文件资料</a>
//                    <a href="/studySystem/LookCourseMsg?cid=' . $cid  . '" target="_blank" style="color:red;font-size: small;font-family: \'Microsoft Yahei\'">课程大纲</a>
//
//                        <a style="font-size: small;font-family: \'Microsoft Yahei\'" href="/studySystem/LookTCourseVideo?cid=' . $cid  . '">视频资料></a>
//                    <br>

       echo json_encode(
            $str
        );
    }

    public function lookSCourse(){
        $sc=new SCourse();
        $sid=$_SESSION['uid'];
        $scourse=$sc->getSCourse($sid);

            $this->assign('scourse',$scourse);
            return view('lookSCourse');

//        $cid=$_GET['cid'];
//        $course=$this->getCourseByCid($cid);
//        $coursename=$course['coursename'];
//        $academy=$course['academy'];
//        $tid=$_SESSION['uid'];
//        $chapter=$course['chapter'];
//
//        $this->assign('cid',$cid);
//        $this->assign('tid',$tid);
//        $this->assign('coursename',$coursename);
//        $this->assign('academy',$academy);
//        $this->assign('course',$course);
//        $this->assign('chapter',$chapter);
//        return view('lookCourseMsg');
    }

    public function studyCourse()
    {
        $cid=$_GET['cid'];
        echo $cid;
        $sid = $_SESSION['uid'];
        $course=$this->getCourseByCid($cid);
        $this->assign('course', $course);
        $this->assign('cid', $cid);
        return view('studyCourse');

//        $scourse = $sc->getSCourse($sid);
//
//        $this->assign('scourse', $scourse);
//        return view('lookSCourse');
    }

    function sGetSection(){

        $cid=$_POST['cid'];
        $post_chapter=$_POST['chapter'];
        $section=$this->getSection($cid,$post_chapter)['section'];
        $opt = '<option>--请选择节数--</option>';
        for($i=1;$i<=$section;$i++) {
            $sname = $this->getSName($cid, $post_chapter, $i)['sname'];
            $opt .= $sname;
            $opt .= "<option value='{$i}'>第{$post_chapter}-{$i}节 ({$sname})</option>";
        }
        echo json_encode($opt);
    }

    function studyVideo(){
    $cid=$_GET['cid'];
    $chapter=$_GET['chapter'];
    $section=$_GET['section'];
    $course=$this->getCourseByCid($cid);
    $tid=$course['tid'];
    $coursename=$course['coursename'];
    $academy=$course['academy'];
    $cname=$this->getCName($cid,$chapter)['cname'];
    $sname=$this->getSName($cid,$chapter,$section)['sname'];
    $filename=$this->getCourseFile($cid,$chapter,$section,'video')['filename'];
    $src="/static/studySystem/upload/". $tid . "/". $coursename . "(" . $academy . ")/第" . $chapter . "章-" . $cname ."/" .$chapter ."-" .$section .$sname  . "/" . $filename;
    $this->assign('src',$src);
    return view('studyVideo');

    }

    function studyFile(){
        $cid=$_GET['cid'];
        $chapter=$_GET['chapter'];
        $section=$_GET['section'];
        $course=$this->getCourseByCid($cid);
        $tid=$course['tid'];
        $coursename=$course['coursename'];
        $academy=$course['academy'];
        $cname=$this->getCName($cid,$chapter)['cname'];
        $sname=$this->getSName($cid,$chapter,$section)['sname'];
        $filename=$this->getCourseFile($cid,$chapter,$section,'file')['filename'];
        $src="/static/studySystem/upload/". $tid . "/". $coursename . "(" . $academy . ")/第" . $chapter . "章-" . $cname ."/" .$chapter ."-" .$section .$sname  . "/" . $filename;
        $this->assign('src',$src);
        return view('studyFile');

    }

    function studyCourseMsg(){
        $cid=$_GET['cid'];
        $course=$this->getCourseByCid($cid);
        $chapter=$course['chapter'];
        $coursename=$course['coursename'];
        $academy=$course['academy'];
        $this->assign('cid',$cid);
        $this->assign('coursename',$coursename);
        $this->assign('academy',$academy);
        $this->assign('chapter',$chapter);
        return view('studyCourseMsg');

    }

    function showPage($page,$totalPage,$where=null,$sep="&nbsp;"){
        $p="";
        $where=($where==null)?null:"&".$where;
        $url = $_SERVER ['PHP_SELF'];
        $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
        $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
        $prevPage=($page>=1)?$page-1:1;
        $nextPage=($page>=$totalPage)?$totalPage:$page+1;
        $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
        $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
        $str = "总共{$totalPage}页/当前是第{$page}页";

        for($i = 1; $i <= $totalPage; $i ++) {
            //当前页无连接
            if ($page == $i) {
                $p .= "[{$i}]";
            } else {
                $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
            }
        }
        $pageStr=$str.$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
        return $pageStr;
    }


    public function test(){
      return view('test');
    }

}

ob_end_flush();
