<?php
namespace Ming\DB\User;

use Ming\DB\DBController as DB;

trait Member
{
	#회원가입
	public function storeUser(array $data)
	{
		#패스워드 해시
		$pwHash = password_hash($data['password'], PASSWORD_DEFAULT);

                $db = DB::Connect();
                $sql = "INSERT INTO account_info (name, u_id, u_pw, email, birthday, mobile, authority) VALUES (:name, :u_id, :u_pw, :email, :birthday, :mobile, :authority)";
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':name', $data['name']);
                $stmt -> bindValue(':u_id', $data['id']);
                $stmt -> bindValue(':u_pw', $pwHash);
                $stmt -> bindValue(':email', $data['email']);
                $stmt -> bindValue(':birthday', $data['birthday']);
		$stmt -> bindValue(':mobile', $data['mobile']);
		$stmt -> bindValue(':authority', $data['authority']);
                $stmt -> execute();		
	}


	#로그인
	public function login($id, $pw)
	{
                $db = DB::Connect();
                $stmt = $db -> prepare('SELECT * FROM account_info WHERE u_id = :id');
                $stmt -> bindValue(':id', $id);
                $stmt -> execute();		
		$userData = $stmt -> fetch();

		if(!$userData) {
			return redirect('home');	
		}

		if (password_verify($pw, $userData['u_pw'])) {
			session_start();
			$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));
			$_SESSION['name'] = $userData['name'];
			$_SESSION['email'] = $userData['email'];
			$_SESSION['authority'] = $userData['authority'];
			$_SESSION['id'] = $userData['u_id'];
		} else {
			return redirect('home');
		}
	}

	#카카오 회원가입
	public function storeKakao(array $data)
	{
		$db = DB::Connect();
		$sql = 'INSERT INTO account_info (name, u_id, u_pw, email, authority) VALUES (:name, :u_id, :u_pw, :email, :authority)';
		$stmt = $db -> prepare($sql);
		$stmt -> bindValue(':name', $data['name']);
		$stmt -> bindValue(':u_id', $data['ID']);
                $stmt -> bindValue(':u_pw', $data['pw']);
		$stmt -> bindValue(':email', $data['email']);
		$stmt -> bindValue(':authority', $data['authority']);
		$stmt -> execute();
	}

	#카카오 로그인
	public function loginKakao($id)
	{
                $db = DB::Connect();
                $stmt = $db -> prepare('SELECT * FROM account_info WHERE u_id = :id');
                $stmt -> bindValue(':id', $id);
                $stmt -> execute();
                $userData = $stmt -> fetch();

                if(!$userData) {
                        return redirect('home');
		}

		session_start();
                $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));
                $_SESSION['name'] = $userData['name'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['authority'] = $userData['authority'];
                $_SESSION['id'] = $userData['u_id'];

	

	}

}
