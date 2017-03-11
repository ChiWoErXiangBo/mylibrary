<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
    	<?php
    	$user = $_POST['user'];
    	$password = $_POST['password']; 
          require("gongyong.php");
          $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
    	 or die("error connecting"); 
        mysql_query("set names 'utf8'"); 
        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
        $sql1="SELECT  `C_PASSWORD` FROM `card` where C_STUDENTNUMBER = '$user'";
        $result = mysql_query($sql1);
        while($row = mysql_fetch_row($result)){
          if ($password == $row[0]){
            $a =1;

          }
        }
        $sql2="SELECT  `AC_PASSWORD` FROM `admincard` where AC_CARDNUMBER = '$user'";
        $result2 = mysql_query($sql2);
        while($row2 = mysql_fetch_row($result2)){
          if ($password == $row2[0]){
            $b =1;

          }
        }
       
         		if(isset($a)){
                  echo "登陆成功，正在为您跳转";
                  echo "<form action='index.php' method='get' name='forms' id='forms'>
                   <input type='hidden' name='trueuser' value='$user' />
                  </form>";

                 }
                  else 
                    {
                      if (isset($b)) {
                   echo "欢迎您管理员";
                  echo "<form action='indexadmin.php' method='get' name='forms' id='forms'>
                   <input type='hidden' name='trueuser' value='$user' />
                  </form>";
                 }
                 else{
                  echo "登陆失败，用户名不存在或密码错误！";
                 }
               }
                
    	?>

    </body>

     <script>
 
      function a(){
        document.forms.submit();
      }
          setTimeout(a,3000);
    </script>
</html>