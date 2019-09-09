<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;
use Ming\lib\Pagenav as Page;
	
class Enterprise
{
	#채용공고 리스트
	public function index()
	{
		session_start();
		if(isset($_SESSION['token']) && $_SESSION['authority'] = 'e') {
			#pageList헬퍼는 startPage, endPage, currentPage, nextPage 변수을 리턴한다.
			#pageList에 사용되는 파라미터는 사용할 레코드 갯수 입니다. 
			$db = DB::Connect();
			$sql = "SELECT count(*) FROM opening";
       			$stmt = $db->prepare($sql);
       			$stmt->execute();
       			$count = $stmt->fetchColumn();

			$nav = pageList($count);

			$stmt = $db -> prepare('SELECT * FROM opening ORDER BY order_id desc LIMIT '.($nav['currentPage']*5).', 5');
			$stmt->execute();
			$data = $stmt->fetchAll();

			$i = 0;
			foreach($data as $row) {
				$created = explode(' ', $data[$i]['created']);
				$modify = explode(' ', $data[$i]['modify']);
				$data[$i]['created'] = $created[0];
				$data[$i]['modify'] = $modify[0];
				$i++;
			}


			Blade:: view('enterprise/jobList', compact('data', 'nav'));
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
		DB:: boardUpdate($data);
		return redirect('list-g');	

	}
	#채용공고 게시판 삭제 처리
	public function destroy()
	{
		session_start();
		if(hash_equals($_SESSION['token'], $_POST['_token'])) {
			$id = $_GET['id'];

			#게시물 정보 삭제
			DB::boardDestroy($id);

			return redirect('list-g');
		}
	}

	#채용공고 게시판 뷰
	public function show()
	{
		$id = $_GET['id'];

		#boardView 함수는 유저데이터와 게시물데이터를 리턴합니다. 
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
		$company = $_POST['company'];

		
		$data = compact('u_id', 'title', 'category1', 'category2', 'hire', 'shape','salary', 'money', 'area', 'sex', 'career', 'comment', 'fileName', 'mapInfo', 'company');
		

		DB::jobRegister($data);

		redirect('home');

	}

}


