<html>
      <head>
    	   <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1" />
           <title>修改拼车信息</title>
      </head>
   <body>
<?php
$con=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$password=$_POST["password"];
mysql_select_db(SAE_MYSQL_DB, $con);
$result = mysql_query("SELECT * FROM carshare order by password desc");
echo "<table border='1'>
         <tr>
            <th>起点</th><th>终点</th><th>开始时间</th><th>终止时间</th><th>姓名</th><th>性别</th><th>联系方式</th><th>备注</th>
		 </tr>";
$suggestion = mysql_query("SELECT * FROM feedback where department!='suggestion' order by id desc");
while($row = mysql_fetch_array($suggestion))
  {
  echo "<tr>";
  echo "<td>" .$row['department']."</td>";
  echo "<td>" .$row['content'] . "</td>";
  echo "<td>" .$row['localtime'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
    </body>
</html>