<?php
include_once 'inc/autoloader.php';
require "inc/sessionHeader.php";


if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}


$event = new \klassen\Event();
$getEvent = $event->getSingleEvent($_REQUEST["eventID"]);
if ($_SESSION["userId"] != $getEvent["f_kuenstler_id"]) {
	header("Location: index.php");
	exit();
}


if (! empty($_REQUEST["eventID"])) {

    $eventID = filter_var($_REQUEST["eventID"], FILTER_SANITIZE_STRING);
	$hashedID = filter_var($_REQUEST["p"], FILTER_SANITIZE_STRING);

	if(!password_verify($_SESSION["userId"], $hashedID)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Keine Berechtigung"];
		header("Location: dashboard.php");
	}

	$data[] = $eventID;
 	$deleteEvent = $event->deleteEvent($data);

    if ($deleteEvent){
	    $_SESSION["message"] = ["type" => "success", "text" => "Event wurde gelöscht"];
	    header("Location: dashboard.php");
    }else{
	    $_SESSION["message"] = ["type" => "warning", "text" => "Event konnte nicht gelöscht werden"];
	    header("Location: dashboard.php");
    }

}