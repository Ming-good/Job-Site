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


                #특수문자 방지
                $keyword = preg_replace("/[#\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $keyword);
                #이중공백,키워드 외측 공백 방지
                $keyword = trim(preg_replace('/[\s\t\n\r\s]+/', ' ', $keyword));

                #검색 헬퍼함수를 이용하여 자료를 검색
                $searchKey = search($keyword, $data, 1);
                $count = count($searchKey);

                #배열내의 배열값 개수를 카운트하여 페이지네이션 함수로 값을 보냄
                $nav = pageList($count, $no);
                $data = array_splice($searchKey, $nav['currentPage']*5, 5);

		return compact('data', 'nav');
	}	

	#실시간 검색어
        public function realTimeSearch()
        {
                $db = DB::Connect();
                $sql ="SELECT thisweek.rank,thisweek.keyword, IFNULL(thisweek.rank - prevweek.rank, 999) RANKING FROM (SELECT keyword,(@rank := @rank +1) AS rank FROM search AS a,(SELECT @rank := 0) AS b ORDER BY a.counts DESC LIMIT 0,9) AS thisweek LEFT OUTER JOIN (SELECT keyword, rank FROM weeksearch) AS prevweek ON thisweek.keyword = prevweek.keyword ORDER BY thisweek.rank;";
                $stmt = $db -> prepare($sql);
                $stmt -> execute();

                $data = $stmt -> fetchAll();


		return $data;

        }
	#라이브 검색
	public function liveSearch($keyword)
	{
		#특수문자 방지
		$keyword = preg_replace("/[#\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $keyword);
                #이중공백,키워드 외측 공백 방지
                $keyword = trim(preg_replace('/[\s\t\n\r\s]+/', ' ', $keyword));
                #키워드간의 공백을 mysql 검색을 위해 특수문자 | 로 변경
                $searchData = explode(' ',$keyword);


                if(empty($keyword)) {
                        echo 'false';
                } else {

                        $db = DB::Connect();
                        $sql = "SELECT title FROM opening";
                        $stmt = $db -> prepare($sql);
                        $title = $keyword;
                        $stmt -> bindValue(':title', $title);
                        $stmt -> execute();
                        $titleData = $stmt -> fetchAll();

                	$data = search($keyword, $titleData, 0);
                	$data = array_splice($data, 0, 5);

                        foreach($data as $row) {
				#임시로 쓰일 title 변수 
				$title = $row['title'];
				#라이브 검색 결과와 매치된 키워드
                                $temp = NULL;
				#이전 문자열의 위치
				$tempNum = 999;
				$str = NULL;
                                #키워드와 매치되는 데이터의 문자열을 <strong>으로 이펙트를 줌
                                foreach($searchData as $searchRow){
                                        $match = '/'.$searchRow.'/iu';
                                        $check = preg_match($match, $title);

					if($check == 1) {
						
						#라이브 검색 결과와 매치되는 키워드의 문자열 위치
						$str_location = mb_strpos($row['title'], $searchRow,0, 'utf-8');
						#키워드 문자열 길이
						$str_len = mb_strlen($searchRow, 'utf-8');

						#만약 현재 키워드 문자열 위치가 (이전 키워드 문자열의 끝 위치+2)보다 작다면  
						if($str_location < $tempNum) {
                                                	#키워드와 매치된 데이터의 문자 위치에 *로 표시를 줌
                                                	$title = preg_replace($match, '*', $title, 1);
                                                	$temp == NULL ? $temp = $searchRow : $temp = $temp.' '.$searchRow;
                       	                        	$str = '<strong style="color:#4876ef;">'.$temp.'</strong>';
                       	                        	# *로 표시된 위치에 $str 문자열을 넣음
                       	                        	$str = preg_replace('/\*/', $str, $title, 1);
							#현재 키워드 문자열 위치 + 길이 +2 
							$tempNum = $str_location + $str_len +2;
						}

                                        }
				}
				#출력될 라이브 검색어에 남아있는 특수문자 찌꺼기를 제거함.
                                $str = str_replace('*', '', $str);
				if($str!=NULL) {
                                	echo "<div class='liveKey_Wrap'><a style='text-decoration:none;' href='/Job-Site/allList?inputKeyword=".$row['title']."'>".$str."</a></div>";
				}

                        }
		}

	}
	
}
