<?php session_start(); ?>
<HTML>
	<HEAD>
		<TITLE>面试结果录入</TITLE>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>      
	</HEAD>
    
	<BODY>
        <center><p><strong>查询</strong></p></center>
	<form  method="post" action="input.php">
        
        <center>姓名：<input type="text" name="name"></center><br/>
  
        <center><input type="submit" value="查找">     </center>
	</form>
        <?php
include "main.php";
        ?>
	</BODY>
</HTML>