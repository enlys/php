<?php

session_start();			//初始化SESSION变量
date_default_timezone_set('PRC');	
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
	echo "<script>alert('您不具备访问本页面的权限!');window.location.href='../login/login.php';</script>";
}

?>
<html>
<head>

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
.sou{
    padding-top: 5px;
    padding-left: 20px;
    font-size: 20px;
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
.seckill-good .li{

    float: left;
   width:300px;
	height:200px;
	
	background-repeat: no-repeat;
	background-size: 100% 100%;
    border: 1px solid white;
    margin-right: 7px;
    margin-bottom: 7px;
    margin-top: 13px;
    border-radius: 40px;
	padding:0;
}
.info{
	width:300px;
	height:125px;
	 background-color: rgba(255,255,255,0.3);
	 margin-top:75px;
	 padding-left:20px;
	 padding-right:20px;
	 border-radius:0 0 40px 40px;
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
            <div class="lr">	个人中心&nbsp;&nbsp; <a href="index.php" >Cat Message Board
          
            </div>
        </div>
        <div class="header-nav">
       <a href=""><?php


if(!isset($_SESSION['user'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
}else{
	echo $_SESSION['user']." 您好!";
}

?> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-default btn-lg" href="zhuxiao.php"><?php


if(!isset($_SESSION['user'])){		//判断SESSION变量的值是否存在
						//如果值不正确，则跳转到首页
}else{
	
	echo "注销";
}

?></a>
        </div>
    </div>
</div>
<div class="title">
    我的留言
</div>
<?php
include_once("../conn/conn.php");
?>

<div class="seckill">
    <div class="conlist">
                <div  id="list" class="seckill-good">
                    <ul>
<?php
 
  
      $str=$_SESSION['user'];											
	$pagesize = 6;									//每页显示记录数
    $sqlstr = "select * from tb_tu WHERE userid= '".$str."'  order by id desc";//定义查询语句
    //echo $sqlstr;
    $total = mysqli_query($connID,$sqlstr);//执行查询语句
   
    if($total!=false){

    $totalNum = mysqli_num_rows($total);					//总记录数
    if( $totalNum>0){
	$pagecount = ceil($totalNum/$pagesize);						//总页数
	(!isset($_GET['page']))?($page = 1):$page = $_GET['page'];				//当前显示页数
	($page <= $pagecount)?$page:($page = $pagecount);//当前页大于总页数时把当前页定义为总页数
	$f_pageNum = $pagesize * ($page - 1);								//当前页的第一条记录
	$sqlstr1 = $sqlstr." limit ".$f_pageNum.",".$pagesize;//定义SQL语句，通过limit关键字控制查询范围和数量
	$result = mysqli_query($connID,$sqlstr1);								//执行查询语句
    while ($rows = mysqli_fetch_array($result)){									//循环输出查询结果
?>
                        <li class="li" style="background-image: url(<?php echo $rows[2];?>);">
                           
                           
                            <div class="info">
                                        <a href="" class="name">作者:<?php echo $rows[1];?></a> 
                                        <p class="tips">留言:<?php echo mb_substr($rows[3],0,30,"utf-8") ;
  ?></p>
                                       
                                        <p class="person">时间:<?php
										$time1 = strtotime($rows[4]);
										$time2 = strtotime('now');
										$time3 = $time2 - $time1;
										$time4=$time3/(60*60);
										if($time4<1){
											echo ceil($time3/60)."分钟前";
											}else if($time4<=24){
												echo ceil($time3/(60*60))."小时前";
												}else if($time4<720){
													echo ceil($time3/(60*60*24))."天前";
													}else if($time4<259200){
														echo ceil($time3/(60*60*24*30))."个月前";
														}else{
															echo  $rows[4];
															}

                                        ?></p>
                                           <a href=tuupdate.php?action=<?php echo $rows[0];?>>修改</a>/<a href=tudelete.php?action=<?php echo $rows[0];?> >删除</a></td>
                                       
                                </div>
                            
                           
                        </li>  
                        <?php	
    }

?>
                    </ul>

                </div>                                   
    </div>
</div>
<div class="tag"><?php
    echo "共".$totalNum."条留言&nbsp;&nbsp;";
	echo "第".$page."页/共".$pagecount."页&nbsp;&nbsp;";
	if($page!=1){//如果当前页不是1则输出有链接的首页和上一页
	    echo "<a href='?page=1'>首页</a>&nbsp;";
		echo "<a href='?page=".($page-1)."'>上一页</a>&nbsp;&nbsp;";
	}else{//否则输出没有链接的首页和上一页
	    echo "首页&nbsp;上一页&nbsp;&nbsp;";
	}
	if($page!=$pagecount){//如果当前页不是最后一页则输出有链接的下一页和尾页
	    echo "<a href='?page=".($page+1)."'>下一页</a>&nbsp;";
		echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;&nbsp;";
	}else{//否则输出没有链接的下一页和尾页
	    echo "下一页&nbsp;尾页&nbsp;&nbsp;";
    }
}else{
    echo "您还未发表任何留言！";
}
}	
?></div>

</body>
</html>