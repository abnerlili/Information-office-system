<?php session_start(); ?>
<html>
    <!--这个文件用来处理反馈信息  -->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
    <body>
        <?php
// 连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

if($link)
{
    mysql_select_db(SAE_MYSQL_DB,$link);
    $pid      		 =$_POST['pid'];
    $content         =$_POST['content_reply'];
    $localtime       = $nowtime = date("Y-m-d H:i:s",time());;
    $mysql	= new SaeMysql();   
    $sqlinsert	= "INSERT INTO link_feedback VALUES(NULL,'$pid','队长回复：$content','$localtime')";
    $insertresult = $mysql->runSql($sqlinsert);
    if( $mysql->errno() != 0 )
    {
        die( "Error:" . $mysql->errmsg() );
    }
    else
    {
       echo "<center>你的回复已成功提交！</center>";
    }
    include "main.php";
$mysql->closeDb();

}
        ?>
    </body>
</html>