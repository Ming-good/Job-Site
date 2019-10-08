<?php
namespace Ming\DB;

use \PDO;
use Ming\DB\User\Member;
use Ming\DB\User\Resume;
use Ming\DB\User\Scrap;
use Ming\DB\Enterprise\JobOpening;
use Ming\DB\Search\Search;
use Ming\DB\Apply\Apply;

class DBController
{
	public function connect()
        {
                try {
                        require_once('dbconfig.php');
                        $conn = new PDO(_DSN,_DBUSER,_DBPASSWD);
                        $conn -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e) {
                        exit('ERROR : '.$e -> getMessage());
                }
                return $conn;
        }

	use Member;
	use JobOpening;
	use Search;
	use Resume;
	use Apply;
	use Scrap;
}
