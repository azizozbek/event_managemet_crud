<?php
use klassen\Event;
include_once 'inc/autoloader.php';

require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}

$event = new Event();

?>
<html>
<?php require "inc/header.php" ?>

    <div class="container">
	    <h2>Meine Events</h2>
	    <div class="row">
		    <?php
		    $getEvents = $event->getEventMetaByUserID($_SESSION["userId"]);
		    $evensCount = count($getEvents);
		    if(!$getEvents){
		    	echo "<div class=\"alert alert-light\" role=\"alert\">Noch kein Event</div>";
		    }
		    for ($i=0;$i<$evensCount;$i++){
			    $hashedID = password_hash($_SESSION["userId"], PASSWORD_DEFAULT);
			    ?>
			    <div class="col-md-4">
				    <div class="card mb-4 box-shadow">
					    <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="./uploads/<?php echo $getEvents[$i]["image"][0]["path"]; ?>">
					    <div class="card-body">
						    <p class="card-text"><?php echo substr($getEvents[$i]["content"], 0, 120); ?>.</p>
						    <div class="d-flex justify-content-between align-items-center">
							    <div class="btn-group">
								    <a type="button" class="btn btn-sm btn-outline-secondary mr-1" href="eventSingle.php?eventID=<?php echo $getEvents[$i]["id"]; ?>">View</a>
								    <a type="button" class="btn btn-sm btn-outline-primary mr-1" href="eventEdit.php?eventID=<?php echo $getEvents[$i]["id"];?>" >Edit Event</a>
								    <a type="button" class="btn btn-sm btn-outline-danger mr-1" href="eventDelete.php?eventID=<?php echo $getEvents[$i]["id"]?>&p=<?php echo $hashedID ?>" onclick="return confirm('Sind Sie sicher?')">Delete</a>
							    </div>
							    <small class="text-muted"><?php echo $getEvents[$i]["fullname"]; ?></small>
						    </div>
					    </div>
				    </div>
			    </div>
		    <?php } ?>
	    </div>
    </div>

</body>
</html>