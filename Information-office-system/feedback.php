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
    $department      =$_POST['department'];
    $content         =$_POST['content'];
    $localtime       =$_POST['localtime'];        
    $mysql	= new SaeMysql();   
    $sqlinsert	= "INSERT INTO feedback VALUES('$department','$content','$localtime',NULL)";
    $insertresult = $mysql->runSql($sqlinsert);
     if( $mysql->errno() != 0 )
	{
    	die( "Error:" . $mysql->errmsg() );
	}
    else
    {
       if($department == "suggestion")
        {
           echo "<br /><center><h4>您的建议我们已经录入到数据库中，稍后会有工作人员进行处理，谢谢您的建议和支持~！</h4></center>";
           $mail = new SaeMail();
           $mailcontent = "有一名同学对总队提出了建议，建议内容为：{$content},请及时处理";
           $ret = $mail->quickSend("781031022@qq.com","收到建议",$mailcontent,"18092789069@163.com","woshiwangzhenyu0");
           if ($ret === false)
              var_dump($mail->errno(), $mail->errmsg());
           else
           {
              $mail->clean();
                echo "<center>您的建议已经发到队长邮箱，谢谢您O(∩_∩)O</center>";
           }
           echo "<center><a href='index.php'>回到主页</a></center>";
           
       }
       else
       {
           echo "<br /><center><h4>您的投诉我们已经录入到数据库中，稍后会有工作人员进行处理，谢谢您的建议和支持~！</h4></center>";
           $sql = "SELECT department FROM idpass WHERE  id='$department'";
           $bumen = $mysql->getVar($sql);
           $mail = new SaeMail();
           $mailcontent = "有一名同学对{$bumen}进行投诉，投诉内容为：{$content},请及时处理";
           $ret = $mail->quickSend("781031022@qq.com","收到投诉",$mailcontent,"18092789069@163.com","woshiwangzhenyu0");
           if ($ret === false)
             var_dump($mail->errno(), $mail->errmsg());
           else
             {
             $mail->clean();
             echo "<center>您的投诉已经发到队长邮箱，谢谢您O(∩_∩)O</center>";
            }
           echo "<center><a href='index.php'>回到主页</a></center>";
       }
    }
    $mysql->closeDb();
    
}
?>
    </body>
</html>