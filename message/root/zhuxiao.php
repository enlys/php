<?php
session_start();

if(isset($_SESSION['user'])){		//判断SESSION变量的值是否存在
    //如果值不正确，则跳转到首页
    session_start();
    session_unset();
     session_destroy();
     echo  "<script>location='../login/login.php';</script>";
}
?>
