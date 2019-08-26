<?php
namespace Ming\lib;

use Ming\DB\DBController as DB;

class Pagenav
{
	public function list($table)
	{
		$db = DB::Connect();
		$sql = "SELECT count(*) FROM ".$table;
		$stmt = $db->prepare($sql);
		$stmt->execute();

		$count = $stmt->fetchColumn();
		$page = 5;
		$morePage = 5;

		#현재 페이지
		$currentPage = $_GET['id'] ? $_GET['id'] : 0;
		#페이지블럭 카운터
		$nowBlock = floor($currentPage/$page);

		$endPage = $page*($nowBlock+1);
		$startPage = $endPage-$morePage; 

		$nextPage=TRUE;
		$totalPage = ceil($count/5);
		if($endPage >= $totalPage) {
			$endPage=$totalPage;
			$nextPage=FALSE;
		}

		
                $db = DB::Connect();
		$stmt = $db -> prepare('SELECT * FROM '.$table.' ORDER BY order_id desc LIMIT '.($currentPage*5).', 5');
                $stmt->execute();
                $list = $stmt->fetchAll();


		$data = compact('endPage', 'startPage','nextPage', 'currentPage', 'list');
		
		return $data;
	}
}

