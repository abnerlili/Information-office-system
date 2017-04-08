<?php session_start(); ?>
<html>
    
    <!--此文件是游客查看即将开展的活动的页面。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>即将展开的活动</title>
    </head>
	<body>
         <a href="index.php"style="text-decoration:none">首页<?php echo"》"?></a>即将开展的活动
	<table width="900" border="1" align="center">
        <caption>近期活动列表</caption>
		<tr>
            <th><center>活动名称</center></th><th><center>开始时间</center></th><th><center>结束时间</center></th>
            <th align="center">举办地点</th><th align="center">单位</th><th><center>联系人</center></th><th><center>联系电话</center></th><th>备注</th>
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
        <center><a href="javascript:history.go(-1)" >返回上一页</a></center>
        <center><a href="javascript:history.go(0)" >刷新</a></center>
  
    </body>
</html>
