<?php session_start(); ?>
<html>
    <!-- 这个是管理员查看教室申请情况的页面。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>教室申请情况</title>
    </head>
	<body>
	<table border="1" width="700" align="center">
        <caption>教室申请情况列表</caption>
		<tr>
            <th>地点</th><th>开始时间</th><th>结束时间</th><th>部门</th><th>使用缘由</th>
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

    //活动室情况
    $nowtime = date("Y-m-d H:m:s",time());
    $sql="select * from activityroom WHERE  time2 >= '$nowtime' order by time1 asc";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_assoc($result))
	{
        $sql1 = "select department from idpass WHERE id = {$row['department']}";
        $bumen = $mysql->getVar($sql1);

		echo "<tr>";
        echo "<td>活动室</td>";
		echo "<td>{$row['time1']}</td>";
		echo "<td>{$row['time2']}</td>";
        echo "<td>$bumen</td>";
        echo "<td>{$row['comment']}</td>";
        echo "</tr>";
    }
    
    //512使用情况
    $nowdate = date("Y-m-d",time());
    $sql2="select * from 512room WHERE    time1 >= '$nowdate' order by time1 asc";
    $result1=mysql_query($sql2,$link);
    while($row=mysql_fetch_assoc($result1))
	{
        $sql3 = "select department from idpass WHERE id = {$row['department']}";
        $bumen1 = $mysql->getVar($sql3);

		echo "<tr>";
        echo "<td>512教室</td>";
		echo "<td>{$row['time1']}</td>";
		echo "<td>当天</td>";
		echo "<td>$bumen1</td>";
        echo "<td>{$row['comment']}</td>";
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