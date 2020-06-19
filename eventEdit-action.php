<?php
include_once 'inc/autoloader.php';
require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}
use klassen\Event;

$event = new Event();

if (! empty($_POST["eventName"])) {
	$validate = true;
    $eventName = filter_var($_POST["eventName"], FILTER_SANITIZE_STRING);
    $eventDate = filter_var($_POST["eventDate"], FILTER_SANITIZE_STRING);
    $eventContent = filter_var($_POST["eventContent"], FILTER_SANITIZE_STRING);
    $eventID = filter_var($_POST["eventID"], FILTER_SANITIZE_STRING);
	$images = filter_var_array ($_POST["images"]);;

	if(empty($eventName) || empty($eventDate) || empty($eventContent)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte füllen Sie die Felder aus"];
		$validate = false;
	}
	if(empty($images)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte wählen Sie mindestens ein Bild aus."];
		$validate = false;
	}
	if($validate) {
		$imagesToString = implode(",", $images);
		$data = [];
		$data[] = $eventName;
		$data[] = $eventContent;
		$data[] = $eventDate;
		$data[] = $imagesToString;
		$data[] = $eventID;

		$updateEvent = $event->updateEvent($data);
		if($updateEvent){
			$_SESSION["message"] = ["type" => "success", "text" => "Event wurde bearbeitet"];
		}
	}

    if ($updateEvent){
	    header("Location: eventSingle.php?eventID=$eventID");
	    exit();
    }else{
	    header("Location: eventEdit.php");
	    exit();
    }
}else{
	header("Location: index.php");
}