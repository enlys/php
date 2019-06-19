<html>
<head>
<?php

session_start();			//初始化SESSION变量
date_default_timezone_set('PRC');	

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
            <div class="lr">	Cat Message Board&nbsp;&nbsp;&nbsp;
            <a href="liuyan.php" >留言 </a>&nbsp;
            <a href="chaxun.php">查询 </a> &nbsp; <a href="tuwen.php">图文分享</a>
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
    热门内容
</div>
<?php
include_once("../conn/conn.php");
?>

<div class="seckill">
    <div class="conlist">
                <div  id="list" class="seckill-good">
                    <ul>
                    <?php
	$pagesize = 6;									//每页显示记录数
	$sqlstr = "select * from tb_liu order by id desc";//定义查询语句
    $total = mysqli_query($connID,$sqlstr);//执行查询语句
    if($total!=false){
    $totalNum = mysqli_num_rows($total);
    if($totalNum>0){					//总记录数
	$pagecount = ceil($totalNum/$pagesize);						//总页数
	(!isset($_GET['page']))?($page = 1):$page = $_GET['page'];				//当前显示页数
	($page <= $pagecount)?$page:($page = $pagecount);//当前页大于总页数时把当前页定义为总页数
	$f_pageNum = $pagesize * ($page - 1);								//当前页的第一条记录
	$sqlstr1 = $sqlstr." limit ".$f_pageNum.",".$pagesize;//定义SQL语句，通过limit关键字控制查询范围和数量
	$result = mysqli_query($connID,$sqlstr1);								//执行查询语句
    while ($rows = mysqli_fetch_array($result)){									//循环输出查询结果
?>
                        <li>
                           
                                <div class="info">
                                        <a href="" class="name"><span class="glyphicon glyphicon-user"></span> User:<?php echo $rows[1];?></a> 
                                        <p class="tips">留言:<?php echo $rows[2];?></p>
                                      
                                        <p class="person" > <a href=zan.php?action=<?php echo $rows[0];?>&zan=<?php echo $rows[5];?>> <span class="glyphicon glyphicon-thumbs-up"></a> <?php
                                        if( $rows[5]==null){
                                            echo 0;
                                        }else{
                                            echo $rows[5];
                                        }
                                        ?>
                                        <a href="ping.php?action=<?php echo $rows[0];?>">评论</a>
                                       
                                        <?php
										$time1 = strtotime($rows[3]);
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
															echo  $rows[3];
															}
										?></p>
                                       
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
}
}
?></div>
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