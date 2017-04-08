<?php session_start(); ?>
<html>
    
    <!--这是拼车信息查询的后台。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>拼车信息</title>
    </head>
	<body>
        <a href="/index.php"style="text-decoration:none">首页<?php echo"》"?></a>拼车信息
   
        	<table width="700" border="1" align="center">
                <caption>查询结果</caption>
        <tr>
            <th>起点</th><th>终点</th><th>开始时间</th><th>终止时间</th><th>姓名</th><th>性别</th><th>联系方式</th><th>备注</th>
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
    // $item = $_POST["resource"];
   	$sql="select * from carshare ";
    $nowtime = date("Y-m-d H:m:s",time());
	$result=$mysql->getData($sql);
	$row = count($result);
    // $found = false;
        for($i=0;$i<$row;$i++)
		{
			$line = $result[$i];
            //if(strstr($line["resource"],$item))
            if($line['endtime'] >= $nowtime)
        	{
                // $found = true;
            	echo "<tr>";
       			echo "<td align='center'>{$line['startplace']}</td>";
				echo "<td align='center'>{$line['destination']}</td>";
                echo "<td align='center'>{$line['starttime']}</td>";
                echo "<td align='center'>{$line['endtime']}</td>";
				echo "<td align='center'>{$line['name']}</td>";
                echo "<td align='center'>{$line['sex']}</td>";
                echo "<td align='center'>{$line['phonenumber']}</td>";
                echo "<td align='center'>{$line['comment']}</td>";
        		echo "</tr>";		
        	}
    	}
    // if(!$found)
    //  echo "<tr><td colspan='4' align='center'>对不起，未找到您所查询的物资。</td></tr>";

	$mysql->closeDb();  
}        
?>	
        <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
        <tr><td align="center"><a href="javascript:history.go(-1)" >返回上一页</a></tr>
        </table>
        </table>
	</body>
</html>
