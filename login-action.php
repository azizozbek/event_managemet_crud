<?php
include_once 'inc/autoloader.php';
require "inc/sessionHeader.php";
use klassen\Kuenstler;

if (! empty($_POST["login"])) {
	$validate = true;
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $captcha = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
	$captcha_code = $_SESSION['captcha']['code'];

    $member = new Kuenstler();

	if(empty($username) ||  empty($password) || empty($captcha)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte füllen Sie die Felder aus"];
		$validate = false;
	}

	if($captcha != $captcha_code){
		$_SESSION["message"] = ["type" => "warning", "text" => "Falsche Captcha"];
		$validate = false;
	}

    if ($validate){
	    $checkUser =  $member->checkUserExitenz($username);
	    if ($checkUser) {
		    $checkCredentials = $member->processLogin($username, $password);
		    if ($checkCredentials) {
			    header("Location: index.php");
			    exit();
		    }else{
			    $_SESSION["message"] = ["type" => "warning", "text" => "Invalid Credentials"];
			    $validate = false;
		    }
	    }
    }
	header("Location: login-form.php");

}else{
	$_SESSION["message"] = ["type" => "warning", "text" => "Invalid Credentials"];
	header("Location: login-form.php");
	exit();
}