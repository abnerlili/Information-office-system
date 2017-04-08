<?php session_start(); ?>
<html>
    <!--此文件用来申报活动 -->
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
    $place=$_POST["place"];
    $comment=$_POST["comment"];
    $department=$_SESSION["ID"];
    //echo $year1.$month1.$day1.$hour1.$minute1."---".$year2.$month2.$day2.$hour2.$minute2;
        
    //时间比较
    $nowtime = date("Y-m-d",time());
    $addt1="$year1"."-"."$month1"."-"."$day1";
    $addtime1 = date('Y-m-d',strtotime("$addt1"));
    $diff= diffBetweenTwoDays ($nowtime,$addtime1);
    
    //能否申请判定
    
    if($diff <= '40')
    {//判定成功
    
    	$t1="$year1". "-"."$month1"."-"."$day1". " $hour1".":"."$minute1".":"."00";
    	$time1=date('Y-m-d H:i:s',strtotime("$t1"));
    	$t2="$year2". "-"."$month2"."-"."$day2". " $hour2".":"."$minute2".":"."00";
    	$time2=date('Y-m-d H:i:s',strtotime("$t2"));
		$mysql = new SaeMysql();
        $findsame = "SELECT * FROM activity WHERE name='$name' AND time1='$time1' AND time2='$time2' AND department='$department' AND comment='$comment'";
        $sameresult = $mysql->getData($findsame);
        if($sameresult == 0)
        {
            
    		$sql ="INSERT INTO activity VALUES( '$name' , '$time1' , '$time2' , '$place' ,'$department' , NULL , '$comment')";
			$mysql->runSql( $sql );
			if( $mysql->errno() != 0)
			{
				die( "Error:" . $mysql->errmsg() );
			}
    		else
    		{
        		echo("<br><br<br><center>成功添加活动！</center><br><br><br>");
                include "main.php";
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