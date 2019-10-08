<?php
namespace Ming\Controller\Apply;

use Ming\lib\Blade;
use Ming\DB\DBController as DB;

class Management
{
	public function index()
	{
                session_start();
                if(isset($_SESSION['token']) && $_SESSION['authority'] == 'e') {
			$e_id = $_SESSION['id'];

			$db = DB::Connect();
			$sql = "SELECT * FROM apply WHERE e_id=:e_id";
			$stmt = $db -> prepare($sql);
			$stmt -> bindValue(':e_id', $e_id);
			$stmt -> execute();
			$data = $stmt -> fetchAll();

			Blade::view('apply/applicant', compact('data'));

		} else {
			redirect('home');
		}

	}

	public function destroy()
	{
		session_start();
		if($_SESSION['authority'] == 'e' && hash_equals($_SESSION['token'], $_POST['_token'])) {	
			$id = $_GET['id'];
			DB::applyDel($id);
			
		}
		

	}
}

