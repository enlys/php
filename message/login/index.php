<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$host = "127.0.0.1";									//MySQL服务器地址
$userName = "root";									//用户名
$password = "";									//密码
$dbName = "user";							//数据库名称
$connID = mysqli_connect($host, $userName, $password,$dbName);		//建立与MySQL数据库服务器的连接
//$conn=mysqli_select_db($connID, $dbName);
if($connID){					//选择数据库
}else{
    echo "<script>alert(\"数据库连接失败！@_@\"); </script>";
}
?>
