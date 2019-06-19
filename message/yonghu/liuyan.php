<?php

session_start();			//初始化SESSION变量
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
	echo "<script>alert('您不具备访问本页面的权限!');window.location.href='../login/login.php';</script>";
}

?>
<html>

<head>

<title>留言</title>
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
	background-image: url(./images/bg7.jpg);
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
<form name="form1" method="post" action="">
&nbsp;用&nbsp;户&nbsp;名：</br><input type="text" class="txt" name="user" size="20" ><p>
<p></br>


留&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;言：</br><p>

<textarea  class="txt" name="pwd"  cols="2"   rows="6"   style="OVERFLOW:   hidden"></textarea>
      <input name="submit" type="submit" id="submit"  class="btn btn-primary  btn-block" value="提交" />
      
     
</form>
<?php
if(isset($_POST["submit"]) && $_POST["submit"]=="提交"){
    if($_POST["user"]!=''&&$_POST["pwd"]!=''){
        $user=$_POST["user"];
        $pwd=$_POST["pwd"];
       $sql="insert into tb_liu(name,liuyan,userid) values ("."'".$user."'".","."'".$pwd."'".","."'".$_SESSION['user']."'".")";
             
       
        $result=mysqli_query($connID,$sql);
      
       
       
        if($result){
            echo "<script>alert(\"留言成功！\") </script>";
    echo "<script>window.location.href=\"index.php\"; </script>";
        }else{
            echo "留言失败";
        }
    }
}
?>

</div>
</body>
</html>