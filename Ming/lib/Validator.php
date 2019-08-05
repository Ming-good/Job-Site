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

	public function idCheck(array $data)
	{
		$u_id = $data['id'];
		
		$db = DB::Connect();
		$stmt = $db -> prepare('SELECT u_id FROM account_info');
		$stmt -> execute();
		$idList = $stmt -> fetchAll();

		foreach ($idList as $row) {

			if ($u_id === $row['u_id']) {
				return false;
			}
		}
		return true;
	}

	public function passwdCheck(array $data)
	{
		$pw = $data['password'];
		$pw_ck = $data['passwordCheck'];
		$num = preg_match('/[0-9]/u', $pw);
		$eng = preg_match('/[a-z]/u', $pw);
		$spe = preg_match('/[\!\@\#\$\%\^\&\*]/u', $pw);

		if ($pw != $pw_ck) {
			return false;
		} elseif ($eng == 0 || $num == 0 || $spe == 0) {
			return false;
		} elseif (strlen($pw) <= 8 || strlen($pw) >= 20) {
			return false;
		}

		return true;

	}

	public function emailCheck(array $data)
	{
		$email = preg_match('/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}/u',$data['email']);

		if ($email==1) {
			return true;
		}
			
	}

}

