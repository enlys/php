<html>
<head>

<title>登录</title>
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
	background-image: url(./images/bg1.jpg);
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
#login{
    position: absolute;
    right:300px;
    top: 300px;
    height: 400px;
    font-weight: 300px;
    background-color: rgba(255,250,205,0.3);
    border-radius: 30px;
    padding: 20px;
    padding-left: 30px;
    font-size:16px;
    color: #FFFACD;
    
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
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
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
世界上有两种东西是完美无缺的，一是时钟，一是猫。<p>——爱弥尔.奥古斯特.夏提埃</p>
    </div>
<div id="login">
    <div id="title">
        welcome
    </div>
<?php
session_start();
include_once("index.php");
?>
<form name="form1" method="post"action="login_ok.php">
&nbsp;用&nbsp;户&nbsp;名：<input  class="txt" type="text" name="user" size="20"  ><p>
<p>
密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input class="txt" name="pwd" type="password" size="20" ><p>
验&nbsp;证&nbsp;码：<input  class="txt" type = "text"  name="yz"size="15"  id = "input"/> 
<input  type = "text" size="4" name="sss" readonly="true"  id="code" value=<?php
$code = ""; 
$codeLength = 4;//验证码的长度 

 $random = Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R', 
'S','T','U','V','W','X','Y','Z');
for( $i = 0; $i < $codeLength; $i++) {
$index = rand(0,35);
$code=$code.$random[$index];
} 
echo $code;
?> /> <p>
  	<div class="button">
      <input name="submit" type="submit" id="submit"  class="btn btn-primary btn-lg " value="登录" />
      <input name="submit" type="submit" id="submit"  class="btn btn-primary btn-lg" value="注册" />
      </div>
</form>


</div>
</body>
</html>
