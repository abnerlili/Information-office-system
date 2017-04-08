<?php session_start(); ?>
<html>
    <!-- 此文件用来申请使用活动室。-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
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
    $comment=$_POST["comment"];
    $department=$_SESSION["ID"];
    
    //时间比较
    $nowtime = date("Y-m-d",time());
    $addt1="$year1"."-"."$month1"."-"."$day1";
    $addtime1 = date('Y-m-d',strtotime("$addt1"));
    $diff= diffBetweenTwoDays ($nowtime,$addtime1);
    
    //能否申请判定
    
    if($diff <= '8')
    {//判定成功
           
    	$t1="$year1". "-"."$month1"."-"."$day1". " $hour1".":"."$minute1".":"."0";
        $time1sec = strtotime("$t1");
    	$time1=date('Y-m-d H:i:s',$time1sec);
    	$t2="$year2". "-"."$month2"."-"."$day2". " $hour2".":"."$minute2".":"."0";
        $time2sec = strtotime("$t2");
    	$time2=date('Y-m-d H:i:s',$time2sec);
        
        if( $time2sec - $time1sec >= 18000)
        {
        	die( "<center>别闹，开那么长时间的会干嘛~~边儿呆着去</center>
        		  <center><a href=\"javascript:history.go(-1)\">我错了，回去重新申请</a></center>");
        }
        
        

		$mysql = new SaeMysql();
        
        $sqlconflict = "SELECT * FROM activityroom WHERE   (time1 <= '$time1' AND '$time1'<= time2)  OR (time1 <= '$time2' AND '$time2'<=time2) OR ('$time1'<=time1 AND time2<'$time2')";
        $resultconflict = $mysql->getData($sqlconflict);
        $number = count($resultconflict);
        if($number == 0)
        {
            
    		$sql ="INSERT INTO activityroom VALUES(  '$time1' , '$time2' ,'$department' , NULL , '$comment')";
			$mysql->runSql( $sql );
			if( $mysql->errno() != 0)
			{
				die( "Error:" . $mysql->errmsg() );
			}
    		else
    		{
        		echo("<center>成功申请使用活动室！</center><br>");
                include "main.php";
    		}

    	}
        else
        {
           	echo "<center>时间冲突啦~</center>";
            echo "<center><a href=\"javascript:history.go(-1)\">我错了，回去重新申请</a></center>";
        }
        
		$mysql->closeDb();
    }
    else
    { //判定失败
        echo "<center>别闹，这么早申请干嘛~~边儿呆着去</center>
        	<center><a href=\"javascript:history.go(-1)\">我错了，回去重新申请</a></center>";
    }
}
?>
</html>