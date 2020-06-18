<?php
namespace Eventify;
require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}
use eventify\Image;
require  'class/Image.php';
$image = new Image();



if (! empty($_REQUEST["token"])) {

	$hashedID = filter_var($_REQUEST["token"], FILTER_SANITIZE_STRING);

	if(!password_verify($_SESSION["userId"], $hashedID)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Keine Berechtigung"];
		header("Location: dashboard.php");
		exit();
	}

	$fs = $image->reArrayFiles($_FILES["image"]);
	$validate = false;
	foreach ($fs as $file) {
		$createEvent = $image->uploadImage($file);
		if($createEvent){
			$validate = true;
		}
	}

    if ($validate){
	    header("Location: gallery.php");
	    exit();
    }else{
	    $_SESSION["message"] = ["type" => "warning", "text" => "Something went wrong"];
	    header("Location: imageAdd.php");
	    exit();
    }

}else{
	header("Location: index.php");
}