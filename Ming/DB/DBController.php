<?php
namespace Ming\DB;
use \PDO;
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

}
