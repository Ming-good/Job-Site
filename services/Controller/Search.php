<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\lib\Validator;
use Ming\DB\DBController as DB;

class Search
{
	public function index()
	{
		session_start();


		#쿼리문에 속성명
		$column = array();
		#데이터베이스에 저장할 값
		$values = array();
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
		
		#위의 조건들에 맞는 정보를 검색합니다. (해당함수는 Search모델에 존재) 
		$arr = DB::detail($column, $values, $keyword, $_GET['id']);	

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
 
		$addr = 'allList'; 
		Blade::view('search/search', compact('data', 'keyword', 'nav', 'addr'));
	}

}
