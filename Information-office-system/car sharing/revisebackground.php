<?php session_start(); ?>
<!--此文件是管理员登陆的后台处理页面。 -->
<html>
	<head>
		<title>登陆提示</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	</head>
	
<body>
	<?php
	$name=$_POST["name"];
	$password=$_POST["password"];
	if($name!='')
	{
		$sql=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);//连接mysql服务器
		//mysql_query("set names gbk");		//字符转换
		mysql_select_db("app_informationsystems",$sql); //选定数据库
		$query="SELECT * FROM carshare WHERE name='$name'";//选择与用户名相同的数据
		$result=mysql_query($query,$sql);
		$datanum=mysql_num_rows($result);
		if($datanum<1)        							 //查看有几条相同数据
        {
            echo "用户名错误，请重新输入！";
            //$_SESSION["login"]="NO";
         	include"reviselogin.php";
        }
		else
		{
			$info=mysql_fetch_array($result,MYSQL_ASSOC);	//数组存入密码
			if($info["password"]!=$password)		//比较密码
			{
				echo "密码错误，请重新输入！";
                //$_SESSION["login"]="NO";
                include"reviselogin.php";
			}
			else
			{
                $_SESSION["login"]="YES";
                $_SESSION["name"]= $info["name"];
                $_SESSION["password"] = $info["password"];
                echo "<center>欢迎你</center>"."<center>".$info["name"]."</center>";
                echo "<center><a href=\"revise.php\">我要修改拼车信息</a></center>";
			}
		}
			
	}
	else
	{
		echo "用户名为空，请重新输入！";
        include "index.php";
	}
	mysql_close($sql);		//关闭mysql服务器
	?>
</body>
</html>