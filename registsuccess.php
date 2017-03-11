<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="布尔教育 http://www.itbool.com" />
</head>
    <body>
    	<?php 
    	$user = $_POST['user'];      
    	$password = $_POST['password'];
        $name = $_POST['name'];
    	require("gongyong.php");
    	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
    	 or die("error connecting"); 
        mysql_query("set names 'utf8'"); 
        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
    
        $sql1="SELECT  `C_NAME` FROM `card` where 1";
        $result = mysql_query($sql1);
        while($row = mysql_fetch_row($result)){
          if ($user == $row[0]){
            $a =1;
          }
        }
                 if(isset($a)){
                  echo "注册失败，用户名已存在！";
                 }
        if(isset($a)==false){
            $sql= "INSERT INTO `card`(`C_NAME`, `C_STUDENTNUMBER`, `C_PASSWORD`, `C_BOOKBORROWED`) VALUES ('$name', '$user','$password',0)";
            mysql_query($sql); 
            echo "恭喜您已经注册成功";  
            mysql_close(); //关闭MySQL连接
            
        }
    	?>

    </body>
</html>