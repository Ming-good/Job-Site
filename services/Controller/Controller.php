<?php
namespace Ming\Controller;
class Controller
{
	public function command($url, array $separation)
	{
		//URL검사를 한 후  해당 컨트롤러의 함수로 보내줌
		$Bool = $this -> urlCheck($url);
		if($Bool)
		{
			$func = $separation[1];
			$C_location = '\Ming\Controller\\'.$separation[0];
			$Controller = new $C_location();
			$Controller -> $func();
			

		}
		
	}

	//GET으로 입력받은 URL과 Route의 wep.php에서 입력한 URL간에 검사 위한 함수
	public function urlCheck($url)
	{
		if($url == $_GET['url'])
		{
			return TRUE;
		}
	}

}

