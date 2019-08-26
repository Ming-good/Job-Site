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
			#nav변수는 startPage, endPage, currentPage, list를 리턴한다.
			$nav = Page::list('opening');
			#nav['list']는 해당 테이블에 모든 레코드 정보가 있다.
			$data = $nav['list'];

			$i = 0;
			foreach($data as $row) {
				$year = explode(' ', $data[$i]['created']);
				$data[$i]['created'] = $year[0];
				$i++;
			}


			Blade:: view('enterprise/jobList', compact('data', 'nav'));
		} else {
			return redirect('home');
		}
	}

	public function show()
	{
		$id = $_GET['id'];
		$db= DB::Connect();
		$stmt = $db -> prepare('SELECT * FROM opening WHERE order_id=:id');
		$stmt2 =  $db -> prepare('SELECT * FROM account_info WHERE u_id=:u_id');

		$stmt->bindValue(':id', $id);
		$stmt->execute();

		$listData = $stmt->fetch();

		$stmt2->bindValue(':u_id', $listData['u_id']);
		$stmt2->execute();

		$userData = $stmt2->fetch();
		Blade:: view('enterprise/jobBoard', compact('listData', 'userData'));
	}
	#채용공고 등록 뷰로 이동 함수
	public function create()
	{
		session_start();
		if(isset($_SESSION['token']) && $_SESSION['authority'] = 'e') {
			Blade:: view('enterprise/register');
		} else {
			return redirect('home');
		}

	}

	#채용공고 데이터처리 함수
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
		echo $career = $_POST['radioCareer'];
		echo $comment = $_POST['comment'];
		$fileName = upload('/var/www/html/Job-Site/assets/upload/', $_FILES['userfile']);
		
		$data = compact('u_id', 'title', 'category1', 'category2', 'hire', 'shape','salary', 'money', 'area', 'sex', 'career', 'comment', 'fileName');
		

		DB::jobRegister($data);

		redirect('home');

	}
}


