<?php session_start(); ?>
<!doctype html> 
<HTML>
    
    <!--此文件是信息化办公系统的主页。 -->
    <HEAD>
        <TITLE>总队信息化办公系统主页</TITLE>
        <meta charset="utf-8"/>
        <meta name="viewport"/>
        <link href="css/test.css"rel="stylesheet">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/><!--shi ying da xiao-->
    </HEAD>
    
    <BODY>
        
        <div class="t_name">
            <center><h3>青年志愿者总队</h3></center><br/>
            <center><h2>信息化办公系统</h2></center>
        </div>
        <center> <form  method="post" action="login.php" align="center">
            <p><span>账号:</span>          
                <input type="text" name="user_name" id="name">        
            </p>
            <p>
                
                <span>  密码:</span>
                
                <input type="password" name="user_pw"  id="ps">
            </p>
            
            <div class="botton">
                <input type="submit" name="Submit" value="提交"class="btn">
                <input type="reset" name="Submit2" value="重置" class="btn">
            </div>
            <?php
$_SESSION["login"] = "NO";
            ?>
            </form>
        </center>  
        <table class="bordered">
            <tr>   
                <td><center><a href="feedbackfront.php" />建议举报</center></td>
            </tr>   
            <tr>
                <td><center><a href="f_suggestionecho.php" />查看建议</center></td>
            </tr>
            <tr>
                <td><center><a href="registerfront.php" />新生报名</center></td>
            </tr>
            <tr>
                <td><center><a href="car sharing/front.php" />我要拼车</center></td>
            </tr>
            <tr>
                <td><center><a href="car sharing/information.php" />拼车信息</center></td>
            </tr>
            <tr>
                <td><center><a href="showactivityguest.php"/>开展活动</center></td>
            </tr>
            <tr>
                <td><center><a href="f_suggestionecho.php" />建议信息</center></td>
            </tr>
            <tr>
                <td><center><a href="showclassguest.php"/>教室申请情况</center></td>
            </tr>
        </table>
    </BODY>
</HTML>