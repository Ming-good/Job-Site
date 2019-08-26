<?php
namespace Ming\Controller;

use Ming\lib\Blade;
use Ming\lib\Validator;
use Ming\DB\DBController as DB;


class Post
{
	#메인 뷰로 이동 함수
	public function index()
	{


		session_start();
		if (isset($_SESSION['token'])) {
			$token = $_SESSION['token'];
			$email = $_SESSION['email'];
			$name = $_SESSION['name'];
			$authority = $_SESSION['authority'];

			Blade:: view('index', compact('token', 'email', 'name', 'authority'));
		} else {
			Blade:: view('index');
		}

	}


	#회원가입 뷰로 이동 함수
	public function create()
	{
		Blade:: view('SignUp/SignUp');

	}
	#회원가입 데이터 처리 함수
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
			$authority = $_POST['inputRadio'];

                        $data = compact( 'name', 'email', 'id', 'password', 'passwordCheck', 'birthday', 'mobile', 'authority');

                }
		#유효성 검사
                if (Validator::required($data) && Validator::passwdCheck($data['password'], $data['passwordCheck']) && Validator:: emailCheck($data['email']) && Validator:: idCheck($data['id'])) {

                        DB::storeUser($data);

                        return redirect('home');
                } else {
                        return redirect('Sign-up');
                }
       }


	#아이디 중복 검사 함수
        public function checkId()
        {
		$id = $_GET['id'];
		$check = Validator::idCheck($id);
                if($check) {
			Blade:: view('SignUp/Child', compact('id', 'check'));
                } else {
			Blade:: view('SignUp/Child', compact('id', 'check'));
                        
                }
        }	

}

