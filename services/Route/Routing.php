<?php
namespace Ming\Route;

use Ming\DB\DBController as DB;

class Routing
{

	public function Route($url, $Controller)
	{	
		$separation = explode('@',$Controller);
		$ControllName =new \Ming\Controller\Controller();
		$ControllName -> Command($url, $separation);
	}

	
}
require_once 'wep.php';
