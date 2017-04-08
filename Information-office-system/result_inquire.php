<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
                <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>面试结果</title>
    </head>
    <body>
        
        <table width="300" border="1" align="center">
            <caption>面试结果</caption>
            <tr>
                <th>姓名</th><th>面试结果</th>
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
    $name = $_POST["name"];
    $cell= $_POST["cell"];
    $sql="select * from register";
    $result=$mysql->getData($sql);
    $row = count($result);
    $found=false;
    for($i=0;$i<$row;$i++)
    {
        $line = $result[$i];
        if(strstr($line["name"],$name))
        {
            if(strstr($line["cell"],$cell))
            {
                $found=true;
                echo "<tr>";
                echo "<td align='center'>{$line['name']}</td>";
                echo "<td align='center'>{$line['result']}</td>";
                echo "</tr>";	
            }
        }
    }
    if(!$found)
        echo "<tr><td colspan='4' align='center'>对不起，您输入的信息有误。</td></tr>";
    $mysql->closeDb();  
}        
            ?>	
        </table>
                <center><a href="http://1.querysystem.sinaapp.com/index.php"/>返回首页</center>
        <?php

include "main.php";

        ?>
    </body>
</html>
