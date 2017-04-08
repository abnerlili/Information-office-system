<html>
    <head>
      <!--  <script type=“text/javascript” language="javascript">
        function method1(){
        alert("我们已经收到你的反馈信息，谢谢")}
        </script> -->
    	<title>投诉系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta charset="utf-8">
    </head>
<body>
    <a href="index.php"style="text-decoration:none">首页<?php echo"》"?></a><a href="feedbackfront.php"style="text-decoration:none">建议和举报<?php echo"》"?></a>举报
    <br />
    <br />
    <form name="feedback" method="post" action="feedback.php" onsubmit="return verification()">
        <center>
            <!-- 被举报人：职务<select name="office" id="office">
            <option value="0" selected>队长</option>
            <option value="1">副队长</option>
            <option value="2">部长</option>
            <option value="3">副部长</option>
            <option value="4">部员</option>
        </select>   -->
 你要投诉的部门是
            <select name="department" id="department">
                <option value="1">项目部</option>            
                <option value="2">秘书处</option>            
                <option value="3">红十字会</option>            
                <option value="4">宣传部</option>
            	<option value="5">环保部</option>            
                <option value="6">活动部</option>            
                <option value="7">培训部</option>            
                <option value="8">交流部</option>            
                <option value="9">支教部</option>
                <option value="10">总队</option>
            </select>
        </center>
        <br />
        <br />
        <center>内容</center>
        <center><textarea name="content" cols="45" rows="10" id="suggest"></textarea></center>
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
            