<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
   <body>
<?php
$con=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db(SAE_MYSQL_DB, $con);
$result = mysql_query("SELECT * FROM feedback order by id desc");
echo "<table border='1'>
<tr>
<th>部门</th>
<th>投诉</th>
<th>时间</th>
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

