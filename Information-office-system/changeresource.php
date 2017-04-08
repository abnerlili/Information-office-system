<?php session_start(); ?>
<html>
<!--这个文件用来显示我添加的活动并提供删除键。 -->    
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>修改物资</title>
    </head>
    
	<body>
	<table border="1" width="600" align="center">
        <caption>修改各组织物资</caption>
		<tr>
            <th align="center">组织名称</th><th align="center">负责人</th><th align="center">电话</th><th align="center">Email</th><th align="center">物资</th><th align="center">操作</th>
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
    $sql="select * from idpass";
	$result=$mysql->getData($sql);
    $row=count($result);
    for($i=0;$i<$row;$i++)
    {
        $line=$result[$i];
        echo "<tr>";
        echo "<td align='center'>{$line['department']}</td>";
        echo "<td align='center'>{$line['minister']}</td>";
		echo "<td align='center'>{$line['cell']}</td>";
        echo "<td align='center'>{$line['email']}</td>";
        echo "<td align='center'>";	
        ?>
        <form action="delaction.php" onsubmit="return confirm('确认修改吗？');" style="margin:0px">
        <input type="text" name="newresource" value="<?php echo "{$line['resource']}";?>"/>
        
        <?php
        echo "</td>";
        echo "<td align='center'>";
?>        
  
            <input type="hidden" name="action" value="resource" />
            <input type="hidden" name="ID" value="<?php echo "{$line['ID']}";?>" />
            <input type="submit" value="修改" />
        </form>
<?php
        
        echo "</td></tr>";
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