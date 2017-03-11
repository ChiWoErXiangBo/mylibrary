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
                    require("gongyong.php"); 
                           $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
                                 or die("error connecting"); 
                                mysql_query("set names 'utf8'"); 
                                mysql_select_db($mysql_database) or die('Can\'t use foo : ' . mysql_error());
                    $sql1 = "SELECT * FROM `book` WHERE 1";
                    $sql2 = "SELECT * FROM `code` WHERE `CO_BOOKNUMBER` IN(
SELECT B_BOOKNUMBER FROM `book` WHERE 1
)";
                    $result = mysql_query($sql1);
                     $result2 = mysql_query($sql2);
                     echo '
    <div id="list">
        <table border="1px" width="600px"   align=center>
            <tr>
                <td>书号</td>
                
                <td>图书国家编码</td>
            </tr>
            </div>';
                     
                        while($row2 = mysql_fetch_row($result2)){
                echo "<tr>";
                echo "<td>";
                echo $row2[0];
                echo"</td>";     
                echo "<td>";
                echo $row2[1];
                echo"</td>";
                echo "</tr>";
           
                
            }
            
                    ?>
                    
                 </div> 
            </div>
    </body>
    
</html>