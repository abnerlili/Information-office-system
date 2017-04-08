<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
    <!--这个文件是申请使用512的前台文件。 -->
    
<head>
    <meta charset="utf-8"/>
	<title>申请使用512教室</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
            var selobj = document.getElementById("selyear");
			while(selobj.childNodes.length > 0)
			{
				selobj.removeChild(selyear.lastChild);
			}
            for(var i = 0; i < year.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i+nowyear;
				optionobj.innerHTML = year[i];
				selyear.appendChild(optionobj);
			}
            
            var projectArray = new Array();

			projectArray[0] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
			projectArray[1] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
			projectArray[2] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29"];
			projectArray[3] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"];
	
            
			var yearsel = document.getElementById("selyear").selectedIndex;
			var monthsel = nowmonth + 1;
	
			if (monthsel == "1" || monthsel == "3" || monthsel == "5" || monthsel == "7" || monthsel == "8" || monthsel == "10" || monthsel == "12")
				var date = projectArray[0];
			else if (monthsel == "4" || monthsel == "6" || monthsel == "9" || monthsel == "11")
				var date = projectArray[1];
			else if ((monthsel == "2") && (yearsel%400 == 0 || (yearsel%4==0 && yearsel%100 != 0)) )
				var date = projectArray[2];
			else 
  		      var date = projectArray[3];
	
			var selobj1 = document.getElementById("selday");
	
			while(selobj1.childNodes.length > 0)
			{
				selobj1.removeChild(selday.lastChild);
			}
	
			for(var i = 0; i < date.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i;
				optionobj.innerHTML = date[i];
				selday.appendChild(optionobj);
			}
            document.getElementById("selmonth").selectedIndex = nowmonth;
            document.getElementById("selday").selectedIndex = nowday - 1;
        }
		function check(form)
		{
            var now = new Date();
            var nowmonth = now.getMonth() + 1;
            var nowday = now.getDate();
			var monthselected = document.getElementById("selmonth").selectedIndex + 1;
            var dayselected = document.getElementById("selday").selectedIndex + 1;
            
            if(monthselected < nowmonth)
            {
                alert("不能往前选啊");
                return false;
            }
            else if(monthselected == nowmonth && dayselected < nowday)
            {
                alert("不能往前选啊");
                return false;
            }
            
			if(document.add512.comment.value.trim() == "")
			{
				alert("用途不能为空！");
				return false;
			}
            
		}
	</script>
    <script language="javascript" type="text/javascript">
		function monthchanged()
		{
			var  projectArray = new Array();

			projectArray[0] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
			projectArray[1] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
			projectArray[2] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29"];
			projectArray[3] = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"];
	
			var year = document.getElementById("selyear").selectedIndex + 2015;
			var month = document.getElementById("selmonth").selectedIndex + 1;
	
			if (month == "1" || month == "3" || month == "5" || month == "7" || month == "8" || month == "10" || month == "12")
				var date = projectArray[0];
			else if (month == "4" || month == "6" || month == "9" || month == "11")
				var date = projectArray[1];
			else if ((month == "2") && (year%400 == 0 || (year%4==0 && year%100 != 0)) )
				var date = projectArray[2];
			else 
  		      var date = projectArray[3];
	
			var selobj = document.getElementById("selday");
	
			while(selobj.childNodes.length > 0)
			{
				selobj.removeChild(selday.lastChild);
			}
	
			for(var i = 0; i < date.length; i++)
			{
				var optionobj = document.createElement("option");
				optionobj.value = i;
				optionobj.innerHTML = date[i];
				selday.appendChild(optionobj);
			}
		}
    </script>
</head>

<body>
    <form name = "add512" method="post" action="add512room.php"  onsubmit="javascript:return check();">
        <table width="300" height="96" border="0" align="center" cellpadding="0" cellspacing="1">
            <caption>512使用申请</caption>
    	<tr><td>日期：
            	<select id="selyear" onchange="monthchanged();" name="selyear">
				<option>2019</option>
				<option>2020</option>
			</select>年
			<select id="selmonth" onchange="monthchanged();" name="selmonth">
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
            <select id="selday" name="selday">
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
			</select>日
        </td></tr>
    	<tr><td>用途：</td></tr>
    	<tr><td><textarea rows="10" cols="45" name="comment"></textarea></td></tr>
    	<tr><td align="center"><input type="submit" value="确认提交"></td></tr>
    	<tr><td align="center"><a href="javascript:history.go(-1)" >返回上一页</a></td></tr>
    </table>
    </form>
</body>
</html>
