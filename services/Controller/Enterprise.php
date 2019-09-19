<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;
	
class Enterprise
{
	#채용공고 리스트
	public function index()
	{
		session_start();
		if(isset($_SESSION['token']) && $_SESSION['authority'] == 'e') {
			$userID = $_SESSION['id'];
			$no = $_GET['id'];
			#해당 유저ID가 등록한 채용공고 정보를 가져옵니다. (해당 함수는 JobOpening모델에 있습니다.)			
			$arr = DB::boardManagement($userID, $no); 
			$userData = DB::profile($userID);
		
			$data = $arr['data'];
			$nav = $arr['nav'];

			$i = 0;
			foreach($data as $row) {
				$created = explode(' ', $data[$i]['created']);
				$modify = explode(' ', $data[$i]['modify']);
				$data[$i]['created'] = $created[0];
				$data[$i]['modify'] = $modify[0];
				$i++;
			}


			Blade:: view('enterprise/jobList', compact('data', 'nav', 'userData'));
		} else {
			return redirect('home');
		}
	}

	#채용공고 등록,수정 뷰
	public function create()
	{
		session_start();
		if($_SESSION['authority'] == 'e' && hash_equals($_SESSION['token'], $_POST['_token'])) {
			$id = $_GET['id'];

			#채용공고 수정시에 바뀌기 이전 정보를 유지하기 위해 해당 유저의 채용공고 정보를 가져옵니다.(해당 함수는 JobOpening모델에 있습니다.) 
			$data = DB:: boardView($id);
			$listData = $data['listData'];
			
			$mode = 'modify';
			Blade:: view('enterprise/register', compact('listData', 'mode'));
		} elseif($_SESSION['authority'] == 'e') {
			Blade:: view('enterprise/register');

		} else {
			return redirect('home');
		}

	}

	
	#채용공고 게시판 수정 처리
	public function update()
	{
		$u_id = $_SESSION['id'];
                $title = $_POST['inputTitle'];
                $category1 =  $_POST['category1'];
                $category2 = $_POST['category2'];
                $hire = $_POST['radioHire'];
                $shape = $_POST['radioShape'];
                $salary = $_POST['selectSalary'];
                $money = $_POST['inputMoney'];
                $area = $_POST['selectArea'];
                $sex = $_POST['radioSex'];
                $career = $_POST['radioCareer'];
                $comment = $_POST['comment'];
                empty($_FILES['userfile']['name']) ? $fileName : $fileName = upload('/var/www/html/Job-Site/assets/upload/', $_FILES['userfile']);
		$order_id = $_GET['id'];
		$mapInfo = $_POST['mapInfo'];
		$company = $_POST['company'];
		
                $data = compact('u_id', 'title', 'category1', 'category2', 'hire', 'shape','salary', 'money', 'area', 'sex', 'career', 'comment', 'fileName', 'order_id', 'mapInfo', 'company');
		#채용공고 정보를 업데이트 합니다.(해당 함수는 JobOpening모델에 있습니다.)
		DB:: boardUpdate($data);
		return redirect('list-g');	

	}
	#채용공고 게시판 삭제 처리
	public function destroy()
	{
		session_start();
		if(hash_equals($_SESSION['token'], $_POST['_token'])) {
			$id = $_GET['id'];

			#게시물 정보 삭제(해당 함수는 JobOpening모델에 있습니다.)
			DB::boardDestroy($id);

			return redirect('list-g');
		}
	}

	#채용공고 게시판 뷰
	public function show()
	{
		$id = $_GET['id'];

		#boardView 함수는 유저데이터와 채용공고 데이터를 리턴합니다. (해당 함수는 JobOpening모델에 있습니다.)
		$data = DB:: boardView($id);
		$listData = $data['listData'];
		$userData = $data['userData'];

		$map = explode('/', $listData['map']);

		
		Blade:: view('enterprise/jobBoard', compact('listData', 'userData', 'map'));
	}

	#채용공고 게시판 등록 처리 
	public function store()
	{
		session_start();

		if(empty($_POST['inputTitle'])) {
			return redirect('jobOpening');
		}
		
		$u_id = $_SESSION['id'];
		$title = $_POST['inputTitle'];
		$category1 =  $_POST['category1'];
		$category2 = $_POST['category2'];
		$hire = $_POST['radioHire'];
		$shape = $_POST['radioShape'];
		$salary = $_POST['selectSalary'];
		$money = $_POST['inputMoney'];
		$area = $_POST['selectArea'];
		$sex = $_POST['radioSex'];
		$career = $_POST['radioCareer'];
		$comment = $_POST['comment'];
		$fileName = upload('/var/www/html/Job-Site/assets/upload/', $_FILES['userfile']);
		$mapInfo = $_POST['mapInfo'];
		$company = $_SESSION['company'];

		
		$data = compact('u_id', 'title', 'category1', 'category2', 'hire', 'shape','salary', 'money', 'area', 'sex', 'career', 'comment', 'fileName', 'mapInfo', 'company');
		
		#위의 데이터를 받아와 데이터베이스에 등록합니다 (해당 함수는 JobOpening모델에 있습니다.)
		DB::jobRegister($data);

		redirect('home');

	}

}


