<?php session_start(); ?>
<html>
<!--这个文件用来显示拼车信息并提供删除键。 -->    
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>删除信息</title>
    </head>
    
	<body>
	<table border="1" width="600" align="center">
        <caption>删除拼车信息</caption>
		<tr>
			<th align="center">活动名称</th><th align="center">开始时间</th><th align="center">结束时间</th><th align="center">举办地点</th><th align="center">部门</th><th align="center">操作</th>
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

    $nowtime = date("Y-m-d H:m:s",time());
    $sql="select * from activity WHERE    (time1 >= '$nowtime' OR time2>='$nowtime')  AND department = $department order by time1 asc";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_assoc($result))
	{

        $sql1 = "select department from idpass WHERE id = '{$row['department']}'";
        $bumen = $mysql->getVar($sql1);

		echo "<tr>";
        echo "<td align='center'>{$row['name']}</td>";
		echo "<td align='center'>{$row['time1']}</td>";
		echo "<td align='center'>{$row['time2']}</td>";
		echo "<td align='center'>{$row['place']}</td>";
		echo "<td align='center'>$bumen</td>";
        echo "<td align='center'>";
        ?>
        <form action="delaction.php" onsubmit="return confirm('确认删除吗？');" style="margin:0px">
            <input type="hidden" name="action" value="del" />
            <input type="hidden" name="ID" value="<?php echo "{$row['ID']}";?>" />
            <input type="submit" value="删除" />
        </form>
            
        <?php
        echo "</td>";
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