<?php session_start(); ?>
<!doctype html> 
<HTML>

    <!--此文件是信息化办公系统的主页。 -->
    <HEAD>
        <TITLE>总队信息化办公系统主页</TITLE>
        <meta charset="utf-8"/>
        <meta name="viewport"/>
        <link href="css/index.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </HEAD>
    
    <BODY>

        <div class="t_name">
            <center><h3>青年志愿者总队</h3></center><br/>
            <center><h2>信息化办公系统</h2></center>
        </div>
        <form  method="post" action="login.php">
            <div class="field">
                <div class="field_left">账号</div>
                <div class="field_right"><input type="text" name="user_name" id="name" /></div>   
            </div>
            <div class="field">
                <div class="field_left">密码</div>
                <div class="field_right"><input type="password" name="user_pw"  id="ps" /></div>
            </div>
            <div class="botton">
                <input type="submit" name="Submit" value="提交"class="btn">
                <input type="reset" name="Submit2" value="重置" class="btn">
            </div>
            <?php
            $_SESSION["login"] = "NO";
            ?>
            
        </form>
        
        <div class="mode">     
            <p><center><a href="feedbackfront.php" />建议举报</center></p>
            <p><center><a href="f_suggestionecho.php" />查看建议</center></p>           
            <p><center><a href="registerfront.php" />新生报名</center></p>
            <p><center><a href="result_inquirefront.php"/>录取结果</center></p>
            <p><center><a href="car sharing/front.php" />我要拼车</center></p>      
            <p><center><a href="showactivityguest.php"/>活动预告</center></p>
            <p><center><a href="showclassguest.php"/>教室申请情况</center></p>
            <p><center><a href="car sharing/information.php" />查看拼车信息</center></p>
            <p><center><a href="car sharing/reviselogin.php" />修改拼车信息</center></p>
            
        </div>      
    </BODY>
</HTML>