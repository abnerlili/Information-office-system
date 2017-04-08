<?php session_start(); ?>
<html>
    
    <!--这是物资查询的后台。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>物资查询结果</title>
    </head>
	<body>
   
        	<table width="300" border="1" align="center">
                <caption>查询结果</caption>
        <tr>
            <th>单位</th><th>负责人</th><th>联系电话</th><th>物资</th>
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
    $item = $_POST["resource"];
   	$sql="select * from idpass ";
	$result=$mysql->getData($sql);
	$row = count($result);
    $found = false;
        for($i=0;$i<$row;$i++)
		{
			$line = $result[$i];
        	if(strstr($line["resource"],$item))
        	{
                $found = true;
            	echo "<tr>";
       			echo "<td align='center'>{$line['department']}</td>";
				echo "<td align='center'>{$line['minister']}</td>";
				echo "<td align='center'>{$line['cell']}</td>";
				echo "<td align='center'>{$line['resource']}</td>";
        		echo "</tr>";		
        	}
    	}
    if(!$found)
        echo "<tr><td colspan='4' align='center'>对不起，未找到您所查询的物资。</td></tr>";

	$mysql->closeDb();  
}        
?>	
        </table>
<?php

include "main.php";

?>
	</body>
</html>
