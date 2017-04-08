<?php session_start(); ?>
<html>
    <head>
        <title>队章去哪了</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
    <body>
        
                <?php
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS); //连接数据库
if($link)
{
    if ($_SESSION['login'] == "NO")
    {
        echo ("<center>您还没有登录！</center><br />");
        include "index.php";
    }
    else
    {
        mysql_select_db("app_informationsystems",$link);

        $mysql = new SAEmysql();

        //展示队旗
        $sql="select * from team_seal where active='1'";	//选取活跃值（active）为1的数据进行展示
        $result=mysql_query($sql,$link);
        if($result)
        {
            echo "<center>
            <table width=\"320\" border=\"1\">
            <caption>队章交接</caption>
            <tr>
            <th width=\"35\">编号</th><th>变动时间</th><th width=\"50\">位置</th><th width=\"50\">操作1</th><th width=\"65\">操作2</th>
            </tr>";
            while($row=mysql_fetch_assoc($result))
            {
                if ($row['department'] == '200')
                    $bumen = "活动室";
                else
                {
                    $query="select department from idpass where id={$row['department']}";
                    $bumen=$mysql->getVar($query);
                }
                echo "<tr>";
                echo "<td align='center'>"."{$row['sealid']}</td>";
                echo "<td align='center'>{$row['changetime']}</td>";
                echo "<td align='center'>$bumen</td>";
                echo "<td align='center'>";
                ?>
        
        <form action="delaction.php" onsubmit="return confirm('你确定队章现在在你这吗？');" style="margin:0px">
            <input type="hidden" name="action" value="getseal" />
            <input type="hidden" name="sealid" value="<?php echo "{$row['sealid']}";?>" />
            <input type="submit" value="在我这" />
        </form>
                
                    
        <?php echo"</td>";
              echo "<td align='center'>";?>
                        
        <form action="delaction.php" onsubmit="return confirm('你确定你把这个队章放活动室了吗？');" style="margin:0px">
            <input type="hidden" name="action" value="return_seal" />
            <input type="hidden" name="sealid" value="<?php echo "{$row['sealid']}";?>" />
            <input type="submit" value="放活动室了" />
        </form>

                    
        <?php
              echo "</td></tr>";
            }
        }
        echo "</table><tr><td>";
        include "main.php";
        echo "</td></tr></table>";
        $mysql->closeDb();
    }

}
				?>
    </body>
</html>