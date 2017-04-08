<html>
    <head>
    	<title>反馈系统</title>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="text/javascript">
        
    </script>
    </head>
    <body>
        <a href="index.php"style="text-decoration:none">首页<?php echo"》"?></a><a href="feedbackfront.php"style="text-decoration:none">建议和举报<?php echo"》"?></a>建议
        <form name="suggestion" method="post" action="feedback.php"onsubmit="return verification()">
            <center><h2>请留下你对青年志愿者总队的宝贵意见和建议</h2></center>
            <center><input type="hidden" value="suggestion" name="department"/></center>
            <center><textarea name="content" cols="45" rows="10"id="suggest"></textarea></center>
            <center><input type="submit" value="提交"/></center>
        </form>   
        <script>
              function verification(){
              var form=document.getElementById("suggest").value;
              if (form==null||form=="")
               {
                 alert("建议内容不能为空");
                 return false
               }
              else {return true}
                }  
        </script>
    </body>
</html>
                