<?php
require "inc/sessionHeader.php";
include_once 'inc/autoloader.php';
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}
$member = new \klassen\Kuenstler();

if (! empty($_POST["update"])) {
	$validate = true;
	$id=$_SESSION["userId"];
	$fullname=      filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
	$password =     filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	$password2 =    filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
	$email =        filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$captcha = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
	$captcha_code = $_SESSION['captcha']['code'];

	if(empty($fullname) || empty($email) || empty($captcha)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte füllen Sie die Felder aus"];
		$validate = false;
	}

	if(empty($password) || empty($password2)){
		$currentPass = $member->getMemberById($_SESSION["userId"]);
		$password = $password2 = $currentPass["password"];
	}

	if($password != $password2){
		$_SESSION["message"] = ["type" => "warning", "text" => "Passwörter stimmen nicht überein"];
		$validate = false;
	}

	if($captcha != $captcha_code){
		$_SESSION["message"] = ["type" => "warning", "text" => "Falsche Captcha"];
		$validate = false;
	}

	if($validate){
		$registerUser = $member->processUpdate($id, $password, $fullname, $email);
		if($registerUser){
			$_SESSION["message"] = ["type" => "success", "text" => "Ihr Profil wurde erfolgreich editiert."];
			header("Location: dashboard.php");
			exit();
		}
	}
	header("Location: userEdit-form.php");

}else{
	$_SESSION["message"] = ["type" => "warning", "text" => "Invalid Access"];
	header("Location: index.php");
	exit();
}