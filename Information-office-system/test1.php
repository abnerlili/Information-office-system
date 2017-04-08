<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">  
<HTML xmlns="http://www.w3.org/1999/xhtml">  
<HEAD>  
<TITLE>弹出窗口</TITLE>  
<META http-equiv=Content-Type content="text/html; charset=utf-8">  
<style>  
#popupcontent{   
  position: absolute;  
  visibility: hidden;     
  overflow: hidden;     
     
  background-color:blue;     
  border:1px solid #333;     
  padding:5px;}  
</style>  
<script>  
var baseText = null;   
function showPopup(w,h){     
    var popUp = document.getElementById("popupcontent");     
    popUp.style.top = "100px";     
    popUp.style.left = "100px";     
    popUp.style.width = w + "px";     
    popUp.style.height = h + "px";      
    if (baseText == null) baseText = popUp.innerHTML;    
    popUp.innerHTML = baseText + "<div id=\"statusbar\"><input type=\"button\" value=\"Close window\" onClick=\"hidePopup();\"></div>";     
    var sbar = document.getElementById("statusbar");     
    sbar.style.marginTop = (parseInt(h)-60) + "px";    
    popUp.style.visibility = "visible";  
}  
function hidePopup(){     
    var popUp = document.getElementById("popupcontent");     
    popUp.style.visibility = "hidden";  
}  
</script>  
<META content="MSHTML 6.00.2900.2838" name=GENERATOR></HEAD>  
<BODY>  
<div id="popupcontent"><div class="mainDiv"> <form  method="post" action="login.php">
	<table width="280" height="96" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
      <tr>
        <td colspan="2" align="center" bgcolor="#FFFFFF">用户登录</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF">用户名:</td>
        <td align="left" bgcolor="#FFFFFF"> 
           <input type="text" name="user_name" size="12">        
        </td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF">密码:</td>
        <td align="left" bgcolor="#FFFFFF"> 
		<input type="password" name="user_pw" size="12"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#FFFFFF">
		<input type="submit" name="Submit" value="提交">
		<input type="reset" name="Submit2" value="重置"></td>
      </tr>
    </table>
        <?php
	$_SESSION["login"] = "NO";
            ?></form>
        </div></div>  

  
<p><a href="#" onClick="showPopup(280,200);" >onclick</a></p>  
</BODY>  
</HTML>  