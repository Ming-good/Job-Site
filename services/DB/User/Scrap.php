<?php
namespace Ming\DB\User;

use Ming\DB\DBController as DB;

trait Scrap
{
	public function scrapConfirm($userID, $id)
	{
                $db = DB::Connect();
                $sql = 'SELECT EXISTS (SELECT * FROM scrap WHERE u_id=:u_id AND opening_no=:opening_no) as success';
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':u_id', $userID);
                $stmt -> bindValue(':opening_no', $id);
                $stmt -> execute();
                $answer = $stmt -> fetch();

		return $answer;
	}

	public function insertScrap($userID, $title, $opening_no) 
	{
                $db = DB::Connect();
                $sql = "INSERT INTO scrap (u_id, title, opening_no) VALUES (:u_id, :title, :opening_no)";
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':u_id', $userID);
                $stmt -> bindValue(':title', $title);
                $stmt -> bindValue(':opening_no', $opening_no);
                $stmt -> execute();

		return '1';
	}

	public function deleteScrap($userID, $opening_no)
	{
                $db = DB::Connect();
                $sql = "DELETE FROM scrap WHERE u_id=:u_id AND opening_no=:opening_no";
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':u_id', $userID);
                $stmt -> bindValue(':opening_no', $opening_no);
                $stmt -> execute();

		return '0';
	}
}

