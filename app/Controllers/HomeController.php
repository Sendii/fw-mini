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

	public function __construct(){
		session_start();
		$this->deleteSession();
	}

	public function deleteSession(){		
		if (isset($_SESSION["message"])) {
			$logout = "index.php"; 

			$timeout = 10; //detik
			if(isset($_SESSION['start_session'])){
				$elapsed_time = time()-$_SESSION['start_session'];
				if($elapsed_time >= $timeout){
					session_destroy();
				}
			}				
		}
	}
	public function makeSession($kata){
		$_SESSION["message"] = $kata;
		$_SESSION['start_session']=time();
	}

	public function methodNotFound(){
		return $this->view('error/404-method');
	}

	public function controllerNotFound(){
		return $this->view('error/404-controller');
	}

	public function index(){
		$users = $this->model('User')->index();
		return $this->view('user/list-user', ['users' => $users]);
	}

	public function detail($id){
		$users = $this->model('User')->edit($id);
		return $this->view('user/detail-user', ['users' => $users]);
	}

	public function add(){
		return $this->view('user/add-user');
	}

	public function save(){	
		$new = $this->model('User')->save( [$_POST['nama'], $_POST['jenkel']] );
		$this->makeSession("Berhasil menambah data");
		header("Location: http://localhost/mini-fw/public/home/"); 
	}

	public function edit($id){
		$users = $this->model('User')->edit($id);
		return $this->view('user/edit-user', ['users' => $users]);
	}

	public function update(){
		$new = $this->model('User')->update($_POST['id_user'], [$_POST['nama'], $_POST['jenkel']] );
		$this->makeSession("Berhasil mengupdate data");
		header("Location: http://localhost/mini-fw/public/home/"); 
	}

	public function delete($id){
		$users = $this->model('User')->delete($id);
		$this->makeSession("Berhasil menghapus data");
		header("Location: http://localhost/mini-fw/public/home/");
	}

}

?>