<?php
session_start();

include_once("../conn/conn.php");
$sqlstr1 = "delete from tb_liu where id = ".$_GET['id'];		//定义删除语句
$result = mysqli_query($connID,$sqlstr1);				//执行删除操作
if ($result){
    echo "<script>alert('删除成功');location='index.php';</script>";
}else{
    echo "删除失败";
}
?>
