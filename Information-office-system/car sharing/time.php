<?php session_start(); ?>
<html>
    <!--此文件用来拼车 -->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
    <body>
        <?php
			/**
 			* 求两个日期之间相差的天数
 			* @param string $day1
 			* @param string $day2
 			* @return number
 			*/
			function diffBetweenTwoDays ($day1, $day2)
			{
  				$second1 = strtotime($day1);
  				$second2 = strtotime($day2);
    
  				if ($second1 < $second2)
                {
    				$tmp = $second2;
    				$second2 = $second1;
    				$second1 = $tmp;
  				}
  				return ($second1 - $second2) / 86400;
			}
        ?>
<?php
// 连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

if($link)
{
    mysql_select_db(SAE_MYSQL_DB,$link);

    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $phone=$_POST['phone'];
    $year1=$_POST['year1'];
    $month1=$_POST['month1'];
    $day1=$_POST["day1"] + 1;
    $hour1=$_POST["hour1"];
    $minute1=$_POST["minute1"];
    $year2=$_POST['year2'];
    $month2=$_POST['month2'];
    $day2=$_POST["day2"] + 1;
    $hour2=$_POST["hour2"];
    $minute2=$_POST["minute2"];
    $selplace1=$_POST["selplace1"];
    $selplace2=$_POST["selplace2"];
    $comment=$_POST["comment"];

    //echo $year1.$month1.$day1.$hour1.$minute1."---".$year2.$month2.$day2.$hour2.$minute2;
        
    //时间比较
    $nowtime = date("Y-m-d",time());
    $addt1="$year1"."-"."$month1"."-"."$day1";
    $addtime1 = date('Y-m-d',strtotime("$addt1"));
    $diff= diffBetweenTwoDays ($nowtime,$addtime1);
    if ($sex == "male") $sex = "男"; else $sex = "女"; 
    //能否申请判定
    
    if(1)
    {//判定成功
    
    	$t1="$year1". "-"."$month1"."-"."$day1". " $hour1".":"."$minute1".":"."00";
    	$time1=date('Y-m-d H:i:s',strtotime("$t1"));
    	$t2="$year2". "-"."$month2"."-"."$day2". " $hour2".":"."$minute2".":"."00";
    	$time2=date('Y-m-d H:i:s',strtotime("$t2"));
		$mysql = new SaeMysql();
        $findsame = "SELECT * FROM carshare WHERE name='$name'AND phonenumber='$phone' AND starttime='$time1' AND endtime='$time2' AND sex='$sex'  AND comment='$comment'";
        $sameresult = $mysql->getData($findsame);
        if($sameresult == 0)
        {
            
    		$sql ="INSERT INTO carshare VALUES( '$name','$phone','$sex','$selplace1','$selplace2','$time1' , '$time2' , '$comment')";
			$mysql->runSql( $sql );
			if( $mysql->errno() != 0)
			{
				die( "Error:" . $mysql->errmsg() );
			}
    		else
    		{
        		echo "<center>成功添加拼车信息！</center>";
                // echo "<center>3秒后将返回主页面！</center>";
                //echo "<meta http-equiv="refresh" content="3; url=http://1.querysystem.sinaapp.com/index.php/" />";
         ?>
 				 <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
       			 <tr><td align="center"><a href="http://1.querysystem.sinaapp.com/index.php" >返回主菜单</a></tr>
       			 </table>
        <?php
   	 		}

			$mysql->closeDb();
    	}
    }    
    else
    {
        echo "<center>活动不要申请这么早撒~40天之内就行啦~</center>
        	<center><a href=\"javascript:history.go(-1)\">回去重新申请吧</a></center>";
    }
}
?>
    </body>
</html>