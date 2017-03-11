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
		    			echo '<form method="post" action="indexadmin.php','">';
        
          echo '<input type="text" name = "search" id="search" value="搜索图书"/>
		    			<input type="submit" id="button2" value="GO"/>';
          	
          echo '</form>';

		    			
          	
          echo '</form>';
		    			?>

		    		</ul>
    			</div>
    			<div id = 'body2'>
            <h1>添加书目信息</h1>
    				<?php 
    			
                     error_reporting(E_ALL^E_NOTICE^E_WARNING);
    				 require("gongyong.php");
			          $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
			    	 or die("error connecting"); 
			        mysql_query("set names 'utf8'"); 
			        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
			        echo '<form method = "post" action="insertbook.php" onsubmit="return check();">
			        <input type="text" value="书ID" name = "bookid"/>
				       <input type="text" value="书号" name = "booknumber"/>
				       <input type="text" value="书名" name = "bookname"/>
				       <input type="text" value="作者" name = "author"/>
				       <input type="text" value="价格" name = "price"/>
				       <input type="text" value="类型号" name = "categorynumber"/>
				       <input type="text" value="出版社号" name = "publishnumber"/>
       <input type="submit" value="提交" />
     </form>';
     if(!empty($_POST['booknumber'])&&!empty($_POST['bookname'])&&!empty($_POST['author'])&&
      !empty($_POST['price'])&&!empty($_POST['categorynumber'])&&!empty($_POST['publishnumber']))
    					{
    			$bookid=(int)$_POST['bookid'];
                $booknumber=(int)$_POST['booknumber'];
                $bookname = $_POST['bookname'];
                $author  = $_POST['author'];
                $price = $_POST['price'];
                $categorynumber = (int)$_POST['categorynumber'];
                $publishnumber =(int)$_POST['publishnumber'];

                $sql = "INSERT INTO `book`(`B_BOOKID`,`B_BOOKNUMBER`, `B_CATEGORYNUMBER`, `B_NAME`, `B_AUTHOR`, `B_PUBLISHERNUMBER`, `B_PRICE`, `B_STATUS`) VALUES ($bookid,$booknumber,$categorynumber,'$bookname','$author',$publishnumber,'$price',1)";
                $result = mysql_query($sql);
              }
              if(!empty($_POST['search'])){
			        	$second = $_POST['search'];
    					$sql1="SELECT  * FROM `book` where B_NAME = '$second' or B_AUTHOR = '$second'";
              $result1 = mysql_query($sql1);

    				}
    				else{
			        $sql1="SELECT  * FROM `book` where 1";
              $result1 = mysql_query($sql1);
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
                <td>修改</td>

    		</tr>
    		</div>';
    		
			        while($row = mysql_fetch_row($result1)){
			       
			        echo 
            '<form method= "post" action="insertbook.php?">';	

			 echo '
			 <tr>
    			<td>',$row[1].$row[0],'</td>';
    			echo '<input type="hidden" name = "BookID"value="'.$row[0].'"/>';
    			echo '<td>'.'<input type="text" name = "Bookname"value="'.$row[3].'"/>'.'</td>';
    			echo '<td>'.'<input type="text" name = "Author"value="'.$row[4].'"/>'.'</td>';
    			echo '<td>'.'<input type="text" name = "Price"value="',$row[6],'"/>'.'</td>';
    			echo '<td>'.'<input type="text" name = "Status"value="',$row[7],'"/>'.'</td>';
                echo'<td>';
               


      	echo'
      	<input type="submit" value="修改"/>';       
      echo '</form>';      
      echo '</td>
    		</tr>';
        }
        
echo '</table>';
   if(!empty($_POST['BookID'])){
   	$data = $_POST['BookID'];
   	$data1 = $_POST['Bookname'];
   	$data2 = $_POST['Author'];
   	$data3 = $_POST['Price'];
   	$data4 = (int)$_POST['Status'];
   	$sqlx = "UPDATE `book` SET  `B_NAME`='$data1',`B_AUTHOR`='$data2',`B_PRICE`='$data3',`B_STATUS`= $data4 
   	WHERE `B_BOOKID`= $data";
   	$resultx = mysql_query($sqlx);
   	echo('haha');
   	 }
    				?>
     
    			 </div>	
    		</div>
    </body>
    <script>
 function check (){
  return true;
 }
    </script>
</html>