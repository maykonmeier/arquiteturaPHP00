<?php
include ('application/models/DAO/genericDAO.php');


class FactoryDAO {
	private static $instance = null;
	
	public static function getInstance( $objName ) {
		include ('application/models/DAO/'.$objName.'.php');
		//verifica se ja existe uma stancia de um DAO
		if ( (self::$instance == null) OR !($objName instanceof $objName) ) { 
			self::$instance = new $objName();
		}
		
		return self::$instance;
	}
	
	//instancia da model e do core do code CI
	protected function getCI () {
		$CI = &get_instance();
		return $CI;
	}
}