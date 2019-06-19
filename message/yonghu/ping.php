<html>
<head>
<?php

session_start();			//初始化SESSION变量
date_default_timezone_set('PRC');	
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
    //如果值不正确，则跳转到首页
echo "<script>alert('您不具备访问本页面的权限!');window.location.href='../login/login.php';</script>";
}

?>
<title>	Cat Message Board</title>
<link rel="shortcut icon" href="../q14.ico" type="image/x-icon" />
 <link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="index.css">
   <script src="//apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="//apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   </head>
   <style>
body{
   
	width：100%；
	height: 100%;
	background-image: url(./images/bg6.jpg);
	background-repeat: no-repeat;
	background-size: 100% 100%;
   overflow:hidden;
   margin: 0px;
    padding: 0px;
}
.person{
   text-align: right;
}
.liuyan{
    color:black;
    font-size: 28px;
    padding: 5px 15px;

}
.txt{
    
   
    width: 500px;
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
::-webkit-scrollbar {
        width:12px;
        background-color: rgba(255,255,255,0);
        }

        /* 滚动槽 */
        ::-webkit-scrollbar-track {
        border-radius:10px;
        }

        /* 滚动条滑块 */
        ::-webkit-scrollbar-thumb {
        border-radius:10px;
        background:rgba(0,238,238,0.3);
        }

</style>
<body>
<div class="topbar">
    <div class="con">
        <div class="topbar-zuo">
            
                <a href="">	Cat Message Board </a><span>|</span>
                <a href="">暹罗猫</a><span>|</span>
                <a href="">布偶猫</a><span>|</span>
                <a href="">苏格兰折耳猫 </a><span>|</span>
                <a href="">英国短毛猫 </a><span>|</span>
                <a href="">波斯猫 </a><span>|</span>
                <a href="">俄罗斯蓝猫</a><span>|</span>
                <a href="">挪威森林猫</a><span>|</span>
                <a href="">孟买猫 </a><span>|</span>
                <a href="">缅因猫</a><span>|</span>
                <a href="">埃及猫 </a><span>|</span>
                <a href="">土耳其梵猫</a>
            
        </div>
    </div>
</div>
<div class="header">
    <div class="con">
        <div class="header-log">
            <div class="lr">
            <a href="index.php" >Cat Message Board </a>&nbsp;
           
            </div>
        </div>
        <div class="header-nav">
        <a href="user.php"><?php


if(!isset($_SESSION['user'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
	echo "游客您好！";
}else{
	echo $_SESSION['user']." 您好!";
}

?> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-default btn-lg" href="zhuxiao.php"><?php


if(!isset($_SESSION['user'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
						
	echo "登录";
}else{
	
	echo "注销";
}

?></a>
        </div>
    </div>
</div>
<div class="title">
    详细内容
</div>
<?php
include_once("../conn/conn.php");
?>

<div class="seckill">
    <div class="conlist">
                <div  id="list" class="seckill-good">
                <?php
 
 $sqlstr = "select * from tb_liu where id = " . $_GET['action']; //定义查询语句
 $result = mysqli_query($connID, $sqlstr); //执行查询语句
 $rows = mysqli_fetch_row($result); //将查询结果返回为数组
 ?>
 <div class="liuyan">
      <p class="liuyan"><a href=""><span class="glyphicon glyphicon-user"></span><?php echo $rows[1] ?></p></a>
     <p> <span class="glyphicon glyphicon-book"></span><?php echo $rows[2] ?></p>
     </div>
     <?php
     if($rows[6]==null){
        ?>
         <form name="form1" method="post" action="ping_ok.php">
         评论：<input  class="txt" type="text" name="ping" size="50"  >
         <input type="hidden" name="id" value="<?php echo $rows[0] ?>">
         <input type="hidden" name="jiu" value="<?php echo $rows[6] ?>">
         <input type="submit" name="Submit" class="btn btn-primary " value="评论">
         </form>

 <?php
     }else{
         $pingarr=explode("/n",$rows[6]);
        foreach($pingarr as $ping){
            echo  $ping;
            echo "</br>";
        }
        ?>
         <form name="form1" method="post" action="ping_ok.php">
         评论：<input  class="txt" type="text" name="ping" size="50"  >
         <input type="hidden" name="id" value="<?php echo $rows[0] ?>">
         <input type="hidden" name="jiu" value="<?php echo $rows[6] ?>">
         <input type="submit" name="Submit" class="btn btn-primary " value="评论">
         </form>

        <?php
     }
    ?>

                </div>                                   
    </div>
</div>
<?php

?>
<div class="topbar bottom">
    <div class="con">
        <div class="topbar-zuo">
            
                <a href="">	Cat Message Board </a><span>|</span>
                <a href="">  关于我们 </a><span>|</span>
                <a href="">友情链接</a><span>|</span>
                <a href="">广告服务 </a><span>|</span>
                <a href=""> 版权说明</a><span>|</span>
                <a href="">网站地图  </a><span>|</span>
                <a href="">最近更新 </a>

                <a href="">【免责声明：本站所有猫猫交易信息内容系用户自行发布，其真实性、合法性由发布人负责，本站不提供任何保证，亦不承担任何法律责任！】 </a>
        </div>
    </div>
</div>
</body>
</html>