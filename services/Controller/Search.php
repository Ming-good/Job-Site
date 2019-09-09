<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\lib\Validator;
use Ming\DB\DBController as DB;

class Search
{
	public function index()
	{

		#쿼리문을 담을 변수들
		$select = array('WHERE ', 'AND ');
		#쿼리문에 속성명
		$column = array();
		#데이터베이스에 저장할 값
		$values = array();
		$where = '';

		$j = 0;
		#검색어
		$keyword = $_GET['inputKeyword'];
		
		

		#GET값이 있을 경우 쿼리문에 넣을 속성명과 value값을 배열에 저장
		if(!empty($_GET['selectArea'])) { 
			array_push($column, 'area=? ');
			array_push($values, $_GET['selectArea']);
		}
		if(!empty($_GET['selectCareer'])) { 
			array_push($column, 'career=? ');
			array_push($values, $_GET['selectCareer']);
		}
		if(!empty($_GET['selectSex'])) { 
			array_push($column, 'sex=? ');
			array_push($values, $_GET['selectSex']);
		}

		#배열 개수를 세어 get값이 2개 이상일 경우 쿼리문에 WHERE과 AND를 추가 
		#만약 1개일경우 WHERE만 추가
		for($i=0; $i<count($values); $i++) {
			$where = $where.$select[$j].$column[$i];
			$i==0 ? $j++ : $j;
		}

                $db = DB::Connect();
		$sql = "SELECT * FROM opening ".$where."ORDER BY order_id DESC ";
                $stmt = $db->prepare($sql);

		for($i=0; $i<count($values); $i++) {
			$stmt -> bindValue($i+1, $values[$i]);
		}
		$stmt->execute();
		$data = $stmt -> fetchAll();

		#검색 헬퍼함수를 이용하여 자료를 검색
		$searchKey = search($keyword, $data);
		$count = count($searchKey);

		#배열내의 배열값 개수를 카운트하여 페이지네이션 함수로 값을 보냄
                $nav = pageList($count);
		$data = array_splice($searchKey, $nav['currentPage']*5, 5);
		
                $i = 0;
                foreach($data as $row) {
                        $created = explode(' ', $data[$i]['created']);
                        $modify = explode(' ', $data[$i]['modify']);
                        $data[$i]['created'] = $created[0];
                        $data[$i]['modify'] = $modify[0];
                        $i++;
		}
 
		$addr = 'allList'; 
		Blade::view('search/search', compact('data', 'keyword', 'nav', 'addr', 'values'));
	}

}
