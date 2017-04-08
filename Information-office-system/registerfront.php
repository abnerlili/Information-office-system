<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
    <!--此文件是总队报名的前台。 -->
<head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>报名系统</title>
    <script language="javascript">
		function check(form)
		{
			if(document.addvol.name.value==""   || document.addvol.sex.value=="" || document.addvol.cell.value==""  || document.addvol.QQ.value==""    ||
               document.addvol.hometown.value==""  || document.addvol.year.value=="" || document.addvol.month.value=="" || document.addvol.day.value==""   ||
               document.addvol.dorm1.value=="" || document.addvol.dorm2.value==""  || document.addvol.dorm3.value==""   || document.addvol.academy.value=="" ||
               document.addvol.major.value=="" || document.addvol.interest.value=="")
			{
				alert("任何空不能为空！");
				return false;
			}
            /* 
            var testclass = /^[0-9]{6,7}$/;
            var ret = testclass.test(document.addvol.class_num.value);
            if(!ret)
            {
                alert("班级号不符合规范");
                return false;
            }
            */
            var testcell = /^[0-9]{11}$/;
            ret = testcell.test(document.addvol.cell.value);
            if(!ret)
            {
                alert("手机号不符合规范");
                return false;
            }
            var testqq = /^[0-9]{6,12}$/;
            ret = testqq.test(document.addvol.QQ.value);
            if(!ret)
            {
                alert("QQ号不符合规范");
                return false;
            }
            var testyear = /^[0-9]{4}$/;
            ret = testyear.test(document.addvol.year.value);
            if(!ret)
            {
                alert("出生年份不符合规范");
                return false;
            }

            var testmonth = /^[0-9]{1,2}$/;
            ret = testmonth.test(document.addvol.month.value);
            if(!ret)
            {
                alert("出生月份不符合规范");
                return false;
            }            
            
            var testday = /^[0-9]{1,2}$/;
            ret = testday.test(document.addvol.day.value);
            if(!ret)
            {
                alert("出生日期不符合规范");
                return false;
            }
            
            var testdorm1 = /^[0-9]{1,2}$/;
            ret = testdorm1.test(document.addvol.dorm1.value);
            if(!ret)
            {
                alert("宿舍楼号不符合规范");
                return false;
            }
            
            var testdorm2 = /^[1-2]{1}$/;
            ret = testdorm2.test(document.addvol.dorm2.value);
            if(!ret)
            {
                alert("宿舍分区号不符合规范");
                return false;
            }
            
            var testdorm3 = /^[1-6]{1}[0-5]{1}[0-9]{1}$/;
            ret = testdorm3.test(document.addvol.dorm3.value);
            if(!ret)
            {
                alert("宿舍号不符合规范");
                return false;
            }
		}
	</script>
    
</head>

<body>
     <a href="index.php"style="text-decoration:none">首页<?php echo"》"?></a>报名
	<form  name ="addvol" method="post" action="register.php" onsubmit="javascript:return check();">
	<table width="350" height="90" border="0" align="center" cellpadding="2" cellspacing="0">
        <caption><p><strong>青年志愿者总队报名表</strong></p></caption>
		<tr>
            <td><table cellpadding="0" cellspacing="0">
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="name" size="15"></td>
                </tr>
            </table></td>
        </tr>
    	<tr>
            <td><table cellpadding="0" cellspacing="0">
                <tr>
                    <td>性别：</td>
                    <td><input type="radio" name="sex" value="male" /> 男<input type="radio" name="sex" value="female" />女</td>
                </tr>
                </table></td>
        </tr>
        <tr>
            <td>意向部门：
                <select name="department">
                    <option value="1">项目部</option>
                    <option value="2">秘书处</option>
                    <option value="3">红十字会</option>
                    <option value="4">宣传部</option>
                    <option value="5">环保部</option>
                    <option value="6">活动部</option> 
                    <option value="7">培训部</option>
                    <option value="8">交流部</option>
                    <option value="9">支教部</option>
				</select>
            </td>
        </tr>
        <tr>
            <td><table cellpadding="0" cellspacing="0">
                <tr>
                    <td>电话：</td>
                    <td><input type="text" name="cell" size="16"></td>
                </tr>
                <tr>
                    <td>QQ：</td>
                    <td><input type="text" name="QQ" size="16"></td>
        		</tr>
                </table></td>
        </tr>
        <tr>
            <td><table cellpadding="0" cellspacing="0">
                <tr>  
                    <td>家乡：</td>
                    <td><input type="text" name="hometown" size="16"></td>
                <tr>
                    <td></td>
                    <td><font size="2" >（填写格式如“山西晋城”）</font></td>
                </tr>
                </table></td>
        </tr>
        <tr>
            <td>生日：<input type="text" name="year" size="6">年<input type="text" name="month" size="4">月<input type="text" name="day" size="4">日
            </td>
        </tr>
        <tr>
            <td><table cellpadding="0" cellspacing="0">
                <tr>  
                    <td>宿舍：</td>
                    <td><input type="text" name="dorm1" size="6" value="1">号楼<input type="text" name="dorm2" size="4" value="1">区<input type="text" name="dorm3" size="4"></td>
                <tr>
                    <td></td>
                    <td><font size="2" >(例：2号楼2区620)</font></td>
                </tr>
                </table></td>
        </tr>

       <tr>
           <td>
               学院：<input type="text" name="academy" size="25">
           </td>
        </tr>
        <tr>
            <td>
                专业：<input type="text" name="major" size="25">
            </td>
        </tr>
        <tr>
            <td>
                班级号：<input type="text" name="class_num" size="23">
            </td>
        </tr>
        <tr>
            <td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（不知道班级号可以不填写）</font></td>
        </tr>
        <tr>
            <td>
                兴趣特长：<br />
                <textarea rows="8" cols="40" name="interest" value="无"> </textarea>
            </td>
        </tr>
        <tr><td align="center"><input type="submit" name="submit" value="提交"></td></tr>
        <tr><td align="center"><a href="javascript:history.go(-1)" >返回上一页</a></tr>
   	</table>
    </form>
</body>
</html>
