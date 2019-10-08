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
		Blade::view('apply/apply', compact('data'));

	}

	#이력서 지원 상태를 저장
	public function store()
	{
		session_start();
                if(hash_equals($_SESSION['token'], $_POST['_token'])) {

			$opening_no = $_GET['id'];
			#온라인 지원 신청하는 게시판의 정보를 가져옵니다(해당 함수는 enterprise모델에 있습니다.)
			$data = DB::onlineData($opening_no);

			$resume_no = $_POST['radioNo'];
			$title = $data['title'];
			$e_id = $data['u_id'];
			$userID = $_SESSION['id'];

			DB::applyStore($resume_no, $opening_no, $title, $userID, $e_id);
		}


	}
}

