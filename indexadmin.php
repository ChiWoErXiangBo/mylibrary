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
  
</style>
</head>
    <body>
    	<body align="center">
    	<div id = "container">
    		<div id = "head">
          <div id = "picture" >
             
          </div>
           
            	
		    		<ul id ="nav">
		    			<p id = "first">
		    		<?php 
		    		error_reporting(E_ALL^E_NOTICE^E_WARNING);
		    			echo '<li><a href="./indexadmin.php';

		    			echo '">首&nbsp;&nbsp;页</a></li></p>';	    			
		    			
		    			echo '<li><a href="./insertbook.php';
		    			
		    			echo '">添加书目</a></li>';	

		    			echo '<li><a href="./usermanager.php?';
		    			
		    			echo '">管理用户</a></li>';
		    			
		    			echo '<li><a href="./datamanager.php?trueuser=';
		    			echo $number;
		    			echo '">数据备份恢复</a></li>';

		    			echo '<li><a href="./complaint.php?trueuser=';
		    			echo $number;
		    			echo '">意见反馈</a></li>';

		    			
          echo '<form method="post" action="indexadmin.php?trueuser=',$number,'">';
        
          echo '<input type="text" name = "search" id="search" value="搜索图书"/>
		    			<input type="submit" id="button2" value="GO"/>';
          	
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
			        if(!empty($_POST['search'])){
			        	$second = $_POST['search'];
    					$sql1="SELECT  * FROM `book` where B_NAME = '$second' or B_AUTHOR = '$second'";
              $result = mysql_query($sql1);

    				}
    				else{
			        $sql1="SELECT  * FROM `book` where 1";
              $result = mysql_query($sql1);
			        }
			        
			        echo '
    <div id="list">
    	<table id="table" border="1px" width="600px"   align=center>
    		<tr>
    			<td>书号</td>
    			<td>书名</td>
    			<td>作者</td>
    			<td>价格</td>
    			<td>借阅状态</td>
                <td>删除</td>

    		</tr>
    		</div>';
    		
			        while($row = mysql_fetch_row($result)){
			        	
			 echo '
			 <tr>
    			<td>',$row[1].$row[0],'</td>
    			<td>','《'.$row[3].'》','</td>
    			<td>',$row[4],'</td>
    			<td>',$row[6],'</td>
    			<td>',$row[7],'</td>
                <td>';
               
                echo 
                '<form action="indexadmin.php?">';
        echo $cardnumber;
      	echo'<input type="hidden" name = "booknumber"value=',$row[0],'/>';
      	$sql2 = "SELECT * FROM `card` WHERE C_STUDENTNUMBER = $cardnumber";
      	 $result2 = mysql_query($sql2);
      	 while($row2 = mysql_fetch_row($result2)){
         echo '
      	<input type="hidden" name = "cardnumber" value=',$row2[0],'/>';
      	 }   	
      	echo'
      	<input type="submit" value="删除"/>';       
      echo '</form>';      
      echo '</td>
    		</tr>';
        }
        
echo '</table>';
        if(!empty($_GET['booknumber'])){
          $booknumber = $_GET['booknumber'];
          echo $booknumber;
          $str = substr($booknumber,0,strlen($booknumber)-1); 
          $sql3 = "DELETE FROM `book` WHERE B_BOOKID = $str ";
          $sql4 = "DELETE FROM `code` WHERE CO_BOOKNUMBER= $str" ;
          $sql5 = "DELETE FROM `bookborrowed` WHERE BB_BOOKID = $str";
          $Result1 = mysql_query($sql5);
          $Result2 = mysql_query($sql4);
          $Result3  = mysql_query($sql3);
        }
    				?>
     
    			 </div>	
    		</div>
    </body>
    <script>
    function check(){
    	var user = document.getElementById('user').value;
    	var passwords = document.getElementById('passwords').value;
    	if(user==''||passwords==''){
    		alert('用户名或密码不能为空');
    		return false;
    	}
    	else{
    		return true;
    	}
    }
    var button1 = document.getElementById('goto')
    button1.onclick = function(){
        window.location.href="regist.php";
    }

    </script>
</html>
 