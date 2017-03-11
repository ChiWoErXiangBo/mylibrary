<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="布尔教育 http://www.itbool.com" />
<link rel="stylesheet" type="text/css" href="./images/reset.css">
<link rel="stylesheet" type="text/css" href="./images/new.css">
<style>
#t1{
    position: relative;
    left: -30px;
}
#s_province{
    position: relative;
    left:30px;
}
#s_city{
    position: relative;
    left:30px;
}
#s_county{
    position: relative;
    left:30px;
}
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
    			</div>
    			<div id = 'body2'>
    				<br /><br /><br /><br />
    				<p id='title'>请注册</p><br /><br />
				        <form action="registsuccess.php" method="post" id='zhuce' onsubmit="return check();">
				        	用&nbsp;户&nbsp;名:&nbsp;<input type="text" name='user' value='admin' id='user'/><br /><br />
				        	密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input type="text" name='password' id='passwords'/><br /><br />
				        	确认密码:&nbsp;<input type="text" name='password' id='passwords2'/><br />

                            <br />
                            <p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:<input type="text" id="name" name="name"/></p>
                            <br />
                <input type="submit" class='button'value='注册' />
                           
                            <br />
                            
				        </form>
    			 </div>	
    		</div>
    		<script>
   
    function check(){
        var passwords2 = document.getElementById('passwords2').value;
        var passwords = document.getElementById('passwords').value;
        var user = document.getElementById('user').value;
        var name = document.getElementById('name').value;
        if(passwords2==''||passwords==''||user==''||name==""){
            alert('请将信息填写完整！');
            return false;
        }
        else{
    	if(passwords2==passwords){
    		return true;

    	}
    	else{
    		alert('请重新输入，因为密码不一致');
    		return false;
    		
    	}
        }


    }

    </script>
    </body>
</html>