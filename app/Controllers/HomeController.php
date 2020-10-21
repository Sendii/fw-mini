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
	private $limitSession;
	
	public function deleteSession(){		
		if (isset($_SESSION["message"])) {
			$session_life = time() - $_SESSION['timeout'];
			if ($session_life > $this->limitSession) {
				session_destroy();
			}			
		}
	}

	public function __construct(){
		session_start();
		$this->limitSession = 1; //seconds
		$this->deleteSession();
	}

	public function methodNotFound(){
		return $this->view('error/404-method');
	}

	public function controllerNotFound(){
		return $this->view('error/404-controller');
	}


	public function profile($name='', $umur=''){
		echo 'nama anda adalah: '.$name.$umur;
	}

	public function index(){
		$users = $this->model('User')->index();
		return $this->view('user/list-user', ['users' => $users]);
	}

	public function add(){
		return $this->view('user/add-user');
	}

	public function save(){	
		$new = $this->model('User')->save( [$_POST['nama'], $_POST['jenkel']] );
		$_SESSION["message"] = "Berhasil Menambahkan data";		
		$_SESSION['timeout']=time();
		header("Location: http://localhost/mini-fw/public/home/"); 
	}

	public function detail($id){
		$users = $this->model('User')->edit($id);
		return $this->view('user/detail-user', ['users' => $users]);
	}

	public function edit($id){
		$users = $this->model('User')->edit($id);
		return $this->view('user/edit-user', ['users' => $users]);
	}
}

?>