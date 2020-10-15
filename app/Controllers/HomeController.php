<?php

class HomeController extends Controller{
	// public function testModel(){
	// 	$user = $this->model('User');
	// 	echo $user->name;
	// }

	// public function index(){
	// 	$user = $this->model('User');
	// 	return $this->view('home', ['nama' => $user->name, 'umur' => $user->umur]);		
	// }
	public function methodNotFound(){
		return $this->view('error/404-method');
	}

	public function controllerNotFound(){
		return $this->view('error/404-controller');
	}

	public function index(){
		return $this->view('home');
	}

	public function profile($name='', $umur=''){
		echo 'nama anda adalah: '.$name.$umur;
	}
}

?>