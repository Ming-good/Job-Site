<?php
namespace Ming\lib;

use Ming\DB\DBController as DB;
class Validator
{
	public function required(array $data)
	{
		foreach($data as $row){
			if(empty($row)){
				return false;
			}
		}
		return true;
	}

	public function idCheck($u_id)
	{	
		$db = DB::Connect();
		$stmt = $db -> prepare('SELECT u_id FROM account_info WHERE u_id = :u_id');
		$stmt -> bindValue(':u_id', $u_id);
		$stmt -> execute();
		$idList = $stmt -> fetch();

		if ($idList) {
			return false;
		}
		
		return true;
	}

	public function passwdCheck($pw, $pw_ck)
	{
		$num = preg_match('/[0-9]/u', $pw);
		$eng = preg_match('/[a-z]/u', $pw);
		$spe = preg_match('/[\!\@\#\$\%\^\&\*]/u', $pw);

		if ($pw != $pw_ck) {
			return false;
		} elseif ($eng == 0 || $num == 0 || $spe == 0) {
			return false;
		} elseif (strlen($pw) <= 7 || strlen($pw) >= 15) {
			return false;
		}

		return true;

	}

	public function emailCheck($email)
	{
		$addr = preg_match('/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}/i', $email);

		if ($addr==1) {
			return true;
		} else {
			return false;
		}
			
	}
	
}

