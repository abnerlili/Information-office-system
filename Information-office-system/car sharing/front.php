<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
    <!--此文件是拼车前台。 -->
<head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>拼车</title>
    
</head>
<script language="javascript" type="text/javascript">
		window.onload = function()
		{
			var now = new Date();
            var nowyear = now.getFullYear();
            var nowmonth = now.getMonth();
            var nowday = now.getDate();
            var year = new Array();
            year[0]=nowyear;
            year[1]=nowyear+1;
			
            var selobj1 = document.getElementById("selyear1");
			var selobj2 = document.getElementById("selyear2");
			while(selobj1.childNodes.length > 0)
			{
				selobj1.removeChild(selyear1.lastChild);
			}
			while(selobj2.childNodes.length > 0)
			{
				selobj2.removeChild(selyear2.lastChild);
			}
            for(var i = 0; i < year.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i+nowyear;
				optionobj.innerHTML = year[i];
				selyear1.appendChild(optionobj);
			}
			for(var i = 0; i < year.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i+nowyear;
				optionobj.innerHTML = year[i];
				selyear2.appendChild(optionobj);
			}
            
            var projectArray = new Array();

			projectArray[0] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
			projectArray[1] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
			projectArray[2] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29"];
			projectArray[3] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"];
	
			var yearsel1 = document.getElementById("selyear1").selectedIndex;
			var monthsel1 = nowmonth + 1;
	
			if (monthsel1 == "1" || monthsel1 == "3" || monthsel1 == "5" || monthsel1 == "7" || monthsel1 == "8" || monthsel1 == "10" || monthsel1 == "12")
				var date1 = projectArray[0];
			else if (monthsel1 == "4" || monthsel1 == "6" || monthsel1 == "9" || monthsel1 == "11")
				var date1 = projectArray[1];
			else if ((monthsel1 == "2") && (yearsel1%400 == 0 || (yearsel1%4==0 && yearsel1%100 != 0)) )
				var date1 = projectArray[2];
			else 
				var date1 = projectArray[3];
		  
			var yearsel2 = document.getElementById("selyear2").selectedIndex;
			var monthsel2 = nowmonth + 1;
	
			if (monthsel2 == "1" || monthsel2 == "3" || monthsel2 == "5" || monthsel2 == "7" || monthsel2 == "8" || monthsel2 == "10" || monthsel2 == "12")
				var date2 = projectArray[0];
			else if (monthsel2 == "4" || monthsel2 == "6" || monthsel2 == "9" || monthsel2 == "11")
				var date2 = projectArray[1];
			else if ((monthsel2 == "2") && (yearsel2%400 == 0 || (yearsel2%4==0 && yearsel2%100 != 0)) )
				var date2 = projectArray[2];
			else 
				var date2 = projectArray[3];
		  
			selobj1 = document.getElementById("selday1");
			selobj2 = document.getElementById("selday2");
	
			while(selobj1.childNodes.length > 0)
			{
				selobj1.removeChild(selday1.lastChild);
			}
			while(selobj2.childNodes.length > 0)
			{
				selobj2.removeChild(selday2.lastChild);
			}
			for(var i = 0; i < date1.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i;
				optionobj.innerHTML = date1[i];
				selday1.appendChild(optionobj);
			}
			for(var i = 0; i < date2.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i;
				optionobj.innerHTML = date2[i];
				selday2.appendChild(optionobj);
			}
            document.getElementById("selmonth1").selectedIndex = nowmonth;
            document.getElementById("selday1").selectedIndex = nowday - 1;
			document.getElementById("selmonth2").selectedIndex = nowmonth;
            document.getElementById("selday2").selectedIndex = nowday - 1;
		}
		function check(form)
		{
			var now = new Date();
            var nowmonth = now.getMonth() + 1;
            var nowday = now.getDate();
			var nowhour = now.getHours();
			var nowminute = now.getMinutes();
			
			var yearselected1 = document.getElementById("selyear1").selectedIndex;
			var monthselected1 = document.getElementById("selmonth1").selectedIndex + 1;
            var dayselected1 = document.getElementById("selday1").selectedIndex + 1;
            var hourselected1 = document.getElementById("selhour1").selectedIndex;
			var minuteselected1 = document.getElementById("selmin1").selectedIndex * 5;
			var yearselected2 = document.getElementById("selyear2").selectedIndex;
			var monthselected2 = document.getElementById("selmonth2").selectedIndex + 1;
            var dayselected2 = document.getElementById("selday2").selectedIndex + 1;
            var hourselected2 = document.getElementById("selhour2").selectedIndex;
			var minuteselected2 = document.getElementById("selmin2").selectedIndex * 5;
            
			if(monthselected1 < nowmonth)
            {
                alert("不能往前申报啊");
                return false;
            }
            else if(monthselected1 == nowmonth && dayselected1 < nowday)
            {
                alert("不能往前申报啊");
                return false;
            }
			else if(monthselected1 == nowmonth && dayselected1 == nowday && hourselected1 < nowhour)
			{
				alert("不能往前申报啊");
				return false;
			}
			else if(monthselected1 == nowmonth && dayselected1 == nowday && hourselected1 == nowhour && minuteselected1 < nowminute)
			{
				alert("不能往前申报啊");
				return false;
			}
			
			if(yearselected2 < yearselected1)
			{
				alert("结束咋能比开始开早呢？");
                return false;
			}
			else if(yearselected2 == yearselected1 && monthselected2 < monthselected1)
            {
				alert("结束咋能比开始开早呢？");
                return false;
            }
            else if(yearselected2 == yearselected1 && monthselected2 == monthselected1 && dayselected2 < dayselected1)
            {
				alert("结束咋能比开始开早呢？");
                return false;
            }
			else if(yearselected2 == yearselected1 && monthselected2 == monthselected1 && dayselected2 == dayselected1 && hourselected2 < hourselected1)
			{
				alert("结束咋能比开始开早呢？");
                return false;
			}
			else if(yearselected2 == yearselected1 && monthselected2 == monthselected1 && dayselected2 == dayselected1 && hourselected2 == hourselected1 && minuteselected2 <= minuteselected1)
			{
				alert("结束不比开始晚？");
                return false;
			}
			
			if(document.carsharing.name.value.trim()==""||document.carsharing.comment.value.trim()==""||document.carsharing.sex.value.trim()=="" ||document.carsharing.phone.value.trim()=="")
			{
				alert("任何空不能为空！")
				return false;
			}
		}

