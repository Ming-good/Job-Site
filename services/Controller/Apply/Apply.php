<?php
namespace Ming\Controller\Apply;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;

class Apply 
{
	#온라인 지원시에 이력서 목록 팝업창을 띄우는 컨트롤러
	public function index()
	{
		session_start();
		if(isset($_SESSION['token']) && $_SESSION['authority'] == 'u') {
			$userID = $_SESSION['id'];
			$data = DB::resumeShow($userID);
		} 
		Blade::view('resume/apply', compact('data'));

	}

	#이력서 지원 상태를 저장
	public function store()
	{
		session_start();
		$opening_no = $_GET['id'];
		$resume_no = $_POST['radioNo'];
		$userID = $_SESSION['id'];

		DB::resumeApply($resume_no, $opening_no, $userID);



	}
}

