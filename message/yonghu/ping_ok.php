<?php
session_start();

include_once("../conn/conn.php");
 if(!$_POST['ping']){
    echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
}else{
    $ping=$_POST['jiu'].$_SESSION['user'].":".$_POST['ping']."/n";
    $sqlstr = "update tb_liu set ping = '".$ping."' where id = ".$_POST['id'];//定义更新语句
    $result = mysqli_query($connID,$sqlstr);//执行更新语句
    if($result){
        echo "<script>alert(\"修改成功！@_@\");window.location.href=\"index.php\"; </script>";
    }else{
        echo "<script>alert(\"修改失败！@_@\");window.location.href=\"index.php\"; </script>";
    }
}
?>