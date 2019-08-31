<?php
namespace Ming\Controller;

use Ming\DB\DBController as DB;
use Ming\lib\Validator;
use Ming\lib\Blade;

class Auth
{
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
			DB::storeKakao($data);	
			DB::loginKakao($ID);
			return redirect('home');
		} else {
			DB::loginKakao($ID);
			return redirect('home');
		}

		
	}
        public function login()
        {
                $id = $_POST['id'];
                $pw = $_POST['passwd'];
                DB::login($id, $pw);
                return redirect('home');

        }

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
