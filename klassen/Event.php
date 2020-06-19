<?php
namespace klassen;

class Event
{

	private $ds;

    function __construct()
    {
		require_once("dbConn.php");
	    $this->ds = new \DB(DBHost, DBPort, DBName, DBUser, DBPassword);

    }

	function getEventImages($eventID)
	{
		$query = "select f_image_id FROM events WHERE id = ?";
		$filter = [$eventID];
		$imagesID = $this->ds->query($query, $filter);
		$images = explode(",", $imagesID[0]["f_image_id"]);
		$listImages = [];
		$counter = 0;
		foreach ($images as $image){
			$query = "select * FROM images WHERE id = ?";
			$filter = [$image];
			$imageResult = $this->ds->query($query, $filter);
			if($imageResult){
				$listImages[] = $imageResult[0];
			}
		}
		return $listImages;

	}

    function getEventMetaByUserID($kuenstlerId)
    {
        $query = "select 
					events.id,
					events.name,
 					events.content,
 					events.date,
 					kuenstler.fullname 
 					FROM events 
					LEFT JOIN kuenstler ON kuenstler.id = events.f_kuenstler_id
					WHERE f_kuenstler_id = ?";
	    $filter = [$kuenstlerId];
	    $eventResult = $this->ds->query($query, $filter);

	    $eventCount = count($eventResult);
	    $eventsWithImages = [];

	    for ($i=0;$i<$eventCount;$i++){
		    $eventsWithImages[] = $this->getEventImages($eventResult[$i]["id"]);
		    $eventResult[$i]["image"] = $eventsWithImages[$i];
	    }
	    return $eventResult;
    }

	function getSingleEvent($eventID)
	{
		$query = "select 
					events.id,
					events.name,
 					events.content,
 					events.date,
 					events.f_kuenstler_id,
 					kuenstler.fullname 
 					FROM events 
					LEFT JOIN kuenstler ON events.f_kuenstler_id=kuenstler.id
					WHERE events.id = ?";
		$filter = [$eventID];
		$eventResult = $this->ds->query($query, $filter);

		$eventCount = count($eventResult);
		$eventsWithImages = [];

		for ($i=0;$i<$eventCount;$i++){
			$eventsWithImages[] = $this->getEventImages($eventResult[$i]["id"]);
			$eventResult[$i]["image"] = $eventsWithImages[$i];
		}
		return $eventResult[0];
	}


	function getAllEvents()
	{
		$query = "select 
					events.id,
 					events.name,
 					events.content,
 					events.date,
 					kuenstler.fullname
 					FROM events 
					LEFT JOIN kuenstler ON events.f_kuenstler_id=kuenstler.id
					ORDER BY date 
					";
		$eventResult = $this->ds->query($query);
		$eventCount = count($eventResult);
		$eventsWithImages = [];

		for ($i=0;$i<$eventCount;$i++){
			$eventsWithImages[] = $this->getEventImages($eventResult[$i]["id"]);
			$eventResult[$i]["image"] = $eventsWithImages[$i];
		}
		return $eventResult;
	}

	function updateEvent($data){
    	$query = "UPDATE events SET name = ?, content = ?, date = ?, f_image_id = ? WHERE id = ?";
    	$filter = $data;
		$updateEvent = $this->ds->query($query, $filter);
		if(!$updateEvent){
			return false;
		}
		return true;
	}

	function createEvent($data){
    	$query = "INSERT INTO events (name, content, date, f_kuenstler_id, f_image_id) VALUES (?,?,?,?,?)";
    	$filter = $data;
		$createEvent = $this->ds->query($query, $filter);

		if(!$createEvent){
			return false;
		}
		return true;
	}

	function deleteEvent($data){
		$query = "DELETE FROM events WHERE id = ?";
		$filter = $data;
		$deleteEvent = $this->ds->query($query, $filter);
		if(!$deleteEvent){
			return false;
		}
		return true;
	}
}