<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="布尔教育 http://www.itbool.com" />
<link rel="stylesheet" type="text/css" href="./images/reset.css">
<link rel="stylesheet" type="text/css" href="./images/new.css">
<style>
	#title{
	font-size: 30px;
	text-align: center;
	font-weight: 50px;

}
	#zhuce{
		font-size: 15px;
		text-align: center;
	}
	#name{
		position: relative;
		top: 9px;
		right: 35px;
		font-size: 15px;
		text-align: right;
	}
	#search{
		position: absolute;
		top: 96px;
		right: 290px;
		border: none;
		width: 150px;

	}
	#button2{
		position: absolute;
		top: 94px;
		right: 174px;
		background-color:transparent;
		
	}
  #table{

  }
</style>
</head>
    <body>
    	<body align="center">
    	<div id = "container">
    		<div id = "head">
            <img src="./images/logo32_.png" alt="" /> 
            	
		    		<ul id ="nav">
		    			<p id = "first">
		    		<?php 
		    			echo '<li><a href="./indexadmin.php';

		    			echo '">首&nbsp;&nbsp;页</a></li></p>';	    			
		    			
		    			echo '<li><a href="./insertbook.php';
		    			
		    			echo '">添加书目</a></li>';	

		    			echo '<li><a href="./usermanager.php?';
		    			
		    			echo '">管理用户</a></li>';
		    			
		    			echo '<li><a href="./datamanager.php?trueuser=';
		    			
		    			echo '">数据备份恢复</a></li>';

		    			echo '<li><a href="./complaint.php?trueuser=';
		    		
		    			echo '">意见反馈</a></li>';

		    			
       
          	
          echo '</form>';
		    			?>

		    		</ul>
    			</div>
    			<div id = 'body2'>
    				<?php 
    			error_reporting(E_ALL^E_NOTICE^E_WARNING);

    				 require("gongyong.php");
			          $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
			    	 or die("error connecting"); 
			        mysql_query("set names 'utf8'"); 
			        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
			       $sql="BACKUP DATABASE test
      TO disk = 'c:\mylibrary'
      WITH FORMAT,
      NAME = 'Full Backup of MyNwind'";
    			   $sql2 = "USE master
  GO
  RESTORE DATABASE test_wt
      FROM disk = 'c:\test_wt'
  GO";
    				?>
     
    			 </div>	
    		</div>
    </body>
    
</html>