<?php session_start(); ?>
<?php
$con=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$password=$_SESSION["password"];
mysql_select_db(SAE_MYSQL_DB, $con);
$result = mysql_query("SELECT * FROM carshare where password=$password");
$row = mysql_fetch_assoc($result);

?>
<html>
      <head>
    	   <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1" />
           <title>修改拼车信息</title>
      </head>
    
   <body>

       
       <form  name ="carsharing" method="post" action="reviseback.php">
    <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
        <caption>发起拼车</caption>
        <tr><td>姓名：<input type="text" name="name" size="30" value="<?php echo $row['name']?>" /></td></tr>
        <tr><td>性别：<input type="text" name="sex" size="30" value="<?php echo $row['sex']?>" /></td></tr>
        <tr><td>电话：<input type="text" name="phonenumber" size="30" value="<?php echo $row['phonenumber']?>" /></td></tr>
        <tr><td>出发时间：<input type="text" name="starttime" size="30" value="<?php echo $row['starttime']?>" /></td></tr>
        <tr><td>结束时间：<input type="text" name="endtime" size="30" value="<?php echo $row['endtime']?>" /></td></tr>
        <tr><td>出发地点：<input type="text" name="startplace" size="30" value="<?php echo $row['startplace']?>" /></td></tr>
        <tr><td>目的地点：<input type="text" name="destination" size="30" value="<?php echo $row['destination']?>" /></td></tr>
        <tr><td>备注：<input type="text" name="comment" size="30" value="<?php echo $row['comment']?>" /></td></tr>
    
        <tr><td align="center"><input type="submit" name="submit" value="提交"></td></tr>
        <tr><td align="center"><input type="submit" name="submit_del" value="删除"></td></tr>
        
        <tr><td align="center"><a href="javascript:history.go(-1)" >返回上一页</a></tr>
        </table>
    </form>
    </body>
</html>