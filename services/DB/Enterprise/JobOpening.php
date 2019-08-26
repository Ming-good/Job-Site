<?php
namespace Ming\DB\EnterPrise;

use Ming\DB\DBController as DB;

trait JobOpening
{
	public function jobRegister(array $data)
	{	

		$db = DB::Connect();
		$sql = "INSERT INTO opening (u_id, title, job1, job2, hiring, shape, salary, money, area, sex, career, image, comment, created) VALUES(:u_id, :title, :category1, :category2, :hire, :shape, :salary, :money, :area, :sex, :career, :fileName, :comment, now())";

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
		$stmt -> execute();

	}


}

