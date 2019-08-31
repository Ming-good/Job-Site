<?php
use Ming\DB\DBController as DB;

function redirect($url)
{
        header('Location:/Job-Site/'.$url);
}

function upload($uploadDir, array $inputName)
{
		#파일이름 해시
		$fileHash = bin2hex(openssl_random_pseudo_bytes(8));

		
		#확장자 체크
		$ext = array_pop(explode('.', strtolower($inputName['name'])));
		if(!in_array($ext, array('jpg', 'png', 'gif'))) return false;

		#파일사이즈 5M이하로 제한
		if($inputName['size'] > 5242880	)return false;

		$fileName = $fileHash.'.'.$ext;
 		ini_set('display_errors', 1);
               	$uploadFile = $uploadDir.basename($fileName);
               	if(move_uploaded_file($inputName['tmp_name'], $uploadFile)) {
               		echo 'Success';
               	} else {
                       	echo 'Faile';
               	}

		return $fileName;

}


function pageList($table, $no)
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
       $stmt = $db -> prepare('SELECT * FROM '.$table.' ORDER BY '.$no.' desc LIMIT '.($currentPage*5).', 5');
       $stmt->execute();
       $list = $stmt->fetchAll();


       $data = compact('endPage', 'startPage','nextPage', 'currentPage', 'list');

       return $data;
}
