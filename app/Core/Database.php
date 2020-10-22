<?php

class Database{
	private static $_instance = null;
	private $mysqli;

	public function __construct(){
		$this->mysqli = new mysqli('localhost', 'root', '', 'mini-fw') or die('ada error koneksi');
	}	

	public static function getInstance(){
		if (!isset(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	public function query($q=''){
		if ($q == 'select') {
			return "SELECT * FROM ";
		}
	}

	public function index($table){
		$reply = [];
		$query = $this->query('select')."$table ORDER BY id DESC";
		$result = $this->mysqli->query($query);

		while ($row = $result->fetch_assoc())
			$reply[] = $row;

		return $reply;
	}

	public function edit($table, $id){
		$reply = [];
		$query = $this->query('select')."$table WHERE id = $id";
		$result = $this->mysqli->query($query);

		while ($row = $result->fetch_assoc())
			$reply[] = $row;

		return $reply;
	}

	public function save($table, $data){
		$arr = [];
		array_push($arr, $data[0], $data[1]);
		$str = "'" . implode("','", $arr) . "'";
		
		$query = "INSERT INTO $table (nama, jenkel) VALUES ($str) ";
		$result = $this->mysqli->query($query);

		if ($result === true) {
			echo "success";
		}else{
			echo $this->mysqli->error;
		}

	}

	public function update($table, $id, $data){		
		$query = "UPDATE $table SET nama='$data[0]', jenkel='$data[1]' WHERE id = $id ";
		$result = $this->mysqli->query($query);

		if ($result === true) {
			echo "success";
		}else{
			echo $this->mysqli->error;
		}
	}

	public function delete($table, $id){
		$query = "DELETE FROM $table WHERE id = $id ";
		$result = $this->mysqli->query($query);

		if ($result === true) {
			echo "success";
		}else{
			echo $this->mysqli->error;
		}
	}


}

?>