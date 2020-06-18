<?php
require "inc/sessionHeader.php";
use eventify\Kuenstler;

if (! empty($_POST["register"])) {
	$validation = true;
	$username =     filter_var($_POST["username"], FILTER_SANITIZE_STRING);
	$fullname=      filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
	$password =     filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	$password2 =    filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
	$email =        filter_var($_POST["email"], FILTER_SANITIZE_STRING);


	if(empty($username) || empty($fullname) || empty($password) || empty($password2) || empty($email)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte füllen Sie die Felder aus"];
		$validation = false;
	}

	if($password != $password2){
		$_SESSION["message"] = ["type" => "warning", "text" => "Passwörter stimmen nicht überein"];
		$validation = false;
	}

	require "class/Kuenstler.php";
	$member = new Kuenstler();

	$ifUserAlreadyExists = $member->checkUserExitenz($username);
	if ($ifUserAlreadyExists) {
		$_SESSION["message"] = ["type" => "warning", "text" => "Benutzer existier schon"];
		$validation = false;
	}

	if($validation){
		$registerUser = $member->processRegister($username, $password, $fullname, $email);
		if($registerUser){
			$_SESSION["message"] = ["type" => "success", "text" => "Benutzer wurde erfolgreich angelegt. Loggen Sie sich ein"];
			header("Location: login-form.php");
		}
	}else{
		header("Location: register-form.php");
	}


}