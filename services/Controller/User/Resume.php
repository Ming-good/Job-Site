<?php
namespace Ming\Controller\User;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;

class Resume
{
	#이력서 리스트 뷰
	public function index()
	{
                session_start();
		if(isset($_SESSION['token']) && $_SESSION['authority'] == 'u') {		
			$userID = $_SESSION['id'];
			#유저의 이력서 정보를 모두 가져옵니다 (해당 함수는 Resume모델에 존재)
			$data = DB::resumeShow($userID);

			Blade::view('resume/management', compact('data'));
		} else {
			redirect('home');
		}
	}

	#이력서 게시판 뷰
	public function show()
	{
		$no = $_GET['no'];
		#해당 이력서의 정보를 가져옵니다 (해당 함수는 Resume모델에 존재)
		$data = DB::resumeView($no);

		if(empty($data)) {
			session_start();
			$_SESSION['check'] = true;
			return redirect('home');
		}

		Blade::view('resume/board', compact('data'));
	}
	#이력서 수정 ⊙ 작성 뷰
	public function create()
	{
		session_start();
		$no = $_GET['no'];
                if($_SESSION['authority'] == 'u' && $_GET['mode'] == 'modify') {

                        #게시물 제작자가 맞는지 확인합니다.
                        $checkID = DB::producer($no, 'resume');
                        if($checkID['u_id'] != $_SESSION['id']) {
				$_SESSION['check'] = true;
                                return redirect('home');

                        }


			$mode = 'modify';

			$data = DB::resumeView($no);

			Blade::view('resume/enrollment', compact('mode', 'data'));
		} else if($_SESSION['authority'] == 'u') {
			$userID = $_SESSION['id'];
			#유저의 프로필 정보를 가져옵니다 (해당 함수는 Member모델에 존재)
			$data = DB::profile($userID);
			#이력서의 모든 레코드 개수를 가져옵니다 (해당 함수는 Resume모델에 존재)
			$count = DB::resumeCount($userID);
			Blade::view('resume/enrollment', compact('data', 'count'));
		} else {
			redirect('home');
		}
	}


	#이력서 정보 저장
	public function store()
	{
		session_start();
		if(hash_equals($_SESSION['token'], $_POST['_token'])) {
			$inputTitle = $_POST['inputTitle'];
			$u_id = $_SESSION['id'];
			$name = $_POST['inputName'];
			$birth = $_POST['inputBirth'];
			$email = $_POST['inputEmail'];
			$mobile = $_POST['inputMobile'];
			$grade = $_POST['selectGrade'];
			$school = $_POST['inputSchool'];
			$title = empty($inputTitle) ? '이력서' : $inputTitle;
			$content = $_POST['inputContent'];
		
			$data = compact('u_id', 'name', 'birth', 'email', 'mobile', 'grade', 'school', 'title', 'content');
			#이력서를 저장합니다 (해당 함수는 Resume모델에 있습니다)
			DB::resumeEnrollment($data);
		}
		return redirect('resume/management');

	}
	#이력서 삭제
	public function destroy()
	{
		session_start();
		$no = $_GET['no'];
                if($_SESSION['authority'] == 'u' && hash_equals($_SESSION['token'], $_POST['_token'])) {
			#이력서 정보를 삭제합니다 (해당 함수는 Resume모델에 존재)
			DB::resumeDel($no);	
		}

		return redirect('home');
	}
	
	#이력서 정보 업데이트 처리
	public function update()
	{
		session_start();
                if(hash_equals($_SESSION['token'], $_POST['_token'])) {
			$no = $_GET['no'];
                	$name = $_POST['inputName'];
                	$birth = $_POST['inputBirth'];
                	$email = $_POST['inputEmail'];
                	$mobile = $_POST['inputMobile'];
                	$grade = $_POST['selectGrade'];
                	$school = $_POST['inputSchool'];
                	$title = $_POST['inputTitle'];
                	$content = $_POST['inputContent'];

                	$data = compact( 'no', 'name', 'birth', 'email', 'mobile', 'grade', 'school', 'title', 'content');

			#이력서 정보를 갱신합니다 (해당 함수는 Resume모델에 존재)
			DB::resumeUpdate($data);
		}
		return redirect('resume/management');
		
	}
}
