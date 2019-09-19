<?php
namespace Ming\DB\EnterPrise;

use Ming\DB\DBController as DB;

trait JobOpening
{
	#채용공고 등록
	public function jobRegister(array $data)
	{	

		$db = DB::Connect();
		$sql = "INSERT INTO opening (u_id, title, job1, job2, hiring, shape, salary, money, area, sex, career, image, comment, created, map, company) VALUES(:u_id, :title, :category1, :category2, :hire, :shape, :salary, :money, :area, :sex, :career, :fileName, :comment, now(), :map, :company)";

		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':u_id', $data['u_id']);
		$stmt -> bindValue(':title', $data['title']);
		$stmt -> bindValue(':category1', $data['category1']);
		$stmt -> bindValue(':category2', $data['category2']);
		$stmt -> bindValue(':hire', $data['hire']);
		$stmt -> bindValue(':shape', $data['shape']);
		$stmt -> bindValue(':salary', $data['salary']);
		$stmt -> bindValue(':money', $data['money']);
		$stmt -> bindValue(':area', $data['area']);
		$stmt -> bindValue(':sex', $data['sex']);
		$stmt -> bindValue(':career', $data['career']);
		$stmt -> bindValue(':fileName', $data['fileName']);
		$stmt -> bindValue(':comment', $data['comment']);
		$stmt -> bindValue(':map', $data['mapInfo']);
		$stmt -> bindValue(':company', $data['company']);
		$stmt -> execute();

	}

	#채용공고 수정
	public function boardUpdate(array $data)
	{
		$db = DB::Connect();
		
		$sql = "SELECT image,map FROM opening WHERE order_id=:order_id";
		
		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':order_id', $data['order_id']);
		$stmt -> execute();

		$beforeImage = $stmt -> fetch();
	
		#만약 이미지파일을 변경 했다면 이전 이미지파일을 삭제
		$data['fileName'] == '' ? $data['fileName'] = $beforeImage['image'] : unlink('/var/www/html/Job-Site/assets/upload/'.$beforeImage['image']) ;
		$data['mapInfo'] == '' ? $data['mapInfo'] = $beforeImage['map'] : $data['mapInfo'];




		$sql2 = "UPDATE opening SET title=:title, job1=:category1, job2=:category2, hiring=:hire, shape=:shape, salary=:salary, money=:money, area=:area, sex=:sex, career=:career, image=:fileName, comment=:comment, modify=now(), map=:map, company=:company WHERE order_id=:order_id";

                $stmt2 = $db -> prepare($sql2);
                $stmt2 -> bindValue(':title', $data['title']);
                $stmt2 -> bindValue(':category1', $data['category1']);
                $stmt2 -> bindValue(':category2', $data['category2']);
                $stmt2 -> bindValue(':hire', $data['hire']);
                $stmt2 -> bindValue(':shape', $data['shape']);
                $stmt2 -> bindValue(':salary', $data['salary']);
                $stmt2 -> bindValue(':money', $data['money']);
                $stmt2 -> bindValue(':area', $data['area']);
                $stmt2 -> bindValue(':sex', $data['sex']);
                $stmt2 -> bindValue(':career', $data['career']);
                $stmt2 -> bindValue(':fileName', $data['fileName']);
                $stmt2 -> bindValue(':comment', $data['comment']);
		$stmt2 -> bindValue(':order_id', $data['order_id']);
		$stmt2 -> bindValue(':map', $data['mapInfo']);
		$stmt2 -> bindValue(':company', $data['company']);
		$stmt2 -> execute();

	}

	#해당 채용공고에 필요한 정보를 가져옵니다.
	public function boardView($id)
	{
                $db= DB::Connect();
                $stmt = $db -> prepare('SELECT * FROM opening WHERE order_id=:id');

                $stmt->bindValue(':id', $id);
                $stmt->execute();

                $listData = $stmt->fetch();

                $stmt2 =  $db -> prepare('SELECT * FROM account_info WHERE u_id=:u_id');
                $stmt2->bindValue(':u_id', $listData['u_id']);
                $stmt2->execute();

                $userData = $stmt2->fetch();

		return compact('listData', 'userData');

	}

	#해당 채용공고를 삭제합니다.
	public function boardDestroy($id)
	{
		$db = DB::Connect();

		$sql = 'SELECT image FROM opening WHERE order_id=:id';
		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':id', $id);
		$stmt -> execute();

		$data = $stmt -> fetch();
		unlink('/var/www/html/Job-Site/assets/upload/'.$data['image']);

        	$sql2 = 'DELETE FROM opening WHERE order_id=:id';
        	$stmt2 = $db -> prepare($sql2);
		$stmt2 -> bindValue(':id', $id);
        	$stmt2 -> execute();
	}

	#메인 페이지에 최근채용정보 
	public function indexMenu()
	{
		$db = DB::Connect();

		$sql = "SELECT * FROM opening ORDER BY order_id DESC LIMIT 0,6";
		$stmt = $db -> prepare($sql);
		$stmt->execute();

		$data = $stmt -> fetchAll();
		return $data;
	}

	#채용공고를 수정, 삭제 관리합니다.
	public function boardManagement($userId, $no)
	{
                $db = DB::Connect();
                $sql = "SELECT count(*) FROM opening WHERE u_id=:u_id";
                $stmt = $db->prepare($sql);
                $stmt -> bindValue(':u_id', $userId);
                $stmt->execute();
                $count = $stmt->fetchColumn();

		#pageList헬퍼는 startPage, endPage, currentPage, nextPage 변수을 리턴한다.
                #pageList에 사용되는 파라미터는 사용할 레코드 개수와 해당 페이지네이션 번호($_GET['id']) 입니다.
		$nav = pageList($count, $no);

                $stmt = $db -> prepare('SELECT * FROM opening WHERE u_id=:u_id ORDER BY order_id desc LIMIT '.($nav['currentPage']*5).', 5');
                $stmt -> bindValue(':u_id', $userId);
                $stmt->execute();
                $data = $stmt->fetchAll();
		
		return compact('nav', 'data');
	}
}

