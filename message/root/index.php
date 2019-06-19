<html>
<head>
<?php

session_start();			//初始化SESSION变量
date_default_timezone_set('PRC');
include_once("../conn/conn.php");
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])){		//判断SESSION变量的值是否存在
    //如果值不正确，则跳转到首页
echo "<script>alert('您不具备访问本页面的权限!');window.location.href='../login/login.php';</script>";

}else{
    if((time()-$_SESSION['time'])<600){
        $_SESSION['time']=time();//把当前时间戳赋给SESSION变量
    }else{
        echo "<script>alert('登录超时，请重新登录！');location='../login/login.php';</script>";
    } 
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
	background-image: url(./images/bg9.jpg);
	background-repeat: no-repeat;
	background-size: 100% 100%;
   overflow:hidden;
   margin: 0px;
    padding: 0px;
}
.txt{
    
   
    width: 200px;
    height: 44px;
    padding: 6px 12px;
    font-size: 24px;
    line-height: 1.42857143;
    color:white;
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
            <div class="lr">	Cat Message Board&nbsp;&nbsp;&nbsp;
            <a href="" >后台页面 </a>&nbsp;
            
            </div>
        </div>
        <div class="header-nav">
        <a href="">管理员，您好！


</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-default btn-lg" href="zhuxiao.php"><?php


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
<form name="form1" method="post" action="">
      <input name="submit" type="submit" id="submit"  class="txt" value="热门内容" />&nbsp;&nbsp; 
    <input type="submit" name="submit"  class="txt"  value="图文分享"/>
      </br>
     
</form>
</div>
<?php
include_once("../conn/conn.php");
?>

<div class="seckill">
    <div class="conlist">
                <div  id="list" class="seckill-good">
               
<?php
if(isset($_POST["submit"]) && $_POST["submit"]=="热门内容"){
    ?>
    <table width="90%"  border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
    <tr>
   
    <td width="10%" align="left" >用户</td>
      <td width="45%" align="left" >留言</td>
      <td width="15%" align="center" >时间</td>
      <td width="10%" align="center" >操作</td>
      
    </tr>
  <?php
      $pagesize = 10 ;									//每页显示记录数
      $sqlstr = "select * from tb_liu order by id desc";//定义查询语句
      $total = mysqli_query($connID,$sqlstr);//执行查询语句
      $totalNum = mysqli_num_rows($total);					//总记录数
      $result = mysqli_query($connID,$sqlstr);								//执行查询语句
      while ($rows = mysqli_fetch_array($result)){									//循环输出查询结果
  ?>
    <tr>
    
      <td width="5%" align="left" bgcolor="#FFFFFF" ><?php echo $rows[1];?></td>
      <td width="50%" align="left" bgcolor="#FFFFFF" >
     
      <?php echo $rows[2];
  ?>
      </td>
      <td width="15%" align="center" bgcolor="#FFFFFF" ><?php echo $rows[3];?></td>
      <td width="10%" align="center" bgcolor="#FFFFFF" >
     
     <a href=update.php?action=<?php echo  $_POST["submit"];?>&id=<?php echo $rows[0];?>>修改</a>/<a href=delete.php?action=<?php echo  $_POST["submit"];?>&id=<?php echo $rows[0];?> onclick = 'return del();'>删除</a></td>
  
      
  <?php	
      }
  ?>
    <tr>
      <td height="25" colspan="3" align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;
  <?php
      echo "共".$totalNum."条留言&nbsp;&nbsp;";
  ?>
      </td>
      <td height="25" colspan="3" align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;
          <a href="deleteall.php?action=<?php echo  $_POST["submit"];?>">批量删除</a>
      </td>
    </tr>
  </table>
  
  
      
  <?php
  }
  ?>
  <!-- --------------------------区分管理内容---------------------------------- -->
  <?php
if(isset($_POST["submit"]) && $_POST["submit"]=="图文分享"){
    ?>
    <table width="90%"  border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
    <tr>
        
    <td width="10%" align="left" >用户</td>
    <td width="35%" align="left" >图片地址</td>
      <td width="35%" align="left" >留言</td>
      <td width="10%" align="center" >时间</td>
      <td width="10%" align="center" >操作</td>
      
    </tr>
  <?php
      $pagesize = 10 ;									//每页显示记录数
      $sqlstr = "select * from tb_tu order by id desc";//定义查询语句
      $total = mysqli_query($connID,$sqlstr);//执行查询语句
      $totalNum = mysqli_num_rows($total);					//总记录数
      $result = mysqli_query($connID,$sqlstr);								//执行查询语句
      while ($rows = mysqli_fetch_array($result)){									//循环输出查询结果
  ?>
    <tr>
      
      <td width="5%" align="left" bgcolor="#FFFFFF" ><?php echo $rows[1];?></td>
      <td width="35%" align="left" bgcolor="#FFFFFF" >
     
      <?php echo mb_substr($rows[2],0,30,"utf-8") ;
  ?>
      </td>
      <td width="35%" align="center" bgcolor="#FFFFFF" ><?php echo mb_substr($rows[3],0,30,"utf-8");?></td>
      <td width="10%" align="center" bgcolor="#FFFFFF" ><?php echo $rows[4];?></td>

      <td width="10%" align="center" bgcolor="#FFFFFF" >
     
     <a href=update.php?action=<?php echo  $_POST["submit"];?>&id=<?php echo $rows[0];?>>修改</a>/<a href=delete.php?action=<?php echo  $_POST["submit"];?>&id=<?php echo $rows[0];?> onclick = 'return del();'>删除</a></td>
  
      
  <?php	
      }
  ?>
    <tr>
      <td height="25" colspan="3" align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;
  <?php
      echo "共".$totalNum."条留言&nbsp;&nbsp;";
  ?>
      </td>
      <td height="25" colspan="3" align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;
          <a href="deleteall.php?action=<?php echo  $_POST["submit"];?>">批量删除</a>
      </td>
    </tr>
  </table>
  
  
      
  <?php
  }
  ?>
   

                </div>                                   
    </div>
</div>

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