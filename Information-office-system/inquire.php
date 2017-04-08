<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
                <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>查询新生报名情况</title>
    </head>
    <body>
        <table border="1" width="500" align="center">
            <caption>申请加入我部的新生</caption>
            <tr>
                <th align='center'>序号</th><th align='center'>姓名</th><th align='center'>性别</th><th align='center'>电话</th><th align='center'>QQ</th><th aligh="center">面试结果</th> 
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
    $sql="select distinct name,sex,cell,QQ,result from register WHERE  department = $department order by ID asc";
    $result=mysql_query($sql,$link);
    $i=1;
    while($row=mysql_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td align='center'>{$i}</td>";
        echo "<td align='center'>{$row['name']}</td>";
        echo "<td align='center'>{$row['sex']}</td>";
        echo "<td align='center'>{$row['cell']}</td>";
        echo "<td align='center'>{$row['QQ']}</td>";
        echo "<td align='center'>{$row['result']}</td>";
        $i=$i+1;
            ?>     
            <?php 		    
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