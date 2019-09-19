<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;
use \PDO;
class API
{
	public function map()
	{
		Blade::view('enterprise/map');
	}
}
