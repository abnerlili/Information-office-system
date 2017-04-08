<?php
/*
*对数据库操作
*$conn 资源类型 链接数据库
*$insretdata 操作语句
*$result 操作结果
*insert($sql)操作方法
*/
class mysqlopreation{
	private $conn = NULL;
	private $insretdata = '';
	public $result = '';
	private function connect(){
		$this->conn = mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
		mysql_select_db(SAE_MYSQL_DB,$this->conn);
	}
	public function insert($sql){
			$this->connect();
		$this->insertdata = $sql;
		$this->result = mysql_query($this->insertdata,$this->conn);
        echo mysql_error();
	}
}
/*
*对接收到的数据进行进行处理
*去除空格，转义
*_dispose($char)调用的方法，返回处理结果$result
*/
class chardispose{
	private $disposechar = '';
	public $result = '';
	public function _dispose($char){
		$this->disposechar = $char;
		$this->result = addslashes(trim($this->disposechar));
        return $this->result;
	}
}
$_pid = $_POST['pid'];
$_content = $_POST['content'];
$_department = $_POST['department'];
//对要插入的字符去除空格和转义处理
$deal = new chardispose;
$pid = $deal->_dispose($_pid);
$content = $deal->_dispose($_content);
$department = $deal->_dispose($_department);
//将数据插入数据库
if ($content == NULL){
    echo "<script>alert('content is null');location.href='/index.php';</script>";
}
$statement = "insert into link_feedback(pid,content,department) values('$pid','$content','$department')";
$mysql = new mysqlopreation;
$mysql->insert($statement);
?>