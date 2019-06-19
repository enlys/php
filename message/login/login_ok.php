<?php

include_once("index.php");
date_default_timezone_set('PRC');
echo $_POST["yz"];
var_dump( $_POST["sss"]);
if(isset($_POST["submit"]) && $_POST["submit"]=="注册"){
    echo "<script>window.location.href=\"zhuce(1).php\"; </script>";
   
}
if(isset($_POST["submit"]) && $_POST["submit"]=="登录"){
    
    if($_POST["user"]!=''&&$_POST["pwd"]!=''){
        if( $_POST["yz"]==$_POST["sss"]){
            $user=$_POST["user"];
            $pwd=$_POST["pwd"];
            $sql="select * from tb_user where user="."'".$user."'"."and pwd="."'".md5($pwd)."'";
           
            $result=mysqli_query($connID,$sql);
          
            echo $sql;
          
            $rows= mysqli_num_rows($result);
        
            if($rows==1){
                session_start();
                $_SESSION['user']=$_POST["user"];
                $_SESSION['pass']=$_POST["pwd"];
                $_SESSION['time']=time();
                if($_POST["user"]!="root"){
                    echo "<script>alert(\"登录成功！@_@\");window.location.href=\"../yonghu/index.php\"; </script>";
                }else{
                    echo "<script>alert(\"登录成功！@_@\");window.location.href=\"../root/index.php\"; </script>";
                }
               
            }else{
               
                echo "<script>alert(\"用户名或密码错误！@_@\"); window.location.href=\"login.php\"; </script>";
            }

        }else{
            echo "<script>alert(\"验证码输入错误！@_@\"); window.location.href=\"login.php\"; </script>";
        }
       


    

    }else{
       
        echo "<script>alert(\"输入不能为空！@_@\"); window.location.href=\"login.php\"; </script>";
    }
   
}
?>