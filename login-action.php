<?php
namespace eventify;
require "inc/sessionHeader.php";
use eventify\Kuenstler;

if (! empty($_POST["login"])) {
	$validate = false;
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    require "class/Kuenstler.php";
    $member = new Kuenstler();

    $checkUser =  $member->checkUserExitenz($username);
    if ($checkUser) {
	    $checkCredentials = $member->processLogin($username, $password);
	    if ($checkCredentials) {
		    $validate = true;
	    }
    }


    if ($validate){
	    header("Location: dashboard.php");
	    exit();
    }else{
	    $_SESSION["message"] = ["type" => "warning", "text" => "Invalid Credentials"];
	    header("Location: login-form.php");
	    exit();
    }

}