<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include_once("index.php");							//连接数据库
if ($_GET['action'] == "热门内容"){							//判断是否执行删除
	$sqlstr1 = "delete from tb_liu where id = ".$_GET['id'];		//定义删除语句
	$result = mysqli_query($connID,$sqlstr1);				//执行删除操作
	if ($result){
		echo "<script>alert('删除成功');location='index.php';</script>";
	}else{
		echo "删除失败";
	}
}
if ($_GET['action'] == "图文分享"){							//判断是否执行删除
	$sqlstr1 = "delete from tb_tu where id = ".$_GET['id'];		//定义删除语句
	$result = mysqli_query($connID,$sqlstr1);				//执行删除操作
	if ($result){
		echo "<script>alert('删除成功');location='index.php';</script>";
	}else{
		echo "删除失败";
	}
}
?>
