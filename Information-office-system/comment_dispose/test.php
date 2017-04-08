<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
        
        <style type="text/css">
    .div1{position:absolute;display:none;}
    .div2{position:absolute;display:none;}
            #btn1:hover{
            
            }
    </style>
    <script type="text/javascript">
        function div1Show() {
            
            var div1 = document.getElementById("div1");
            div1.style.display = "block";
        }
        function div2Show() {
            var div1 = document.getElementById("div1");
            var div2 = document.getElementById("div2");
            div1.style.display = "block";
            div2.style.display = "block";
        }
    </script>
    </head>
   <body>
        <a href="index.php"style="text-decoration:none">首页<?php echo"》"?></a>查看建议
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
<th>建议</th>
<th>回复</th>
<th>时间</th>
</tr>";
$suggestion = mysql_query("SELECT * FROM feedback where department='suggestion' order by id desc");
//if ($suggestion=="suggestion")
while($row = mysql_fetch_array($suggestion))
  {
  echo "<tr>";
  echo "<td>" . $row['content'] . "</td>";
    echo "<td>" . '<input type="button" value="回复" id="btn1" onclick="div1Show()"/> ' ."</td>";
  echo "<td>" . $row['localtime'] ."</td>";
  
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
       <div id="div1" class="div1">
        
           <textarea></textarea>
    </div>
    </body>
</html>