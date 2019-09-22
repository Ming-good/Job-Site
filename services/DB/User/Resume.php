<?php
namespace Ming\DB\User;

use Ming\DB\DBController as DB;

trait Resume
{
	#이력서 등록
	public function resumeEnrollment(array $data)
	{
		$db = DB::Connect();
		$sql = 'INSERT INTO resume(u_id, name, birth, email, mobile, grade, school, title, content, created) VALUES(:u_id, :name, :birth, :email, :mobile, :grade, :school, :title, :content, now())';
		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':u_id', $data['u_id']);
		$stmt -> bindValue(':name', $data['name']);
		$stmt -> bindValue(':birth', $data['birth']);
		$stmt -> bindValue(':email', $data['email']);
		$stmt -> bindValue(':mobile', $data['mobile']);
		$stmt -> bindValue(':grade', $data['grade']);
		$stmt -> bindValue(':school', $data['school']);
		$stmt -> bindValue(':title', $data['title']);
		$stmt -> bindValue(':content', $data['content']);
		$stmt -> execute();
	}

	#이력서 업데이트
	public function resumeUpdate(array $data)
	{
		$db = DB::Connect();
		$sql = "UPDATE resume SET name=:name, birth=:birth, email=:email, mobile=:mobile, grade=:grade, school=:school, title=:title, content=:content WHERE order_id=:no";
		$stmt = $db -> prepare($sql);
                $stmt -> bindValue(':name', $data['name']);
                $stmt -> bindValue(':birth', $data['birth']);
                $stmt -> bindValue(':email', $data['email']);
                $stmt -> bindValue(':mobile', $data['mobile']);
                $stmt -> bindValue(':grade', $data['grade']);
                $stmt -> bindValue(':school', $data['school']);
                $stmt -> bindValue(':title', $data['title']);
                $stmt -> bindValue(':content', $data['content']);
		$stmt -> bindValue(':no', $data['no']);
		$stmt -> execute();
		
	}

	#해당 이력서의 정보를 가져옵니다.
	public function resumeView($no)
	{
                $db = DB::Connect();
                $sql = 'SELECT * FROM resume WHERE order_id=:no';
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':no', $no);
                $stmt -> execute();
		$data = $stmt -> fetch();

		return $data;
	}

	#이력서 삭제
	public function resumeDel($no)
	{
		$db = DB::Connect();
		$sql = "DELETE FROm resume WHERE order_id=:no";
		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':no', $no);
		$stmt -> execute();
	}

        #해당 유저의 모든 이력서 정보를 가져옵니다.
	public function resumeShow($userID)
	{
                $db = DB::Connect();
                $sql = 'SELECT order_id,title,created FROM resume WHERE u_id=:u_id';
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':u_id', $userID);
                $stmt -> execute();

                $data = $stmt -> fetchAll();

                $i =0;
                foreach($data as $row) {
                      $created = explode(' ', $data[$i]['created']);
                      $data[$i]['created'] = $created[0];
                      $i++;
		}

		return $data;

	}

	#이력서 총 개수
	public function resumeCount($userID)
	{
                $db = DB::Connect();
                $sql = 'SELECT count(*) FROM resume WHERE u_id=:u_id';
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':u_id', $userID);
                $stmt -> execute();

                $count = $stmt -> fetchColumn();
		return $count;
	}
}


