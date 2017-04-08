<html>
<head>
	<title>募捐</title>
    <meta name="viewport" charset="utf-8"/>
    <style type="text/css">
   .top{
        height:150px;
        width:100%;
        margin:0px;
        border:0px;
        padding:0px;
        margin-left:150px;
        margin-right:400px;
    }
    .top_left{
            padding:0px;
            padding-top:10px
        height:150px;
        margin:0px;
            margin-right:50px;
        border:0px;  
        float:left;
    }
        #logo{
            height:150px;
            width:100px;
        }
    .top_right{
        padding:20px;
            padding-top:25px;
        margin:0px;
            margin-left:15px;
        border:0px;
            font-size:45px;
            letter-spacing:5px;
            color:white;
            background:#3366ff;
        float:left;
   }
        .content{
            margin:0px;
        border:0px;
        padding:0px;
                margin-left:150px;
            margin-right:167px;
            background:#f0e68c;
            border:2px solid black;
            font-family:"Microsoft Yahei";
            clear:both;
            
        }
        .content p{
        text-indent:2em;
        }
        .content p strong{
        font-weight:bold;
            font-size:20px;
        }
        .activity_list{
        margin:0px;
        border:0px;
            border:2px solid black;
        padding:0px;
                margin-left:150px;
             margin-right:167px;
             font-family:"Microsoft Yahei";
        background:#f0e68c;
        }
        .activity_list table{
            border-collapse: collapse;
            border: none;
            text-align:center;
        }
        .activity_list table caption{
             font-weight:bold;
            font-size:20px;
        }
        .summary_list{
        margin:0px;
        border:0px;
            border:2px solid black;
        padding:0px;
                margin-left:150px;
             margin-right:167px;
             font-family:"Microsoft Yahei";
        background:#f0e68c;
        }
        .summary_list table{
            border-collapse: collapse;
            border: none;
             text-align:center;
        }
        .summary_list table caption{
             font-weight:bold;
            font-size:20px;
        }
        .foot{
            margin:0px;
        border:0px;
            border:2px solid black;
        padding:0px;
                margin-left:150px;
             margin-right:167px;
        background:#f0e68c;
        }
        .foot p{
            font-family:"Microsoft Yahei";
             font-weight:bold;
            font-size:15px;
            line-height:1.0em;
        }
        .space_hx {
  clear: both;
  width: 100%;
  height: 5px;
  font-size: 1px;
  overflow: hidden;
}
    </style>
</head>

<body>
    <div class="top">
        <div class="top_left">
            <img id="logo" src="qzlogo.png" /> 
        </div>
        <div class="top_right">
            西电青年志愿者总队
        </div>
    </div>    
    <div class="content">
        <p><strong>魏则西</strong>同学是我校（西安电子科技大学）计算机学院031211班的学生，在大二下学期，
            不幸被查出患有罕见的滑膜肉瘤。然而巨大的费用问题依然压在则西一家人的心头……</p>
        <p>因此，西安电子科技大学青年志愿者总队以及计算机学院在得到学校老师等各方支持下，在全校范围内展开善款募集活动， 如果你想帮助他，如果你想让这个年仅二十一岁的生命延续下去，请伸出援手，我们代表则西，代表所有关爱他的人，向你说一句<strong>谢谢</strong>！
		</p>
    </div>
    <div class="space_hx">&nbsp;</div>

    <div class="activity_list">
        <table width="500" border="1" align="center">
        <caption>义卖品信息统计表</caption>
		<tr>
            <th>物品</th><th>捐赠人</th><th>单价（元）</th><th>数量（件）</th><th>成交价（元）</th><th>购买人</th>
		</tr>
            <?php
// 连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if($link)
{
    mysql_select_db(SAE_MYSQL_DB,$link);
    $mysql = new saeMysql();
    
  
    $sql="select * from donation";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_assoc($result))
	{
       

		echo "<tr>";
        echo "<td>{$row['donation']}</td>";
		echo "<td>{$row['donor']}</td>";
		echo "<td>{$row['unit-price']}</td>";
		echo "<td>{$row['amount']}</td>";
        echo "<td>{$row['current-rate']}</td>";
         echo "<td>{$row['purchaser']}</td>";
        echo "</tr>";		
    }
    

	$mysql->closeDb();

}
?>
        </table>
    </div>
     <div class="space_hx">&nbsp;</div>
   <div class="activity_list">
        <table width="500" border="1" align="center">
        <caption>善款募集统计表</caption>
		<tr>
            <th>魏则西支付宝</th><th>魏海泉银行卡</th><th>现场善款募捐</th><th>义卖款</th><th>合计（元）</th>
		</tr>
            <tr>
                <th>18691018723</th><th>6217004160003346295</th><th>100000000</th><th>100000000</th><th>1000000000</th>
            </tr>
        </table>
    </div>
        <div class="space_hx">&nbsp;</div>
    <div class="foot">
        <p>活动参与方式：</p>
        <p>1、旧物捐助，我们会将您捐赠的旧物进行消毒处理，并且通过您给出的参考价格进行出售，所得善款将全部捐赠给魏则西同学。</p>
        <p>2、购买义卖物品，所有的义卖物品均来自于同学捐赠或者企业赞助，全部经过消毒处理，所得善款将全部捐赠给魏则西同学。</p>
        <p>3、善款捐赠，您可以直接在外场进行善款捐赠，也可以通过支付宝或者银行转账进行捐赠，所得善款我们将全部转交给魏则西同学。</p>
        <p>魏则西支付宝：18691018723；
</p>
        <p>魏海泉（魏则西父亲账号）：6217004160003346295 中国建设银行咸阳市分行秦宝一路支行；
</p>
        <p>魏海泉（魏则西父亲电话）：13259005336。
</p>
    </div>
    </body>
</html>