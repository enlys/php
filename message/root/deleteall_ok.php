<?php
echo $_POST['action'];
var_dump($_POST['chk']);
include_once("../conn/conn.php");
if($_POST['action'] == "热门内容"){						//判断是否执行删除操作
	if(count($_POST['chk']) <= 0){						//判断提交的删除记录是否为空
		echo "<script>alert('请选择记录');history.go(-1);</script>";
	}else{
		for($i = 0; $i < count($_POST['chk']); $i++){		//for语句循环读取复选框提交的值，
			$sqlstr = "delete from tb_liu where id = ".$_POST['chk'][$i];	//循环执行删除操作
            mysqli_query($connID,$sqlstr);						//执行删除操作
		}
		echo "<script>alert('删除成功');location='index.php';</script>";
	}

}
if($_POST['action'] == "图文分享"){						//判断是否执行删除操作
	if(count($_POST['chk']) <= 0){						//判断提交的删除记录是否为空
		echo "<script>alert('请选择记录');history.go(-1);</script>";
	}else{
		for($i = 0; $i < count($_POST['chk']); $i++){		//for语句循环读取复选框提交的值，
			$sqlstr = "delete from tb_tu where id = ".$_POST['chk'][$i];	//循环执行删除操作
            mysqli_query($connID,$sqlstr);						//执行删除操作
		}
		echo "<script>alert('删除成功');location='index.php';</script>";
	}

}
?>