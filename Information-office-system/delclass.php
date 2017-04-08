<?php session_start(); ?>
<html>
<!-- 这个文件用来显示我添加的活动室和512申请，并且提供删除操作。-->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>删除教室</title>
    </head>
	<body>
	<table border="1" width="500" align="center">
        <caption>删除我的教室使用申请</caption>
		<tr>
			<th align='center'>地点</th><th align='center'>开始时间</th><th align='center'>结束时间</th><th align='center'>部门</th><th align='center'>操作</th>
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

    $department=$_SESSION["ID"];
    //活动室情况

    $nowtime = date("Y-m-d H:m:s",time());
    $sql="select * from activityroom WHERE    time1 > '$nowtime' AND department = $department order by time1 asc";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_assoc($result))
	{

        $sql1 = "select department from idpass WHERE id = {$row['department']}";
        $bumen = $mysql->getVar($sql1);
		echo "<tr>";
        echo "<td align='center'>活动室</td>";
		echo "<td align='center'>{$row['time1']}</td>";
		echo "<td align='center'>{$row['time2']}</td>";
		echo "<td align='center'>$bumen</td>";
        echo "<td align='center'>";
        ?>
        <form action="delaction.php" onsubmit="return confirm('确认删除吗？');" style="margin:0px">
            <input type="hidden" name="action" value="del1" />
            <input type="hidden" name="ID" value="<?php echo "{$row['ID']}";?>" />
            <input type="submit" value="删除" />
        </form>
        
        
        <?php echo "</td></tr>";		

    }
    //512使用情况
    $nowdate = date("Y-m-d",time());
    $sql2="select * from 512room WHERE    time1 >= '$nowdate' AND department = $department order by time1 asc";
    $result1=mysql_query($sql2,$link);
    while($row=mysql_fetch_assoc($result1))
	{

        $sql3 = "select department from idpass WHERE id = {$row['department']}";
        $bumen1 = $mysql->getVar($sql3);

		echo "<tr>";
        echo "<td align='center'>512教室</td>";
		echo "<td align='center'>{$row['time1']}</td>";
		echo "<td align='center'>当天</td>";
   		echo "<td align='center'>$bumen1</td>";
        echo "<td align='center'>";
        ?>
        <form action="delaction.php" onsubmit="return confirm('确认删除吗？');" style="margin:0px">
            <input type="hidden" name="action" value="del2" />
            <input type="hidden" name="ID" value="<?php echo "{$row['ID']}";?>" />
            <input type="submit" value="删除" />
        </form>
        <?php    echo "</td></tr>";		

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