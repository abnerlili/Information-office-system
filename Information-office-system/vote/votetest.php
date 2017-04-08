<html>
    <head>
        <title>结果提示</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
    </head>
    <body><br>
    	<?php
			/*
             *只是取到了客户端表面的ip
             *并不意味着取到的是真实的ip
             *有可能是代理服务器的ip*
             *想取得真实ip需要另作判断
             *现不考虑刷票情况，之后可以进行更改
            */

			$ip			=   $_SERVER [ 'REMOTE_ADDR' ];
            $name   	=	$_POST['name'];
            $phone  	=	$_POST['phonenumber'];
            $homeid  	=	$_POST['homenumber'];

			// 连主库
			$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
			if($link)
            {
                mysql_select_db(SAE_MYSQL_DB,$link);
                
                $sqlname="select * from rewardname where name='$name'";
                $result_name=mysql_query($sqlname,$link);
 				$namenum=mysql_num_rows($result_name);
                if( $namenum!=0)
                {
                    echo "<center>".$name."同学，你已抽过奖了~不要太贪心哟~</center>";
                }
                else
                {          
                    
                    $sql="select * from lottery where ip='$ip'";
                    $result=mysql_query($sql,$link);   
                    $datanum=mysql_num_rows($result);
                    if($datanum!=0)
                    {
                       		 //$row=mysql_fetch_assoc($result);
    
                            echo "<center>".$name."你已经抽过奖了，不能再抽了哟~</center>";
                    }
                    else
                    {
                            //抽奖系统,利用随机函数取随机数
                            /*
                             *基本思路：
                             *$arr代表总体100
                             *$a,$b,$c,$d分别代表奖励在$arr里面的份额
                             *小数组里面的数字有多少个，即代表其在$arr里面的比例
                             *利用随机函数rand或者mt_rand（这个运算速度更快一些）,打乱数组
                             *在0~99中随其取数利用概率论知识可知概率大小
                             *奖项增加，则添加新的数组$e,$f.......
                             *改变其中的各奖项占的比例就行
                            */
                            function getReward()
                            {
                                $a = array_fill(0,10, 0);  //数组填充函数，设置比例1:9，中奖率为10%
                                //$b = array_fill(0,16, 2);
                                //$c = array_fill(0,2, 3);
                                $d = array_fill(0,90, 1);
                                $arr = array_merge($a,$d);//将数组合并
                                //var_dump($arr);
                                shuffle($arr);
                                //var_dump($arr);
                                $d = mt_rand(0,99);
                                return $arr[$d];
                            }
                                $data = getReward();
							//echo $data;
							$reward="select * from rewardlist where result='$data'";
                            $list=mysql_query($reward);
                            $row=mysql_fetch_assoc($list);
                            if($data=='1')
                            {
                               
                                $insertname1="INSERT  INTO rewardname  VALUES ( '$name' ,'$phone' ,'$homeid','1')";
                                mysql_query($insertname1);
                                $time=date("Y-m-d H:i:s",time());
                                //待完善
                                $mail = new SaeMail();
                                // $ministeraddress="xdqnzyzzd@qq.com";
                                $contenttominister = "有一名同学于{$time}获得奖品，请及时发放奖品。他的信息如下：姓名：{$name}，手机号：{$phone}，宿舍号：{$homeid}。";
                                $ret = $mail->quickSend('18710892127@163.com','有同学获得奖品',$contenttominister,'xdqnzyzzd@qq.com','14qqxdqnzyz');
                                if ($ret === false)
     								{
                                    var_dump($mail->errno(), $mail->errmsg());
                                    	echo"恭喜你获得O(∩_∩)0~,但是您的获奖信息在传递过程中被抢劫了:-(，所以请将该页面截图保存，并将其与个人信息发送至：，我们会为您记录并发送奖品";
                                }
                                else
            			
                                {
                                    echo "恭喜你获得O(∩_∩)0~您的信息已经发送到主办方的邮箱，会有专人记录并发送奖品，请保持通讯畅通哟~为了防止意外发生，记得将该页面截图呦~";
                                    }
                            	
                            }
                            else
                            {
                                $insertname2="INSERT  INTO rewardname  VALUES ( '$name' ,'$phone' ,'$homeid','0')";
                                 mysql_query($insertname2);
                                echo "<center>唉~没有得到奖哎╮(╯▽╰)╭</center>";
                            }
                            
                            //将抽奖结果存入数据库中
                            //表名：lottery
                            $sql="INSERT  INTO lottery  VALUES ( NULL ,'$ip' ,'$data') ";
                            mysql_query($sql);
                        }
                    }
                }
                    		
        ?>
    </body>
</html>