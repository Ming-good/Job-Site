<?php
namespace Ming\Controller\Auth;

use Ming\DB\DBController as DB;
use Ming\lib\Validator;
use Ming\lib\Blade;

class Auth
{
	#로그인 뷰
	public function index()
	{
		session_start();
		if(isset($_SESSION['token'])) {
			return redirect('home');
		} else {
			Blade::view('login');
		}
	}

	#카카오 로그인과 동시에 개인 회원가입
	public function loginKakao()
	{
		$ID = $_POST['inputID'];
		$email = $_POST['inputEmail'];
		$name = $_POST['inputName'];
		$pw = $_POST['inputPw'];
		$authority = 'u';

		$data = compact('ID', 'email', 'name', 'pw', 'authority');

		$bool = Validator:: idCheck($ID);
		
		if($bool == true) {
			#카카오 회원가입을 위한 함수(해당 함수는 Member모델에 있습니다)
			DB::storeKakao($data);	
			#카카오 로그인을 위한 함수(해당 함수는 Member모델에 있습니다.)
			DB::loginKakao($ID);
			return redirect('home');
		} else {
			DB::loginKakao($ID);
			return redirect('home');
		}

		
	}
	#로그인 유효성 검사
        public function login()
        {
                $id = $_POST['id'];
		$pw = $_POST['passwd'];

		#로그인 함수 (해당 함수는 Member모델에 있습니다.)
                $bool = DB::login($id, $pw);

		if(empty($id)) {
			echo '아이디를 입력해주세요.';
		} else if(empty($pw)) {
			echo '비밀번호를 입력해주세요.';
		} else if($bool == false) {
			echo "false";
		} else if($bool == true) {
			echo 'true';
		}

	}


	#로그아웃. 세션제거
	public function logout()
	{
		session_start();	
		session_destroy();
		return redirect('home');
	}

        #아이디 중복 검사
        public function checkId()
	{
                $id = $_GET['id'];
		$spe = preg_match('/[\!\@\#\$\%\^\&\*]/u', $id);

		#중복된 값이 있을 경우 false를 준다
		$overlap = Validator::idCheck($id);
		$spe == 0 ? $speCheck = true : $speCheck = false;

                Blade:: view('SignUp/Child', compact('overlap', 'speCheck'));
        }
	
}
