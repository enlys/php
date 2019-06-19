
<?php

session_start();			//初始化SESSION变量
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
	echo "<script>alert('您不具备访问本页面的权限!');window.location.href='../login/login.php';</script>";
}

?>
<html>

<head>

<title>修改留言</title>
<link rel="shortcut icon" href="../q14.ico" type="image/x-icon" />
 <link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
   <script src="//apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="//apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <style type="text/css">
#code 
{ 
font-family:Arial; 
font-style:italic; 
font-weight:bold; 
border:0; 
letter-spacing:2px; 
color:#FFF8DC; 
background-color:rgba(248,248,255,0.3);
} 
</style> 
  
<style>
body{
   
	width：100%；
	height: 100%;
	background-image: url(./images/bg10.jpg);
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
#login{
    position: absolute;
    left:800px;
    top: 300px;
    height: 500px;
    font-weight: 400px;
    background-color: rgba(0,0,0,0.6);
    border-radius: 30px;
    padding: 20px;
    padding-left: 30px;
    font-size:16px;
    color: #FFFACD;
    text-align: center;
}
#title{
    font-size:45px;
    color: #FFDEAD;
    font-style:italic; 
    text-align: center;
    margin-bottom: 30px;
    font-weight:bold;
}
.txt{
    
   
    width: 200px;
   
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: rgb(255,255,255);
    background-color: rgba(255,255,255,0);
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 25px;
    
}

.button{
    text-align: center;
}
.zhaoyao{
    position: absolute;
    top: 450px;
    left: 200px;
    height: 50px;
    weight:500px;
    font-size:25px;
    color: 	#FFFFFF;
    font-style:italic; 
    text-align: center;
    margin-bottom: 20px;
    font-weight:bold;
    
}
.zhaoyao p{
    font-size:14px;

    color: 	#FFFFFF;
    text-align: right;
}
</style>
</head>
<body>
<div class="zhaoyao">
与猫度过的时光从不会荒废。<p>——科莱特</p>
    </div>
<div id="login">
    <div id="title">
        welcome
    </div>
<?php

include_once("../conn/conn.php");
?>

<?php
 
    $sqlstr = "select * from tb_liu where id = " . $_GET['action']; //定义查询语句
    $result = mysqli_query($connID, $sqlstr); //执行查询语句
    $rows = mysqli_fetch_row($result); //将查询结果返回为数组
    ?>
    <form name="intFrom" method="post" action="update_ok.php">
      用户名：<input  class="txt" type="text" name="username" value="<?php echo $rows[1] ?>"></br></br>
      留言内容：<input  class="txt" type="text" name="liuyan" value="<?php echo $rows[2] ?>"></br></br>
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="nei" value="<?php echo $_GET['action'] ?>">
      <input type="hidden" name="id" value="<?php echo $rows[0] ?>">
      <input type="submit" name="Submit" class="btn btn-primary btn-lg" value="修改">
      <input type="reset" name="reset" class="btn btn-primary btn-lg" value="重置"></td>
    </form>

</div>
</body>
</html>