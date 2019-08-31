<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;

class API
{
	public function map()
	{
		Blade::view('enterprise/map');
	}
}
