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

	public function edit($id){
		return $this->_db->edit($this->_namaTable, $id);
	}

	public function save($data){
		return $this->_db->save($this->_namaTable, $data);
	}

	public function update($id, $data){
		return $this->_db->update($this->_namaTable, $id, $data);
	}

	public function delete($id){
		return $this->_db->delete($this->_namaTable, $id);
	}
}
?>