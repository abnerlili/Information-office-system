<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title></title> 
<link href="Content/myPub.css" rel="stylesheet" type="text/css" /> 
<script src="Scripts/js/xfc.js" type="text/javascript"></script> 
   
<script src="http://demo.jb51.net/jslib/jquery/jquery-1.6.2.min.js" type="text/javascript"></script> 
<!-- 导航切换 --> 
<style type="text/css"> 
.center 
{ 
text-align: center; 
height: auto; 
} 
.center span 
{ 
font-size: 50px; 
font-weight: 900; 
line-height: 50px; 
} 
.center img 
{ 
width: 1200px; 
height: 580px; 
} 
.s_chg 
{ 
float: left; 
width: 1240px; 
height: auto; 
margin-left:40px; 
} 
.s_chg img 
{ 
width: 240px; 
height: 120px; 
padding-top:10px; 
} 
.s_title 
{ 
color:Red; 
font-size :35px; 
font-weight:bold; 
} 
</style> 
</head> 
<body> 
<div class="w center hide "> 
<span id="chg" atg="0" >1</span> 
</div> 
<div class="w center" id="i_div"> 
<img id="chg_img" onclick="chg()" src="Content/images/JPEG/1 (1).jpg" /> 
</div> 
<div class="w " > 
<br/> 
<button onclick ="wshow(0)">查看全部获奖</button> 
<button onclick ="wshow(1)">查看一等奖获奖</button> 
<button onclick ="wshow(2)">查看二等奖获奖</button> 
<button onclick ="wshow(3)">查看三等奖获奖</button> 
<button onclick ="sshow()">开始抽奖</button></div> 
<div class="w s_chg" id="s_div"> 
</div> 
<script language="javascript" type="text/javascript"> 
var time = 0; 
var th = 9; 
var two = 5; 
var f =1; 
var max = 122; 
var t; 
var zhong = new Array(); 
function sshow() { 
$("#i_div").show(); 
$("#s_div").hide(); 
} 
function wshow(e) { 
var s_sum; 
switch (e) { 
case 0: 
s_sum = th + two + f; 
break; 
case 1: 
s_sum = th + two + f; 
break; 
case 2: 
s_sum = th + two; 
break; 
case 3: 
s_sum = th; 
break; 
} 
if (zhong.length < s_sum) { 
var cha = (s_sum) - (zhong.length); 
alert("名额还差 "+cha.toString()+" 名"); 
return; 
} 
$("#i_div").hide(); 
$("#s_div").show(); 
var sdiv = $("#s_div"); 
sdiv.children().remove(); 
if (e == 0 || e == 3) { 
var html = "<br/><br/><br/><span class='s_title'>三等奖</span><br/><br/><br/>"; 
sdiv.prepend(html); 
for (var i = 0; i < th; i++) { 
html = " <img src='Content/images/JPEG/1 (" + zhong[i] + ").jpg' /> "; 
sdiv.prepend(html); 
} 
} 
if (e == 0 || e == 2) { 
html = "<br/><br/><br/><span class='s_title'>二等奖</span><br/><br/><br/>"; 
sdiv.prepend(html); 
for (var i = (th); i < (th + two); i++) { 
html = " <img src='Content/images/JPEG/1 (" + zhong[i] + ").jpg' /> "; 
sdiv.prepend(html); 
} 
} 
if (e == 0 || e == 1) { 
html = "<br/><br/><br/><span class='s_title'>一等奖</span><br/><br/><br/>"; 
sdiv.prepend(html); 
for (var i = (th + two); i < (th + two + f); i++) { 
html = " <img src='Content/images/JPEG/1 (" + zhong[i] + ").jpg' /> "; 
sdiv.prepend(html); 
} 
} 
} 
function addtime() { 
if (time == max) 
time =0; 
time=time+1; 
$("#chg").html(time); 
$("#chg_img").attr("src", "Content/images/JPEG/1 (" +time+ ").jpg"); 
t = setTimeout("addtime()", 20); 
} 
function stoptime() { 
clearTimeout(t); 
while (chkzhong() == 1) { 
} 
zhong.push(time); 
$("#chg_img").attr("src", "Content/images/JPEG/1 (" + time + ").jpg"); 
} 
function chg() { 
if (zhong.length == (th + two + f)) { 
alert("抽奖名额已全，请查看"); 
return; 
} 
if ($("#chg").attr("atg") == "0") { 
$("#chg").attr("atg", "1"); 
addtime(); 
} else { 
$("#chg").attr("atg", "0"); 
stoptime(); 
if (zhong.length == (th )) { 
alert("三等奖已经抽完 "); 
return; 
} 
if (zhong.length == (th + two )) { 
alert("二等奖已经抽完 "); 
return; 
} 
if (zhong.length == (th + two + f )) { 
alert("一等奖已经抽完"); 
return; 
} 
} 
} 
function chkzhong() { 
for (var it in zhong) { 
if (it == time) { 
if (time == max) 
time=0 
time = time + 1; 
return 1; 
} else { 
return 0; 
} 
} 
} 
</script> 
</body> 
</html> 