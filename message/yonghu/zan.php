<?php
session_start();			//初始化SESSION变量
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
	echo "<script>alert('您不具备访问本页面的权限!');window.location.href='../login/login.php';</script>";
}

include_once("../conn/conn.php");
$zan=0;
if($_GET['zan']==null){
    $zan=1;

}else{
    $zan=$_GET['zan']+1;
}
 
    $sqlstr = "update tb_liu set zan = ".$zan." where id = ".$_GET['action'];//定义更新语句
    $result = mysqli_query($connID,$sqlstr);//执行更新语句
    echo $sqlstr;
    if($result){
        echo "<script>window.location.href=\"index.php\"; </script>";
    }else{
        echo "<script>alert(\"修改失败！@_@\");window.location.href=\"index.php\"; </script>";
    }
?>