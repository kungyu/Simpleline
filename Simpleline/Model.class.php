<?php
namespace Simpleline;

class Model {
	
	protected $type;
	protected $dbtype;
	protected $dbname;
	protected $username;
	protected $pwd;
	protected $dbhost;
	protected $charset;

	public function __construct(){
		if($dbconfig = C('DB'))
			$this->getConfig($dbconfig);
	}
	
	public function getConfig($dbconf){
		$this->dbtype = $dbconf['type'];
		$this->dbname = $dbconf['dbname'];
		$this->username = $dbconf['username'];
		$this->pwd = $dbconf['pwd'];
		$this->dbhost = $dbconf['dbhost'];
		$this->charset = $dbconf['charset'];
	}
}
