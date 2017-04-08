<?php session_start(); ?>
<?php

//这个文件用来执行删除操作，判断action的类型，决定删除什么项。


//连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS) ;//or die ("查询失败");

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

//选择数据库
mysql_select_db(SAE_MYSQL_DB,$link);

//动作选择
switch($_GET["action"]){
    
    //活动删除
    case "del":   
    $sql="DELETE FROM activity WHERE ID={$_GET['ID']}";
    mysql_query($sql,$link);
    //自动跳转回浏览界面
    header("Location:delactivity.php");
    break;


    //活动室删除
    case "del1":
    $sql1="delete from activityroom where ID={$_GET['ID']}";
    mysql_query($sql1,$link);
    //自动跳转回浏览页面
    header("Location:delclass.php");
    break;
    
    //512删除
    case "del2":
    $sql2="delete from 512room where ID={$_GET['ID']}";
    mysql_query($sql2,$link);
    //自动跳转回浏览页面
    header("Location:delclass.php");
    break;
    
    //取得512钥匙
    case "get512":
    //$nowtime=date("Y-m-d H:i:s",time());	//获取交接时间
    $keyid=$_GET['id'];					//获取交接钥匙编号
    $update="update 512key set active='0' where keyid={$_GET['id']}";//更改已交接钥匙活跃值为0
    mysql_query($update,$link);
    $sql3="insert into 512key values('$keyid',NULL,'$_SESSION[ID]','1',NULL)";//插入新的数据
    mysql_query($sql3,$link);
    //自动跳转回浏览页面
    header("Location:keyfront.php");
    break;
    
    //取得513钥匙
    case "get513":
    //$nowtime=date('Y-m-d H:i:s',time());	//获取交接时间
    $keyid513=$_GET['id'];					//获取交接钥匙编号
    $update1="update 513key set active='0' where keyid={$_GET['id']}";//更改已交接钥匙活跃值为0
    mysql_query($update1,$link);
    $sql4="insert into 513key values('$keyid513',NULL,'$_SESSION[ID]','1',NULL)";//插入新的数据
    mysql_query($sql4,$link);
    //自动跳转回浏览页面
    header("Location:keyfront.php");
    break;

    //队旗归属
    case "getflag":
    $flagid=$_GET['flagid'];					//获取交接队旗编号
    $updateflag1="update teamflag set active='0' where flagid='$flagid'";//更改已交接队旗活跃值为0
    mysql_query($updateflag1,$link);
    $sql5="insert into teamflag values('$flagid',NULL,'$_SESSION[ID]','1',NULL)";//插入新的数据
    mysql_query($sql5,$link);
    //自动跳转回浏览页面
    header("Location:teamflagfront.php");
    break;
    
    case "returnflag":
    $flagid=$_GET['flagid'];					//获取交接队旗编号
    $updateflag2="update teamflag set active='0' where flagid='$flagid'";//更改已交接队旗活跃值为0
    mysql_query($updateflag2,$link);
    $sql6="insert into teamflag values('$flagid',NULL,'200','1',NULL)";//插入新的数据
    mysql_query($sql6,$link);
    //自动跳转回浏览页面
    header("Location:teamflagfront.php");
    break;
    
    //队章归属
    case "getseal":
    $flagid=$_GET['sealid'];					//获取交接队章编号
    $updateflag1="update seal.information set active='0' where sealid='$sealid'";//更改已交接队章活跃值为0
    mysql_query($updateseal1,$link);
    $sql5="insert into seal.information values('$sealid',NULL,'$_SESSION[ID]','1',NULL)";//插入新的数据
    mysql_query($sql5,$link);
    //自动跳转回浏览页面
    header("Location:teamseal.php");
    break;
    
    case "returnseal":
    $flagid=$_GET['sealid'];					//获取交接队旗编号
    $updatefseal1="update seal.information set active='0' where sealid='$sealid'";//更改已交接队旗活跃值为0
    mysql_query($updateseal1,$link);
    $sql6="insert into seal.information values('$sealid',NULL,'200','1',NULL)";//插入新的数据
    mysql_query($sql6,$link);
    //自动跳转回浏览页面
    header("Location:teamseal.php");
    break;
    
    
    //物资修改
    case "resource":
    $newresource = $_GET['newresource'];
    $sql7="UPDATE idpass set resource= '$newresource'WHERE ID={$_GET['ID']}";
    mysql_query($sql7,$link);
    //自动跳转回浏览界面
    header("Location:changeresource.php");
    break;
    
    //面试结果录入
    case "interview":
    $result = $_GET['result'];
    $sql8="UPDATE register set result= '$result'WHERE ID={$_GET['ID']}";
    mysql_query($sql8,$link);
    //自动跳转回浏览界面
    header("Location:inputfront.php");
    break;
    //更多待定
    default:
    break;
}
//关闭数据库
//$mysql->closeDb();
?>