<?php
//连接数据库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if($link){
mysql_select_db(SAE_MYSQL_DB,$link);
    $myfile = fopen("./schedule/1301013.txt", "r") or die("Unable to open file!");
            // 输出单行直到 end-of-file
            $i=2;
            while(!feof($myfile)) {
                $table[$i]=fgets($myfile);
                $i++;
            }
    echo "$table[2]";
            $sql="INSERT INTO schooltimetable (ID,class, `week1`, `week2`, `week3`, `week4`, `week5`, `week6`, `week7`, `week8`, `week9`, `week10`, `week11`, `week12`, `week13`, `week14`, `week15`, `week16`, `week17`, `week18`, `week19`, `week20`, `week21`, `week22`, `week23`)
                VALUES (NULL,'1302000', '$table[2]', '$table[3]', '$table[4]', '$table[5]', '$table[6]', '$table[7]', '$table[8]', '$table[9]', '$table[10]', '$table[11]', '$table[12]', '$table[13]', '$table[14]', 
                '$table[15]', '$table[16]', '$table[17]', '$table[18]', '$table[19]', '$table[20]', '$table[21]', '$table[22]', '$table[23]', '$table[24]')";
            mysql_query($sql,$link);
    
    
                fclose($myfile);
     
}
?>