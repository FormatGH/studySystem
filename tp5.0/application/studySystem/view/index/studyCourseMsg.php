<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<script>
    window.onload=function () {
        file=document.getElementById('file');
        file.click();
    }

</script>
<body>

&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;《{$coursename}》--({$academy}) <br>
<?php
use app\studySystem\controller\Index;
$c=new Index();
for($i=1;$i<=$chapter;$i++){

    $cname=$c->getCName($cid,$i)['cname'];
    echo '&nbsp;&nbsp;' .$i . '、' . $cname . '<br>';
    $section=$c->getSection($cid,$i)['section'];
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

</body>
</html>