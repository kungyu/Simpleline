<?php

namespace controller;

use \Simpleline\Controller;
use \model\basemodel;

class basecontroller extends Controller{
	
	protected $model;

	public function __construct(){
		parent::__construct();
		$this->model = new basemodel();
	}	
}
