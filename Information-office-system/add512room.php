<?php session_start(); ?>
<html>
    <!--这个文件用来添加512使用申请  -->
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
    
    if($second1 < $second2) 
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

    
    $year1=intval($_POST['selyear']);
    $month1=intval($_POST['selmonth']);
    $day1=intval($_POST["selday"]) + 1;
    $comment=$_POST["comment"];
    $department=$_SESSION["ID"];

    //时间比较
    $nowtime = date("Y-m-d",time());
    $addt1="$year1"."-"."$month1"."-"."$day1";
    $addtime1 = date('Y-m-d',strtotime("$addt1"));
    $diff= diffBetweenTwoDays ($nowtime,$addtime1);
    

    
    //能否申请判定
    
    if($diff <= '8' )
    {//判定成功
    
    	$t1="$year1". "-"."$month1"."-"."$day1";
    	$time1=date('Y-m-d',strtotime("$t1"));
        
        $mysql = new SaeMysql();
        
        $sqlconflict = "SELECT * FROM 512room WHERE time1 = '$time1'";
        $dataconflict = $mysql->getData($sqlconflict);
        if($dataconflict == 0)
        {
            $sql ="INSERT INTO 512room VALUES(  '$time1' ,'$department' , NULL , '$comment')";
            $mysql->runSql( $sql );
            if( $mysql->errno() != 0)
            {
                die( "Error:" . $mysql->errmsg() );
            }
            else
            {
                echo "<center>成功申请使用512！</center><br>";
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