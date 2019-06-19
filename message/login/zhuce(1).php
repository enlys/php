<html>
<head>

<title>注册</title>
<link rel="shortcut icon" href="../q14.ico" type="image/x-icon" />
 <link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
   <script src="//apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="//apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style>
    body{
   
   width：100%；
   height: 100%;
   background-image: url(./images/bg3.jpg);
   background-repeat: no-repeat;
   background-size: 100% 100%;
}
#login{
    position: absolute;
    left:300px;
    top: 300px;
    height: 400px;
    font-weight: 300px;
    background-color: rgba(255,255,255,0.3);
    border-radius: 30px;
    padding: 20px;
    padding-left: 30px;
    font-size:16px;
    color: 	#FFFFFF;
    
}
#title{
    font-size:45px;
    color: 	#FFFFFF;
    font-style:italic; 
    text-align: center;
    margin-bottom: 20px;
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
    margin-bottom: 15px;
}
.zhaoyao{
    position: absolute;
    top: 450px;
    right: 200px;
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
    怎样才舒服，猫咪最在行。<p>——詹姆斯.赫略特</p>
    </div>
<div id="login">
    <div id="title">
        welcome
    </div>
<?php
include_once("index.php");
?>
<form name="form1" method="post" action="">
&nbsp;用&nbsp;户&nbsp;名：<input class="txt" type="text" name="user" size="20" ><p>
<p>
密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input class="txt" name="pwd" type="password" size="20" ><p>
确认密码：<input class="txt" name="pwd1" type="password" size="20" ><p>

邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：<input class="txt" name="email" type="text" size="20" ><p>
  	<input name="submit" type="submit" id="submit"  class="btn btn-primary btn-block" value="注册" />
</form>

<?php

if(isset($_POST["submit"]) && $_POST["submit"]=="注册"){
    if($_POST["user"]!=''&&$_POST["pwd"]!=''&&$_POST["email"]!=''){
      
		if($_POST["pwd"]==$_POST["pwd1"]){
			  if(preg_match("/\w{3,15}/",$_POST["user"])){
            if(preg_match('#[a-z0-9&\-_.]+@[\w\-_]+([\w\-.]+)?\.[\w\-]+#is',$_POST["email"] )){
                $user=$_POST["user"];
                $pwd=$_POST["pwd"];
                $email=$_POST["email"];
                $sql="insert into tb_user(user,pwd,email) values ("."'".$user."'".","."'".md5($pwd)."'"."," ."'".$email."'".")";
                echo $sql;
                $sql2="select * from tb_user where user="."'".$user."'"."and pwd="."'".md5($pwd)."'";
                $result2=mysqli_query($connID,$sql2);
               
                $rows= mysqli_num_rows($result2);
                if($rows>0){
                    echo "<script>alert(\"用户名被占用！\") </script>";
                }else{
                    $result=mysqli_query($connID,$sql);
                    if ($result) {
                        echo "<script>alert(\"注册成功！\") </script>";
                        echo "<script>window.location.href=\"login.php\"; </script>";
                    }else{
                        echo "注册失败！";
                    }
                    
                    
                }


            }else{
                echo "请输入正确邮箱地址！";

            }

        }else{
            echo "输入3-15位字符！";
        }
			
			
			}
			else{
				
				
				echo "两次密码输入不一样";
				}
			

    }else{
        echo "输入不能为空！";
    }

	
}
?>
</div>
</body>
</html>
