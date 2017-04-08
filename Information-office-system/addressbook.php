<?php session_start(); ?>
<html>
    <head>
    	<title>西电组织通讯录</title>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="text/javascript">
        
    </script>
    </head>
    <body>
        <table width="900" border="1" align="center">
        <caption>通讯录</caption>
            <tr>
        <th>组织名称</th><th>姓名</th><th>职位</th><th>联系电话</th><th>QQ</th>
            </tr>
<?php
// 连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if($link)
{
    mysql_select_db(SAE_MYSQL_DB,$link);
    $mysql = new saeMysql();
   	$sql="select * from addressbook";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_array($result))
	{

		echo "<tr>";
        echo "<td>{$row['department']}</td>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['position']}</td>";
		echo "<td>{$row['cell']}</td>";
        echo "<td>{$row['QQ']}</td>";
        echo "</tr>";		

    }
	$mysql->closeDb();  
}        
?>	
        </table>
<?php

include "main.php";

?>
	</body>
</html>