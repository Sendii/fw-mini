<?php

class ErrorController extends Controller{
	public function methodNotFound(){
		return $this->view('error/404-method');
	}
}