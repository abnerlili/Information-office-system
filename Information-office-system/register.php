<?php session_start(); ?>
<html>
    <!--这个文件用来处理报名总队的人的申请  -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    $name		= $_POST['name'];
    $sex		= $_POST['sex'];
    $department	= $_POST['department'];
    $cell		= $_POST['cell'];
    $QQ			= $_POST['QQ'];
    $hometown 	= $_POST['hometown'];
    $year		= $_POST['year'];
    $month		= $_POST['month'];
    $day		= $_POST['day'];
    $dorm1		= $_POST['dorm1'];
    $dorm2		= $_POST['dorm2'];
    $dorm3		= $_POST['dorm3'];
    $academy	= $_POST['academy'];
    $major		= $_POST['major'];
    $interest	= $_POST['interest'];
    $birthday	= date("Y-m-d",strtotime("$year"."-"."$month"."-"."$day"));
    $dorm		= "$dorm1"."#"."$dorm2"."-"."$dorm3";
    $class      = $_POST['class_num'];
    if ($sex == "male") $sex = "男"; else $sex = "女";     
    $mysql	= new SaeMysql();
    $result = "未面试";
    $sqlinsert	= "INSERT INTO register VALUES('$name','$sex','$department','$cell','$QQ','$hometown','$birthday','$dorm','$academy','$major','$class','$interest','$result',NULL)";
    $insertresult = $mysql->runSql($sqlinsert);
    if( $mysql->errno() != 0 )
    {
        die( "Error:" . $mysql->errmsg() );
    }
    else
    {
        $sql = "SELECT * FROM idpass WHERE  id='$department'";
        $result = $mysql->getLine($sql);
        $ministeraddress = $result['email'];
        $secretaryaddress = "961286016@qq.com";     
        $mail = new SaeMail();
        $time = date("Y-m-d",time());
        //$contenttominister = "有一名同学于{$time}申请加入你部门，请于24小时之内给予答复。他的信息如下：姓名：{$name}，性别：{$sex}，手机号：{$cell}，QQ号：{$QQ}，家乡：{$hometown}，生日：{$birthday}，宿舍号：{$dorm}，学院：{$academy}，专业：{$major}，兴趣特长：{$interest}。";
        // $contenttoviceleader = "有一名同学于{$time}申请加入{$result['department']}，请督促{$result['department']}负责人24小时之内联系该同学。该同学的信息如下：姓名：{$name}，性别：{$sex}，手机号：{$cell}，QQ号：{$QQ}，家乡：{$hometown}，生日：{$birthday}，宿舍号：{$dorm}，学院：{$academy}，专业：{$major}，兴趣特长：{$interest}。";
        //$ret = $mail->quickSend("$ministeraddress","你部门有新的申请",$contenttominister,"18092789069@163.com","woshiwangzhenyu0");
        //$ret1 = $mail->quickSend("$secretaryaddress","总队有新的申请",$contenttoviceleader,"18092789069@163.com","woshiwangzhenyu0");
        //if ($ret == false)
        //var_dump($mail->errno(), $mail->errmsg());
        // else
            // {
        // $mail->clean();
        //$ret = $mail->quickSend("$secretaryaddress","总队有新的申请",$contenttoviceleader,"18092789069@163.com","woshiwangzhenyu0");
        // if ($ret == false)
        // var_dump($mail->errno(), $mail->errmsg());
        //   else
        //  {
                echo "<center>您的申请已经提交到{$result['department']}部长和秘书处部长邮箱中，24小时之内将会给您答复！</center>";
                echo "<center><a href='showactivityguest.php'>查看即将开展的活动</a></center>
        			  <center><a href='showclassguest.php'>查看当前教室申请情况</a></center>
        			  <center><a href='registerfront.php' >我要报名加入总队</a></center>";
                echo "<center><a href='index.php'>回到主页</a></center>";
        //}
        // }
    }
    $mysql->closeDb();
}
        ?>
    </body>
</html>