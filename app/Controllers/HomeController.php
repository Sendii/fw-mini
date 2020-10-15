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

	public function index(){
		return $this->view('home');
	}

	public function user(){
		echo "ea";
	}
}

?>