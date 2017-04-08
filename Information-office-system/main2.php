<?php session_start(); ?>
<HTML>
    
    <!--此文件为管理员操作的主页面 -->
    <HEAD>
        <TITLE>管理员操作</TITLE>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </HEAD>
    <BODY>
        <?php
if ($_SESSION["login"] == "YES")
{
    switch($_SESSION["ID"])
    {
        case "2":
        case "8":
        echo "<center><a href=\"changeresource.php\">修改物资</a></center>";
        default;
    }
    switch($_SESSION["ID"])
    {
        case "10"://队长账号
        echo "<center><a href=\"feedbackecho.php\" >查看投诉</a></center>";
        echo "<center><a href=\"inquire_all.php\" >查看报名总队新生</a></center>";
        case "1"://项目部
        case "2"://秘书处
        case "3"://红十字会
        case "4"://宣传部
        case "5"://环保部
        case "6"://活动部
        case "7"://培训部
        case "8"://交流部
        case "9"://支教部
        case "0"://测试账号
        echo "<center><a href=\"resourcefront.php\">查询物资</a></center>
                      <center><a href=\"teamflagfront.php\">查看队旗</a></center>
                      <center><a href=\"teamseal.php\">查看队章</a></center>
                      <center><a href=\"add512roomfront.php\">申请使用512教室</a></center>
        			  <center><a href=\"addactivityroomfront.php\">申请使用活动室</a></center>
                      <center><a href=\"delclass.php\">删除我的教室申请</a></center>
                      <center><a href=\"inquire.php\">查看报名新生</a></center>
                      <center><a href=\"f_suggestionecho.php\">查看建议</center>
            <center><a href=\"inputfront.php\">面试结果录入</a></center>";
        case "11":
        case "12":
        case "13":
        case "14":
        case "15":
        case "16":
        case "17":
        case "18":
        echo "<center><a href=\"addactivityfront.php\">申报活动</a></center>
                      <center><a href=\"delactivity.php\">删除我的活动申报</a></center>";
        default:
        echo "<center><a href=\"showactivity.php\">查看大家已申报的活动</a></center>
        		      <center><a href=\"showclass.php\">查看大家教室申请情况</a></center>
                      <center><a href=\"updatelog.php\">查看更新日志</a></center>
                      <center><a href=\"javascript:history.go(0)\" >刷新</a></center>";
        break;
    }
    
}
else
    
        ?>
        
        
        
        
        
        
        
        
        
        
    </BODY>
</HTML>