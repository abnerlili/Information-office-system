<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
        
        <style type="text/css">
            #div1
            {
                display:none;
                text-align:center;
                position:fixed;
                margin:auto;
                bottom:100px;
                width:100%; 
                height:150px;
            }
        </style>
        <script type="text/javascript">
            function div1Show(id) {
                var div1 = document.getElementById("div1");
                div1.style.display = "block";
                document.getElementById('pid').value=id;
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
    $pid=$row['id'];
    $result_reply = mysql_query("SELECT * FROM link_feedback where pid='$pid' order by id asc");
        ?>
        <td align="center"><button onclick="div1Show(<?php echo $row['id'];?>)">回复</button></td>               
        <div id="div1" class="div1">
            <form name="form" id="form" method="post" action="reply.php" onsubmit="return confirm('确认修改吗？');" style="margin:0px">
                <center><textarea name="content_reply" cols="45" rows="10" id="reply"></textarea></center>
                <input type="hidden" name="pid" id="pid" value="">
                <input type="submit" value="提交" style="background:yellow;">
            </form>
        </div>
        <?php
    echo "<td>" . $row['localtime'] ."</td>";
    
    echo "</tr>";
    while($row1 = mysql_fetch_array($result_reply))
    {
         echo "<tr style=\"color:red\">";
        echo "<td>" .$row1['content']. "</td>";
        echo "<td>" .NULL. "</td>";
        echo "<td>" .$row1['time']. "</td>";
        echo "</tr>";
    }
}
echo "</table>";
mysql_close($con);
        ?>
        
    </body>
</html>