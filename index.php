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
            <?php 
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
            $number = $_GET['trueuser'];
            require("gongyong.php");
			          $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
			    	 or die("error connecting"); 
			        mysql_query("set names 'utf8'"); 
			        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
			      $time = date("Ymd");
			       $sql="SELECT * FROM `bookborrowed` WHERE BB_CARDNUMBER IN (
			       	SELECT `C_NUMBER` FROM `card` WHERE C_STUDENTNUMBER = $number)";
                   $result = mysql_query($sql);
                   while($row = mysql_fetch_row($result)){
                   	if((int)$row[3] - $time<10){
                   		echo'<p>您有书即将超期请及时归还</p>';
                   	}
                   }
    
            ?>
            	
		    		<ul id ="nav">
		    			<p id = "first">
		    		<?php 
		    		$number = $_GET['trueuser'];
		    			echo '<li><a href="./index.php?trueuser=';
		    			echo $number;
		    			echo '">首&nbsp;&nbsp;页</a></li></p>';	    			
		    			
		    			echo '<li><a href="./myinformation.php?trueuser=';
		    			echo $number;
		    			echo '">我的信息</a></li>';	

		    			echo '<li><a href="./code.php?trueuser=';
		    			echo $number;
		    			echo '">图书国家编码</a></li>';
		    			
		    			echo '<li><a href="./aboutus.php?trueuser=';
		    			echo $number;
		    			echo '">关于我们</a></li>';

		    			echo '<li><a href="./complaint.php?trueuser=';
		    			echo $number;
		    			echo '">意见反馈</a></li>';

		    			
          echo '<form method="post" action="index.php?trueuser=',$number,'">';
        
          echo '<input type="text" name = "search" id="search" value="搜索图书"/>
		    			<input type="submit" id="button2" value="GO"/>';
          	
          echo '</form>';
		    			?>

		    		</ul>
    			</div>
    			<div id = 'body2'>
    				<?php 
    				$cardnumber = $_GET['trueuser'];

    				 require("gongyong.php");
			          $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
			    	 or die("error connecting"); 
			        mysql_query("set names 'utf8'"); 
			        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
			        if(!empty($_POST['search'])){
			        	$second = $_POST['search'].'%';
                $third = '%'.$_POST['search'];
    					$sql1="SELECT  * FROM `book` where B_NAME LIKE'$second' or B_AUTHOR LIKE'$second' or 
              B_NAME LIKE'$third' or B_AUTHOR LIKE'$third' ";
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
    			<td>状态</td>
                <td>操作</td>
    		</tr>
    		</div>';
    		
			        while($row = mysql_fetch_row($result)){
			        	if ($row[6] ==1){
			        		$state = "有";
			        	}
			        	else{
			        		$state = "无";
			        	}
			 echo '
			 <tr>
    			<td>',$row[1].$row[0],'</td>
    			<td>','《'.$row[3].'》','</td>
    			<td>',$row[4],'</td>
    			<td>',$row[6],'</td>
    			<td>',$row[7],'</td>
                <td>';
                if($row[7] !=0){
                echo 
                '<form action="borrowsuccess.php?trueuser=">';
        //echo $cardnumber;
      	echo'<input type="hidden" name = "booknumber"value=',$row[0],'/>';
      	$sql2 = "SELECT * FROM `card` WHERE C_STUDENTNUMBER = $cardnumber";
      	 $result2 = mysql_query($sql2);
      	 while($row2 = mysql_fetch_row($result2)){
         echo '
      	<input type="hidden" name = "cardnumber" value=',$row2[0],'/>';
      	 }   	
      	echo'
      	<input type="submit" value="借阅"/>
      </form>';
                }
                echo '</td>
    		</tr>

			 ';


          }
        
echo '</table>';
        
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
 