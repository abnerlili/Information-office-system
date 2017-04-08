<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>新生报名总队情况</title>
    </head>
    <body>
        
        <table width="500" border="1" align="center">
            <caption>申请加入总队的新生</caption>
            <tr>
                <th>序号</th><th>姓名</th><th>申请部门</th><th>性别</th><th>联系电话</th><th>QQ</th><th aligh="center">面试结果</th> 
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
    $sql="SELECT DISTINCT name,sex,cell,QQ,result,department from register order by ID asc";
    $result=$mysql->getData($sql);
    $row = count($result);    
    for($i=0;$i<$row;$i++)
    {
        $line = $result[$i];
        $sql1 = "select department from idpass WHERE id = '{$line['department']}'";
        $depart=$mysql->getVar($sql1);
        $num=$i+1;
        echo "<tr>";
        echo "<td align='center'>$num</td>";
        echo "<td align='center'>{$line['name']}</td>";
        echo "<td align='center'>$depart</td>";
        echo "<td align='center'>{$line['sex']}</td>";
        echo "<td align='center'>{$line['cell']}</td>";
        echo "<td align='center'>{$line['QQ']}</td>";
        echo "<td align='center'>{$line['result']}</td>";
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
