<?php session_start(); ?>
<html>
    
    <!--这是拼车信息查询的后台。 -->
    <head>
        <meta charset="utf-8"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>拼车信息</title>
    </head>
	<body>
<?php
// 连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
$password=$_SESSION["password"];

if($link)
{
    mysql_select_db(SAE_MYSQL_DB,$link);
  
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $phonenumber=$_POST['phonenumber'];
    $starttime=$_POST['starttime'];
    $endtime=$_POST['endtime'];
    $startplace1=$_POST["startplace"];
    $destination=$_POST["destination"];
    $comment=$_POST["comment"];
    $password=$_SESSION["password"];
    $submit=$_POST['submit'];
    $submit_del=$_POST['submit_del'];

}

    
    if($submit)
    {//判定成功
		$mysql = new SaeMysql();
        // $sql="insert into($name,$phonenumber,$sex,$startplace,$destination,$starttime,$endtime,$comment,$password) select * from carshare where password={$password}";
         $sql="delete from carshare where password= $password";
			mysql_query($sql,$link);
        $sql1 ="INSERT INTO carshare VALUES( '$name','$phonenumber','$sex','$startplace','$destination','$starttime' , '$endtime' , '$comment','$password')";
        mysql_query($sql1,$link);
			if( $mysql->errno() != 0)
			{
				die( "Error:" . $mysql->errmsg() );
			}
    		else
    		{
               
        		echo "<center>成功修改拼车信息！</center>";
                echo "<center><a href=\"javascript:history.go(-4)\">回到首页</a></center>";
                }
        }
	if($submit_del)
    {
        $mysql = new SaeMysql();
        // $sql="insert into($name,$phonenumber,$sex,$startplace,$destination,$starttime,$endtime,$comment,$password) select * from carshare where password={$password}";
         $sql2="delete from carshare where password= $password";
        mysql_query($sql2,$link);
        echo "<center>成功删除拼车信息！</center>";
        echo "<center><a href=\"javascript:history.go(-4)\">回到首页</a></center>";
    }
         ?>
    </body>
</html>

