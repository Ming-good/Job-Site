<?php
namespace Ming\Controller\User;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;

class Scrap
{
	public function index()
	{
                session_start();
                $userID = $_SESSION['id'];

		$db = DB::Connect();
		$sql = "SELECT * FROM scrap WHERE u_id=:u_id"; 
		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':u_id', $userID);
		$stmt -> execute();
		$data = $stmt -> fetchAll();

		Blade:: view('scrap/list', compact('data'));

	}
	public function create()
	{
		session_start();
		$userID = $_SESSION['id'];
		$title = $_POST['title'];
		$opening_no = $_POST['id'];

		$answer = DB::scrapConfirm($userID, $opening_no);
		$bool = $answer['success'];

		if($bool == 0 && hash_equals($_SESSION['token'], $_POST['_token'])) {
			$num = DB::insertScrap($userID, $title, $opening_no);
			echo $num;
		} else {
			echo 'fail';
		}
	}

	public function delete()
	{
		session_start();
		$userID = $_SESSION['id'];
		$opening_no = $_POST['id'];

                $answer = DB::scrapConfirm($userID, $opening_no);
                $bool = $answer['success'];

		if($bool == 1 && hash_equals($_SESSION['token'], $_POST['_token'])) {
			$num = DB::deleteScrap($userID, $opening_no);
			echo '0';
		} else {
			echo 'fail';
		}
	}
}

