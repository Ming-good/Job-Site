<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;

class Enterprise
{
	#채용공고 뷰로 이동 함수
	public function create()
	{
		Blade:: view('enterprise/opening');

	}

	#채용공고 데이터처리 함수
	public function store()
	{
		$fileName = upload('/var/www/html/Job-Site/assets/upload/', $_FILES['userfile']);

		echo $fileName;

	}
}


