<?php

class ErrorController extends Controller{
	public function controllerNotFound(){
		return $this->view('error/404-controller');
	}
}