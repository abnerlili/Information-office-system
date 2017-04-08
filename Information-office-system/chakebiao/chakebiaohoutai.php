<?php session_start(); ?>
<html>
    <!-- 这个是管理员查看空闲人员名单的页面。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>无课人员名单</title>
    </head>
	<body>
	<table border="1" width="300" align="center" >
        <caption><h2>无课人员</h2></caption>
		<tr>
            <th align="center">姓名</th><th align="center">部门</th>
		</tr>
<?php

//连接数据库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

//得到查询的时间

$year=$_POST["selyear"];
$month=$_POST["selmonth"];
$day=$_POST["selday"];
$selclass=$_POST["selclass"];
$time="$year"."-"."$month"."-"."$day";
$findtime=date('Y-m-d',strtotime("$time"));
$kaixueweek=date('W',strtotime('2015-3-9'));
$findweek=date('W',strtotime("$time"));
$diffweek=$findweek-$kaixueweek + 1;
//判断该时间属于第几周

if($link)
{
    mysql_select_db(SAE_MYSQL_DB,$link);
    $mysql = new saeMysql();
    $sql="SELECT schooltimetable.class,register.name,register.department,schooltimetable.week$diffweek FROM schooltimetable,register WHERE register.class=schooltimetable.class ORDER BY register.department ASC";
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result))
    {
        
        //将课程的01字符串转化为数组$arr，用一寻找合适的时间，进而判断是否有课。
        
        $str = $row["week$diffweek"];
      
        $arr=str_split($str);
        //5个字符代表一天，从而计算查询的是本周的第几天，选择合适的数据下标，找到第几节课
        
        $weekday = date('w',strtotime("$time"));
        $j = ($weekday-1) * 5 + $selclass - 1;
        
        
        //如果没有课，则进行记录,找到对应的班级,并存入变量中，以便后期的寻找
        if($arr[$j] == '0')
        {
            $findclass = $row['class'];
    
            $sql2 = "select department from idpass WHERE id = {$row['department']}";
            $department = $mysql->getVar($sql2);
             
            echo "<tr>";
            echo "<td align='center'>{$row['name']}</td>";
            echo "<td align='center'>$department</td>";
            echo "</tr>";
            
        }
    } 
    $mysql->closeDb();
        
}

?>
        </table>
        </body>
</html>