<?php
namespace Ming\DB\Search;

use Ming\DB\DBController as DB;

trait Search
{
	public function detail(array $column, array $values, $keyword, $no)
	{
                #쿼리문을 담을 변수들
                $select = array('WHERE ', 'AND ');
		$where = '';

                #배열 개수를 세어 get값이 2개 이상일 경우 쿼리문에 WHERE과 AND를 추가
		#만약 1개일경우 WHERE만 추가
		$j = 0;
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
                $nav = pageList($count, $no);
                $data = array_splice($searchKey, $nav['currentPage']*5, 5);

		return compact('data', 'nav');
	}	
}