function monthchanged1()
{
	var  projectArray = new Array();

	projectArray[0] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
	projectArray[1] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
	projectArray[2] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29"];
	projectArray[3] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"];
	
	var year = document.getElementById("selyear1").selectedIndex;
	var month = document.getElementById("selmonth1").selectedIndex + 1;
	
	if (month == "1" || month == "3" || month == "5" || month == "7" || month == "8" || month == "10" || month == "12")
		var date = projectArray[0];
	else if (month == "4" || month == "6" || month == "9" || month == "11")
		var date = projectArray[1];
	else if ((month == "2") && (year%400 == 0 || (year%4==0 && year%100 != 0)) )
		var date = projectArray[2];
	else 
        var date = projectArray[3];
	
	var selobj = document.getElementById("selday1");
	
	while(selobj.childNodes.length > 0)
	{
		selobj.removeChild(selday1.lastChild);
	}
	
	for(var i = 0; i < date.length; i++)
	{
		var optionobj = document.createElement("option");
		optionobj.value = i;
		optionobj.innerHTML = date[i];
		selday1.appendChild(optionobj);
	}
}
function monthchanged2()
{
	var  projectArray = new Array();

	projectArray[0] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
	projectArray[1] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
	projectArray[2] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29"];
	projectArray[3] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"];
	
	var year = document.getElementById("selyear2").selectedIndex;
	var month = document.getElementById("selmonth2").selectedIndex + 1;
	
	if (month == "1" || month == "3" || month == "5" || month == "7" || month == "8" || month == "10" || month == "12")
		var date = projectArray[0];
	else if (month == "4" || month == "6" || month == "9" || month == "11")
		var date = projectArray[1];
	else if ((month == "2") && (year%400 == 0 || (year%4==0 && year%100 != 0)) )
		var date = projectArray[2];
	else 
        var date = projectArray[3];
	
	var selobj = document.getElementById("selday2");
	
	while(selobj.childNodes.length > 0)
	{
		selobj.removeChild(selday2.lastChild);
	}
	
	for(var i = 0; i < date.length; i++)
	{
		var optionobj = document.createElement("option");
		optionobj.value = i;
		optionobj.innerHTML = date[i];
		selday2.appendChild(optionobj);
	}
}
    </script>

