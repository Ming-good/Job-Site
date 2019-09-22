<?php
namespace Ming\DB\Apply;

use Ming\DB\DBController as DB;

trait Apply
{
	#이전에 이력서를 같은 공고에 지원한 적있는지 확인함
	public function resumeValidator($userID, $opening_no)
	{
                $db = DB::Connect();

                $sql = "SELECT * FROM apply WHERE u_id=:userID AND opening_no=:opening_no";
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':userID', $userID);
                $stmt -> bindValue(':opening_no', $opening_no);
                $stmt -> execute();
                $bool = $stmt -> fetch();

		#이력서가 이미 신청되어 있다면 false를 신청되어 있지 않다면 true를 반환함.
                if($bool) {
                        return false;
		} else {
			return true;
		}

	}
	
	#이력서를 지원한 유저와 유저가 선택한 이력서를 저장함.
	public function resumeApply($resume_no, $opening_no, $userID)
	{
                $db = DB::Connect();

                $sql = "INSERT INTO apply (opening_no, u_id, resume_no) VALUES(:opening_no, :userID, :resume_no)";
                $stmt = $db -> prepare($sql);
                $stmt -> bindValue(':resume_no', $resume_no);
                $stmt -> bindValue(':userID', $userID);
                $stmt -> bindValue(':opening_no', $opening_no);
                $stmt -> execute();

	}

}
