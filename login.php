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
             <div id = "picture" >
             
          </div> 	
		    		<ul id ="nav">
		    			<p id = "first">
		    			<?php 
                        
                        ?>
		    		</ul>
    			</div>
    			<div id = 'body2'>
    				<br /><br /><br />
    		       <p id="title">登录</p>
    		       <br /><br />
    				 <form action="loginsuccess.php" method="post" id='zhuce' onsubmit="return check();">
				        	用&nbsp;户&nbsp;名:&nbsp;<input type="text" name='user' value='admin' id='user'/><br /><br />
				        	密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input type="text" name='password' id='passwords'/><br /><br />
				        	<input type="submit" class='button'value='登录'/>
                            <input type="button" id="goto" value="注册"/>
				        </form>
                    
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