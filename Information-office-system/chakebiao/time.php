<html>
<head>
<title>查询特定时间有空的人</title>
    <meta charset="utf-8"/>
 </head> 
 <body>

<center>请输入你要选择的日期</center>
<form action="chakebiaohoutai.php" method="post" >
    
    <center><select id="selyear" name="selyear" onChange="changemonth()">
        <option>2015</option>
        <option>2016</option>
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
                <option>29</option>
                <option>30</option>
                <option>31</option>
			</select>日
        第<select id="selclass" name="selclass">
                <option value = "1">1</option>
				<option value = "2">2</option>
				<option value = "3">3</option>
				<option value = "4">4</option>
        </select>节课
     
        <center><input type="submit" value="查询" /></center>
    </center>
    </form>
</body> 
</html>

