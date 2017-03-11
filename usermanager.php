\<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		    			
		    			echo '<li><a href="./datamanager.php?';
		    			
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
			        $sql = "SELECT * FROM `card` WHERE 1";
			        $result = mysql_query($sql);
			        
			        echo '
    <div id="list">
    	<table id="table" border="1px" width="600px"   align=center>
    		<tr>
    			<td>学号</td>
    			<td>姓名</td>
    			<td>已借书数</td>
    			<td>操作</td>
    	
    		</tr>
    		</div>';
    		while($row = mysql_fetch_row($result)){
			        	
	    echo '
			 <tr>
    			<td>',$row[2],'</td>
    			<td>',$row[1],'</td>';
    			echo '<td>';
        echo '<form method="post" action="usermanager.php">';
        $tmp = substr($row[4],0,strlen($row[4])-1);
         echo '<input type="hidden" name = "CardNumber" value=',$row[0],'/>';
      	echo  ' <input type="submit" value=';
      	echo $row[4];
      	echo '/>
      </form>';
        
                echo '</td>';
    		
        echo '<td>';
        echo '<form method="post" action="usermanager.php">';
        
         echo '<input type="hidden" name = "cardnumber" value=',$row[0],'/>';
      	echo  ' <input type="submit" value="删除"/>
      </form>';
        
                echo '</td>
    		</tr>
			 ';


          }
        
echo '</table>';

  if(!empty($_POST['cardnumber'])){
  	$cardnumber = (int)$_POST['cardnumber'];
  	$sql1="DELETE FROM `bookborrowed` WHERE BB_CARDNUMBER=$cardnumber";
  	$sql2 = "DELETE FROM `card` WHERE C_NUMBER= $cardnumber";
  	$sql3 = "UPDATE `book` SET B_STATUS=B_STATUS+1 WHERE `B_BOOKID` in(
         SELECT `BB_BOOKID` FROM `bookborrowed` WHERE BB_CARDNUMBER=$cardnumber
  )";
  	$result1 = mysql_query($sql1);
  	$result2 = mysql_query($sql2);
  	$result3 = mysql_query($sql3);
  }

  if(!empty($_POST['CardNumber'])){
  	$CardNumber = (int)substr($_POST['CardNumber'],0,strlen($_POST['CardNumber'])-1);  
  	$sqla = "SELECT * FROM `book` WHERE `B_BOOKID` IN(
SELECT `BB_BOOKID` FROM `bookborrowed` WHERE `BB_CARDNUMBER` = $CardNumber
)";
    $sqlb = "SELECT * FROM `bookborrowed` WHERE `BB_CARDNUMBER` = $CardNumber";
    $resulta = mysql_query($sqla);
    $resultb = mysql_query($sqlb);
    echo '
    	<table id="table2" border="1px" width="600px"   align=center>
    		<tr>
    			<td>书号</td>
    			<td>书名</td>
    			<td>作者</td>
    			<td>借书日期</td>
    	        <td>应还日期</td>
    	     
    		</tr>
    		';
    while($rowa = mysql_fetch_row($resulta)){
   echo'<tr>';
   echo '<td>';
   echo $rowa[1];
   echo '</td>';
   echo '<td>';
   echo $rowa[3];
   echo '</td>';
   echo '<td>';
   echo $rowa[4];
   echo '</td>';
   $rowb = mysql_fetch_row($resultb);
   echo '<td>';
   echo $rowb[2];
   echo '</td>';
   echo '<td>';
   echo $rowb[3];
   echo '</td>';
   echo'</tr>';
   

    }

  }
    					
    				?>
     
    			 </div>	
    		</div>
    </body>
    
</html>