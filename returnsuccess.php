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
</style>
</head>
    <body>
    	<body align="center">
    	<div id = "container">
    		<div id = "head">
            <img src="./images/logo32_.png" alt="" /> 
            	
		    		<ul id ="nav">
		    			<p id = "first">
		    			<li><a href="./index.php">首&nbsp;&nbsp;页</a></li>
		    			</p>

		    			<?php 
		    			
		    			
		    			?>
		    			<li><a href="">图书国家编码</a></li>
		    			<li><a href="">借书规则</a></li>
		    			<li><a href="">关于我们</a></li>
		    			<li><a href="./complain.html">意见反馈</a></li>



		    		</ul>
    			</div>
    			<div id = 'body2'>
      <?php 
		    			$booknumber = $_POST['booknumber'];
		    			$cardnumber = $_POST['cardnumber'];
		    			echo $booknumber;
		    			 echo $cardnumber;
		    			$CardNumber = substr($cardnumber,0,strlen($cardnumber)-1); 
		    			//echo $CardNumber;
		    			$BookNumber = substr($booknumber,0,strlen($booknumber)-1); 
		    			//echo $BookNumber;
		    				require("gongyong.php"); 
						   $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
						    	 or die("error connecting"); 
						        mysql_query("set names 'utf8'"); 
						        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
						   
						   // $time = date("Ymd");
						   // $str1 = substr($time, 0,4);
						   // $strs2 = substr($time, 4,2);	
						   // if($strs2<10){
         //                    $str2 = '0'.$strs2;
						   // }	
						   // else{
						   // 	$str2 = $strs2 ;
						   // }   
						   // $strs3 = substr($time, 6,2);
						   //  if($strs3<10){
         //                    $str3 = '0'.$strs3;
						   // }	
						   // else{
						   // 	$str3 = $strs3 ;
						   // } 						   
						   // $timeout = $str1.$str2.$str3;
						   // if($str2>10){
						   // 	$tmp1 =$str1+1;
						   // 	$tmp2= $str2-10;
						   // 	$timein = $tmp1.'0'.$tmp2.$str3;
						   // }
						   // else{
						   // 	$tmp3 = $str2+2;
						   // 	$timein = $str1.$tmp3.$str3;
						   // }
						   $bookNumber = (int)$BookNumber;
						   $cardNumber = (int)$CardNumber;
						   // echo $timein;
						   // echo $timeout;

						   $sql1 = "DELETE FROM `bookborrowed` WHERE BB_BOOKID = $bookNumber";
						   $result = mysql_query($sql1);
						   $sql3 = "UPDATE `card` SET `C_BOOKBORROWED`=C_BOOKBORROWED-1 WHERE C_NUMBER = $cardNumber";
						   $result3= mysql_query($sql3);
						   $sql2 = "UPDATE `book` SET `B_STATUS`=B_STATUS +1 WHERE B_BOOKID = $bookNumber";
						   $result2= mysql_query($sql2);
						    
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