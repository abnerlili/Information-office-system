<?php session_start(); ?>
<html>
    
    <!--这个是管理员查看活动申报情况的页面。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>目前活动</title>
    </head>
	<body>
        
	<table width="900" border="1" align="center">
        <caption>近期活动列表</caption>
		<tr>
            <th>活动名称</th><th>开始时间</th><th>结束时间</th><th>举办地点</th><th>申报单位</th><th>联系人</th><th>联系电话</th><th>备注</th>
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
    $nowtime = date("Y-m-d H:m:s",time());
   	$sql="select * from activity WHERE time1 >= '$nowtime' OR time2 >= '$nowtime' order by time1 asc";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_assoc($result))
	{

        $sql1 = "select * from idpass WHERE id = '{$row['department']}'";
        $departmentinfo = $mysql->getLine($sql1);
        $bumen = $departmentinfo["department"];
        $minister = $departmentinfo["minister"];
        $cell = $departmentinfo["cell"];

		echo "<tr>";
        echo "<td align='center'>{$row['name']}</td>";
		echo "<td align='center'>{$row['time1']}</td>";
		echo "<td align='center'>{$row['time2']}</td>";
		echo "<td align='center'>{$row['place']}</td>";
		echo "<td align='center'>$bumen</td>";
        echo "<td align='center'>$minister</td>";
        echo "<td align='center'>$cell</td>";
        echo "<td align='center'>{$row['comment']}</td>";
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