<?php

class Route{

	protected $controller = 'homeController';
	protected $method	  = 'index';
	protected $params 	  = [];

	public function __construct(){
		if (isset($_GET['url'])) {
			$url = explode('/', filter_var( trim( $_GET['url'] ), FILTER_SANITIZE_URL ));
			$url[0] = $url[0].'Controller';
		}else{
			$url[0] = 'home';
		}

		//ngecek file controller ada atau nggak ada		
		if (count($url) > 1) {
			if ($url[1] == "") {
				$url[1] = $this->method;
			}
		}

		if (file_exists('../app/controllers/'. $url[0]. '.php')) {
			$this->controller = $url[0];

			$this->makeClass();

			// ngecek metode controller
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
			}
			// kalau method nggak ada
			else{
				$this->method = 'methodNotFound';
			}

		}
		else{
			// kalau controller nggak ada
			$this->makeClass();
			$this->method = 'controllerNotFound';
		}		

		unset($url[0]);
		unset($url[1]);
		$this->params = $url;

		// panggil function nya
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function makeClass(){
		require_once '../app/controllers/'. $this->controller. '.php';
		$this->controller = new $this->controller;
	}
}

?>