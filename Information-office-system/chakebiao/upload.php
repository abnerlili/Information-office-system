<?php
$upfile=$_FILES["userfile"];
 $uploaddir  = "http://1.querysystem.sinaapp.com/chakebiao/uploads/";
if(is_uploaded_file($upfile["tmp_name"]))
{
    if ( move_uploaded_file ( $upfile["tmp_name"],$uploaddir . $upfile["name"] )) {
        echo  "上传成功\n" ;
    } 
    else {
        echo  "文件可能被损坏，上传失败\n" ;
    }
}
else
    die("不是一个上传文件");
 ?> 