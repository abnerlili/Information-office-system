<?php session_start(); ?>
<html>
    <head>
        <title>钥匙归属</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
    <body>
        <center><table width="400" border="1">
            <caption>钥匙交接</caption>
            <tr><th align='center'>钥匙编号</th><th align='center'>交接时间</th>
                <th align='center'>持有部门</th><th aling='center'>操作</th>
            </tr>
        <?php
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS); //连接数据库
if($link)
{
    mysql_select_db("app_informationsystems",$link);		//选择数据库
    
    $mysql = new SAEmysql();
    //选择展示512钥匙归属
    
    $sql1="select * from 512key where active='1'";	//选取活跃值（active）为1的数据进行展示
    $result1=mysql_query($sql1,$link);
    while($row1=mysql_fetch_assoc($result1))
    {
        
        $query1="select department from idpass WHERE id = {$row1['department']}";
        $bumen1=$mysql->getVar($query1);
        echo "<tr>";
        echo "<td align='center'>512-{$row1['keyid']}</td>";
		echo "<td align='center'>{$row1['time']}</td>";
		echo "<td align='center'>$bumen1</td>";
        echo "<td align='center'><a href='delaction.php?action=get512&id={$row1['keyid']}'>在我这</a></td>";
        echo "</tr>";
        
    }
    
    //选择展示513钥匙归属
    
    $sql2="select * from 513key where active='1'";	//选取活跃值（active）为1的数据进行展示
    $result2=mysql_query($sql2,$link);
    while($row2=mysql_fetch_assoc($result2))
    {
        
        $query2="select department from idpass WHERE id = {$row2['department']}";
        $bumen2=$mysql->getVar($query2);
        echo "<tr>";
        echo "<td align='center'>513-{$row2['keyid']}</td>";
		echo "<td align='center'>{$row2['time']}</td>";
		echo "<td align='center'>$bumen2</td>";
        echo "<td align='center'><a href='delaction.php?action=get513&id={$row2['keyid']}'>在我这</a></td>";
        echo "</tr>";
   
    }
    // $mysql->closeDb();  
}

        ?>
            </table></center>
        <?php
include "main.php";
?>
    </body>
</html>