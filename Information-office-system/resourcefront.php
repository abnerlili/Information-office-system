<?php session_start(); ?>

<HTML>
    
    <!--此文件是物资查询的前台。 -->
	<HEAD>
		<TITLE>物资查询</TITLE>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
      
	</HEAD>
    
	<BODY>
        <center><p><strong>总队物资查询系统</strong></p></center>
	<form  method="post" action="resource.php">
        <center>请输入要查询的物资</center>
        <center><input type="text" name="resource"></center>
        <center><input type="submit" value="查找">     </center>
	</form>
        <?php
include "main.php";
        ?>
	</BODY>
</HTML>