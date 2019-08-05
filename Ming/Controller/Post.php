<?php
namespace Ming\Controller;

use Ming\DB\DBController as DB;
use Ming\lib\blade;
use Ming\lib\Validator;

class Post
{
	public function index()
	{

		$db = DB::Connect();
		blade:: view('index');
	}

	public function store()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {	
			$name = $_POST['inputName'];
			$email = $_POST['inputEmail'];
			$id = $_POST['inputID'];
			$password = $_POST['inputPassword'];
			$passwordCheck = $_POST['inputPasswordCheck'];
			$birthday = $_POST['inputBirthday'];
			$mobile = $_POST['inputMobile'];

			$data = compact( 'name', 'email', 'id', 'password', 'passwordCheck', 'birthday', 'mobile');
			
		}
		if (Validator::required($data) && Validator::passwdCheck($data) && Validator:: emailCheck($data) && Validator:: idCheck($data)) {
			return redirect('home');
		} else {
			return redirect('Sign-up');
		}

	}

	public function create()
	{
		
		blade:: view('SignUp/SignUp');

	}

	public function update()
	{
		
	}
}
