<?php
namespace Ming\Controller;

use Ming\DB\DBController as DB;
use Ming\lib\Validator;

class Auth
{
        public function login()
        {
                $id = $_POST['id'];
                $pw = $_POST['passwd'];
                DB::login($id, $pw);
                return redirect('../home');

        }

	public function logout()
	{
		session_start();	
		session_destroy();
		return redirect('../home');
	}

	
}
