<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>抽奖</title>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <script language="javascript">
		function check(form)
		{
			if(document.addvo.name.value==""   || document.addvo.phonenumber.value=="" || document.addvo.number.value=="" )
			{
				alert("请完善个人信息后再进行抽奖")
				return false;
			}
            
		}
	</script>
<style type="text/css">
<!--
body {
   
    background-color:#ffff99;
    background-image: url(789-11.jpg);
    background-repeat:no-repeat;
    background-position:center top;
    background-attachment:scrolled;
    margin:0px;
    height:100%;
    
}
    #bk{
    width:100%;
    height:100%;
    
    text-align:center;
     
    
}
form
    {
    position:relative;
    top:270px;
    border:0px;
    width:300px;
      
}
    #tabl{
    border:0px solid;
    width:350px;
    margin-top:350px;
    
}
    

-->
</style>
</head>

<body>
    
    <center>	 
    <form name ="addvo" method="post" action="votetest.php" onsubmit="javascript:return check();">
        <table border="0">
            <tr>
                <td>姓名</td><td colspan="3" align="center"><input type='text'     name='name'        size='20'/></td>
            </tr>
            <tr>
                <td>手机</td><td colspan="2" align=center><input type='text'     name='phonenumber' size='20'/></td>
            </tr>
            <tr>
                <td>宿舍</td><td colspan="2" align=center><input type='text'     name='homenumber'      size='20'/></td>
            </tr>
            <tr>
                <td colspan="3" align=center><input type='submit'   name='submit'     value='开始抽奖'/></td>
            </tr>
            </table>
        </form></center>
        
  
   
  <center><div id="tabl"><table>
      <tr> <td>1、请如实填写个人信息，所填信息将作为发放奖品依据；</td></tr>
       <tr> <td>2、本次抽奖奖品有：；</td></tr>
       <tr> <td>3、每人只有一次抽取机会，中奖率10%；</td></tr>
      </table></div></center>
    
    
</body>
</html>