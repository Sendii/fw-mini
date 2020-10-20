<?php

class User extends Model{
	private $_db;
	private $_namaTable;
	private $_namaModel;

	public function __construct(){
		$this->_db = Database::getInstance();
		$this->_namaTable = $this->getNameTable(get_class());
		$this->_namaModel = get_class();
	}	

	public function index(){
		return $this->_db->index($this->_namaTable);
	}
}
?>