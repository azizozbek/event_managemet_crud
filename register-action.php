<?php
require "inc/sessionHeader.php";
include_once 'inc/autoloader.php';
use klassen\Kuenstler;
$member = new Kuenstler();

if (! empty($_POST["register"])) {
	$validate = true;
	$username =     filter_var($_POST["username"], FILTER_SANITIZE_STRING);
	$fullname=      filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
	$password =     filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	$password2 =    filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
	$email =        filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$captcha = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
	$captcha_code = $_SESSION['captcha']['code'];

	if(empty($username) || empty($fullname) || empty($password) || empty($password2) || empty($email) || empty($captcha)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte füllen Sie die Felder aus"];
		$validate = false;
	}

	if($password != $password2){
		$_SESSION["message"] = ["type" => "warning", "text" => "Passwörter stimmen nicht überein"];
		$validate = false;
	}

	if($captcha != $captcha_code){
		$_SESSION["message"] = ["type" => "warning", "text" => "Falsche Captcha"];
		$validate = false;
	}

	$ifUserAlreadyExists = $member->checkUserExitenz($username);
	if ($ifUserAlreadyExists) {
		$_SESSION["message"] = ["type" => "warning", "text" => "Benutzer existier schon"];
		$validate = false;
	}

	if($validate){
		$registerUser = $member->processRegister($username, $password, $fullname, $email);
		if($registerUser){
			$_SESSION["message"] = ["type" => "success", "text" => "Benutzer wurde erfolgreich angelegt. Loggen Sie sich ein"];
			header("Location: login-form.php");
			exit();
		}
	}
	header("Location: register-form.php");

}else{
	$_SESSION["message"] = ["type" => "warning", "text" => "Invalid Credentials"];
	header("Location: login-form.php");
	exit();
}