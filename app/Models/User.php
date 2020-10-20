<?php

class User{
	private $_db;
	private $_namaTable;

	public function __construct(){
		$this->_db = Database::getInstance();
		$this->_namaTable = strtolower(get_class($this)).'s';
	}

	public function index(){
		return $this->_db->index($this->_namaTable);
	}
}
?>