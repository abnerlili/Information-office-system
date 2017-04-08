<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>面试结果录入</title>
    </head>
    <body>
        
        <table width="300" border="1" align="center">
            <caption>面试结果录入</caption>
            <tr>
                <th>姓名</th><th>面试结果</th><th>操作</th>
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

                $found=true;
                echo "<tr>";
                echo "<td align='center'>{$line['name']}</td>";
                echo "<td align='center'>";
                ?>
        <form action="delaction.php" onsubmit="return confirm('确认修改吗？');" style="margin:0px">
        <input type="text" name="result" value="<?php echo "{$line['result']}";?>"/>
        
        <?php
        echo "</td>";
        echo "<td align='center'>";
?>        
  
            <input type="hidden" name="action" value="interview" />
            <input type="hidden" name="ID" value="<?php echo "{$line['ID']}";?>" />
            <input type="submit" value="修改" />
        </form>
<?php
                echo "</td>";
                echo "</tr>";
            
        }
    }
    if(!$found)
        echo "<tr><td colspan='4' align='center'>对不起，您输入的信息有误。</td></tr>";
    $mysql->closeDb();  
}        
            ?>	
        </table>
        <?php

include "main.php";

        ?>
    </body>
</html>
