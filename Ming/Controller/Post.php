<?php
namespace Ming\Controller;
use Ming\DB\DBController as DB;
use Ming\lib\helper;
use Ming\lib\Validator;;
class Post
{
	public function index()
	{

		$db = DB::PDO();

		helper:: view('index');
	}

	public function store()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
			$Name = $_POST['inputName'];
			$Email = $_POST['inputEmail'];
			$ID = $_POST['inputID'];
			$Password = $_POST['inputPassword'];
			$PasswordCheck = $_POST['inputPasswordCheck'];
			$Birthday = $_POST['inputBirthday'];
			$Mobile = $_POST['inputMobile'];

			$data=[];
			array_push($data, $Name, $Email, $ID, $Password, $PasswordCheck, $Birthday, $Mobile);
			
		}
		Validator::required($data);
		helper::redirect('home');

	}

	public function create()
	{
		
		helper:: view('SignUp/SignUp');

	}

	public function Update()
	{
		
	}
}
