<?php
namespace Eventify;
require "inc/sessionHeader.php";
use eventify\Event;
require  'class/Event.php';
$event = new Event();

if (! empty($_POST["eventName"])) {
	$validate = true;
    $eventName = filter_var($_POST["eventName"], FILTER_SANITIZE_STRING);
    $eventDate = filter_var($_POST["eventDate"], FILTER_SANITIZE_STRING);
    $eventContent = filter_var($_POST["eventContent"], FILTER_SANITIZE_STRING);
    $kuenstlerID = filter_var($_POST["kuenstler"], FILTER_SANITIZE_STRING);
    $images = filter_var_array ($_POST["images"]);;


	if(empty($eventName) || empty($eventDate) || empty($eventContent)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte füllen Sie die Felder aus"];
		$validate = false;
	}
	if(empty($images)){
		$_SESSION["message"] = ["type" => "warning", "text" => "Bitte wählen Sie mindestens ein Bild aus."];
		$validate = false;
	}
	if($validate){
		$imagesToString = implode(",", $images);

		$data = [];
		$data[] = $eventName;
		$data[] = $eventContent;
		$data[] = $eventDate;
		$data[] = $kuenstlerID;
		$data[] = $imagesToString;

		$createEvent = $event->createEvent($data);
		if($createEvent){
			$_SESSION["message"] = ["type" => "success", "text" => "Event wurde erstellt"];
		}
	}


    if ($createEvent){
	    header("Location: dashboard.php");
	    exit();
    }else{
	    header("Location: eventAdd.php");
	    exit();
    }

}else{
	header("Location: index.php");
}