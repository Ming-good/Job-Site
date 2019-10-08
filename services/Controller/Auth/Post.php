<?php
namespace Ming\Controller\Auth;

use Ming\lib\Blade;
use Ming\lib\Validator;
use Ming\DB\DBController as DB;


class Post
{
	#메인 뷰
	public function index()
	{
		#메인 페이지에 최근채용정보를 가져옵니다(해당 함수는 JopOpening모델에 있습니다.)
		$data = DB::indexMenu();
		#실시간 검색어 데이터
		$searchData = DB::realTimeSearch();
		

		session_start();
		if (isset($_SESSION['token'])) {
			$token = $_SESSION['token'];
			$name = $_SESSION['name'];
			$authority = $_SESSION['authority'];
			
			Blade:: view('index', compact('data', 'token', 'name', 'authority', 'searchData'));
		} else {

			Blade:: view('index', compact('data', 'searchData'));
		}

	}


	#개인 회원가입 뷰
	public function userCreate()
	{
		Blade:: view('SignUp/userSignUp');

	}
	#개인 회원가입 데이터 처리
        public function userStore()
        {
                $name = $_POST['inputName'];
                $email = $_POST['inputEmail'];
                $id = $_POST['inputID'];
                $password = $_POST['inputPassword'];
                $passwordCheck = $_POST['inputPasswordCheck'];
                $birthday = $_POST['inputBirthday'];
                $mobile = $_POST['inputMobile'];
		$authority = 'u';

                $data = compact( 'name', 'email', 'id', 'password', 'passwordCheck', 'birthday', 'mobile', 'authority');

		#유효성 검사
                if (Validator::required($data) && Validator::passwdCheck($data['password'], $data['passwordCheck']) && Validator:: emailCheck($data['email']) && Validator:: idCheck($data['id'])) {
			#회원가입 (해당 함수는 Member모델에 있습니다.)
                        DB::storeUser($data);

                        return redirect('home');
                } else {
                        return redirect('userSign-up');
                }
       }
	
	#기업 회원가입 뷰
	public function enterpriseCreate()
	{
		Blade:: view('SignUp/enterpriseSignUp');

	}

	#기업 회원가입 데이터 저장
	public function enterpriseStore()
	{
		$company = $_POST['inputCompany'];
                $name = $_POST['inputName'];
                $email = $_POST['inputEmail'];
                $id = $_POST['inputID'];
                $password = $_POST['inputPassword'];
                $passwordCheck = $_POST['inputPasswordCheck'];
                $mobile = $_POST['inputMobile'];
                $authority = 'e';

		$data = compact('company' ,'name', 'email', 'id', 'password', 'passwordCheck', 'mobile', 'authority');

		if(Validator::required($data) && Validator::passwdCheck($data['password'], $data['passwordCheck']) && Validator:: emailCheck($data['email']) && Validator:: idCheck($data['id'])) {
			DB::storeEnterprise($data);
			return redirect('home');
		
		} else {
			return redirect('enterpriseSign-up');
		}

	}


}

