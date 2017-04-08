<?php session_start(); ?>

<HTML>
    
	<HEAD>
		<TITLE>总队信息化办公系统</TITLE>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
      
	</HEAD>
    
	<BODY>
         <a href="http://1.informationsystems.sinaapp.com/index.php"style="text-decoration:none">首页<?php echo"》"?></a>拼车信息修改
        <center><h3>修改拼车信息</h3></center>
	<form  method="post" action="revisebackground.php">
	<table width="280" height="96" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
      <tr>
        <td colspan="2" align="center" bgcolor="#FFFFFF">用户登录</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF">用户名:</td>
        <td align="left" bgcolor="#FFFFFF"> 
           <input type="text" name="name" size="12">        
        </td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF">密码:</td>
        <td align="left" bgcolor="#FFFFFF"> 
		<input type="password" name="password" size="12"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#FFFFFF">
		<input type="submit" name="Submit" value="提交">
		<input type="reset" name="Submit2" value="重置"></td>
      </tr>
    </table>
        <?php
	$_SESSION["login"] = "NO";
        ?>
    </form>
	</BODY>
</HTML>