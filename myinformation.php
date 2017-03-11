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
                        error_reporting(E_ALL^E_NOTICE^E_WARNING);
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

                        ?>
                    </ul>
                </div>
    			<div id = 'body2'>
      <?php 
      error_reporting(E_ALL^E_NOTICE^E_WARNING);
   $number = $_GET['trueuser'];
   //echo $number;
   require("gongyong.php"); 
   $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
    	 or die("error connecting"); 
        mysql_query("set names 'utf8'"); 
        mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());

        $sql1="SELECT  * FROM `card` where C_STUDENTNUMBER = $number";
        
        $result = mysql_query($sql1);
       while($row = mysql_fetch_row($result)){
        $cNumber = $row[0];
        echo "<p>姓名：".$row[1]."</p>";
        echo "<p>学号：".$row[2]."</p>";
        echo "<p>借书数：".$row[4]."</p>";
       $sql2 = "SELECT * FROM `book` WHERE `B_BOOKID` in(SELECT BB_BOOKID FROM `bookborrowed`WHERE BB_CARDNUMBER = $cNumber )";
        $sql3 = "SELECT * FROM `bookborrowed`WHERE BB_CARDNUMBER = $cNumber ";
        $result2 = mysql_query($sql2);
        echo '
    <div id="list">
      <table border="1px" width="600px"   align=center>
        <tr>
          <td>书号</td>
          <td>书名</td>
          <td>作者</td>
          <td>借出时间</td>
          <td>应还时间</td>
          <td>还书</td>     
        </tr>
        </div>';
       while($row2 = mysql_fetch_row($result2)){
        echo '
       <tr>
          <td>',$row2[1].$row[0],'</td>
          <td>',$row2[3],'</td>
          <td>',$row2[4],'</td>';

$result3 = mysql_query($sql3);
$row3 = mysql_fetch_row($result3);
   $time = date("Ymd");
   if($row3[3]-$time>10){
     $flag = 1;
   }
echo'      <td>',$row3[2],'</td>
          <td>',$row3[3],'</td>';

echo '<td>';
   echo '<form action="returnsuccess.php" method="post">
        <input type="hidden" name = "booknumber"value=',$row3[0],'/>'; 
   echo '<input type="hidden" name = "cardnumber"value=',$row3[1],'/>'; 
        echo'
        <input type="submit" value="还书"/>
      </form>';
echo'</td></tr>';    
         	
          }
 }
       
  
      
      ?>

    			 </div>	
    		</div>
    </body>
   
</html>