<body>
     <a href="http://1.informationsystems.sinaapp.com/index.php"style="text-decoration:none">首页<?php echo"》"?></a>拼车
	<form  name ="carsharing" method="post" action="carsharinghoutai.php" onsubmit="javascript:return check();">
	   
    <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
        <caption>发起拼车</caption>
		<tr><td>姓名：<input type="text" name="name" size="30"></td></tr>
    	<tr>
            <td><table cellpadding="0" cellspacing="0">
                <tr>
                  <td>性别：</td>
                    <td><input type="radio" name="sex" value="male" /> 男<input type="radio" name="sex" value="female" />女</td>
                </tr>
                </table></td>
        </tr>
        <tr><td>电话：<input type="text" name="phone"  size="30"></td></tr>	
    </table>
    <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
    	<tr>
            <td>出发时间：</td>
            <td>
            <select id="selyear1" onchange="monthchanged1();" name="year1">
				<option>2015</option>
				<option>2016</option>
			</select>年
			<select id="selmonth1" onchange="monthchanged1();" name="month1">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
			</select>月
            <select id="selday1" name="day1">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
                <option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
                <option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
			</select>日</td>
        </tr>
        <tr>
            <td></td>
            <td><select id="selhour1" name="hour1">
                <option>0</option>
                <option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
                <option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
			</select>时 
            <select id="selmin1" name="minute1">
                <option>0</option>
                <option>5</option>
				<option>10</option>
				<option>15</option>
				<option>20</option>
				<option>25</option>
				<option>30</option>
				<option>35</option>
				<option>40</option>
				<option>45</option>
				<option>50</option>
				<option>55</option>
			</select>分</td>
        </tr>
   	    <tr>
            <td>结束时间：</td>
            <td><select id="selyear2" onchange="monthchanged2();" name="year2">
				<option>2015</option>
				<option>2016</option>
			</select>年
			<select id="selmonth2" onchange="monthchanged2();" name="month2">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
			</select>月
            <select id="selday2" name="day2">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
                <option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
                <option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
			</select>日</td><td>
        </tr>
        <tr>
            <td></td>
            <td><select id="selhour2" name="hour2">
                <option>0</option>
                <option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
                <option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
			</select>时 
            <select id="selmin2" name="minute2">
                <option>0</option>
                <option>5</option>
				<option>10</option>
				<option>15</option>
				<option>20</option>
				<option>25</option>
				<option>30</option>
				<option>35</option>
				<option>40</option>
				<option>45</option>
				<option>50</option>
				<option>55</option>
			</select>分</td>
        </tr>
	
    <tr>
        <td>出发地点</td>
            <td>    <select name="selplace1">
                    <option>西电南校区</option>
                    <option>西电北校区</option>
                    <option>火车站（西安站）</option>
                    <option>火车站（西安东站）</option>
                    <option>火车站（西安西站）</option>
                    <option>火车站（西安北站）</option>
                    <option>火车站（西安南站）</option>
                    <option>机场</option>
                    <option>航天城</option>
                    <option>钟楼</option>
                    <option>小寨</option>
                    <option>西外</option>
                    <option>陕师大</option>
                    <option>其它</option>
				</select>
            </td>
        </tr>
         <tr>
             <td> 目的地点</td>
        <td> <select name="selplace2">
                    <option>西电南校区</option>
                    <option>西电北校区</option>
                    <option>火车站（西安站）</option>
                    <option>火车站（西安东站）</option>
                    <option>火车站（西安西站）</option>
                    <option>火车站（西安北站）</option>
                    <option>火车站（西安南站）</option>
                    <option>机场</option>
                    <option>航天城</option>
                    <option>钟楼</option>
                    <option>小寨</option>
                    <option>西外</option>
                    <option>陕师大</option>
                    <option>其它</option>
				</select>
            </td>
        </tr>
     <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
    	<tr><td>备注：</td></tr>
    	<tr><td><textarea rows="10" cols="45" name="comment"><?php echo"无"?></textarea></td></tr>
        <tr><td align="center"><input type="submit" name="submit" value="提交"></td></tr>
        <tr><td align="center"><a href="javascript:history.go(-1)" >返回上一页</a></tr>
        </table>
   	</table>
    </form>
</body>
</html>
