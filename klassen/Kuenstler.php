<?php
namespace klassen;

class Kuenstler
{
	private $ds;

    function __construct()
    {
	    require_once("dbConn.php");
	    $this->ds = new \DB(DBHost, DBPort, DBName, DBUser, DBPassword);

    }

	function checkUserExitenz($username)
	{
		$query = "select * FROM kuenstler WHERE username = ?";
		$filter = [$username];
		$memberResult = $this->ds->query($query,$filter);
		if($memberResult) {
			return $memberResult[0];
		}else{
			return false;
		}
	}

	function getMemberById($memberId)
	{
		$query = "select * FROM kuenstler WHERE id = ?";
		$filter = [$memberId];
		$memberResult = $this->ds->query($query, $filter);

		return $memberResult[0];
	}

    
    public function processLogin($username, $password) {
        $memberResult = $this->checkUserExitenz($username);
	    $passVerify = password_verify($password, $memberResult["password"]);
        if($passVerify) {
            $_SESSION["userId"] = $memberResult["id"];
            if($memberResult["access"] === 1){
            	$_SESSION["admin"] = true;
            }
            return true;
        }
        return false;
    }

	public function processRegister($username, $password, $fullname, $email) {
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO kuenstler (username, fullname, password, email, access) VALUES (?,?,?,?,?)";
		$filter = array($username, $fullname, $passwordHash, $email, 0);
		$memberResult = $this->ds->query($query, $filter);
		if(!empty($memberResult)) {
			return true;
		}
		return false;
	}

	public function processUpdate($id, $password, $fullname, $email) {
		$query = "UPDATE kuenstler SET fullname=?, password=?, email=?, access=? where id = ?";
		$filter = array($fullname, $password, $email, 0, $id);
		$memberResult = $this->ds->query($query, $filter);
		if(!empty($memberResult)) {
			return true;
		}
		return false;
	}
}