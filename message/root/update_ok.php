<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
include_once("../conn/conn.php");//包含数据库连接文件
//cho $_POST['nei'];
if($_POST['action'] == "update"&& $_POST['nei']=="热门内容"){
	if(!($_POST['username'] and $_POST['liuyan'] )){
		echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
	}else{
		$sqlstr = "update tb_liu set name = '".$_POST['username']."',liuyan = '".$_POST['liuyan']."' where id = ".$_POST['id'];//定义更新语句
		$result = mysqli_query($connID,$sqlstr);//执行更新语句
		if($result){
            echo "<script>alert(\"修改成功！@_@\");window.location.href=\"../root/index.php\"; </script>";
		}else{
            echo "<script>alert(\"修改失败！@_@\");window.location.href=\"../root/index.php\"; </script>";
		}
	}
}
if($_POST['action'] == "update"&& $_POST['nei']=="图文分享"){
	if(!($_POST['username'] and $_POST['liuyan'] )){
		echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
	}else{
		$sqlstr = "update tb_tu set name = '".$_POST['username']."',liuyan = '".$_POST['liuyan']."',src='".$_POST['src']."' where id = ".$_POST['id'];//定义更新语句
		$result = mysqli_query($connID,$sqlstr);//执行更新语句
		
		if($result){
            echo "<script>alert(\"修改成功！@_@\");window.location.href=\"../root/index.php\"; </script>";
		}else{
            echo "<script>alert(\"修改失败！@_@\");window.location.href=\"../root/index.php\"; </script>";
		}
	}
}
?>