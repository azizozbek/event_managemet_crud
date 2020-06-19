<?php require "inc/sessionHeader.php";
include_once ("inc/autoloader.php");

include("inc/captcha.php");
$_SESSION['captcha'] = captcha();
$kuenstler = new \klassen\Kuenstler();
$userID = "";
if (!empty($_SESSION["userId"])) {
	$userID = $_SESSION["userId"];
}
if(isset($_REQUEST["id"])){
	$userID = $_REQUEST["id"];
}
if(empty($userID)){
	header("Location: index.php");
}
$event = new \klassen\Event();
$getKuenstler = $kuenstler->getMemberById($userID)
?>
<html>
<?php require "inc/header.php" ?>
    <div class="container">
	    <div class="row">
		    <div class="col">
			    <h2><?php echo $getKuenstler["fullname"];?></h2>
			    <small><?php echo $getKuenstler["username"];?></small>
			    <hr>
			    <span><?php echo $getKuenstler["email"];?></span>
		    </div>
	    </div>
	    <h4 class="mt-5">Künstlers Events</h4>
	    <div class="row">
		    <?php
		    $getEvents = $event->getEventMetaByUserID($userID);
		    $evensCount = count($getEvents);
		    if(!$getEvents){
			    echo "<div class=\"alert alert-light\" role=\"alert\">Künstler hat noch kein Event erstellt.</div>";
		    }
		    for ($i=0;$i<$evensCount;$i++){
			    ?>
			    <div class="col-md-4">
				    <div class="card mb-4 box-shadow">
					    <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="./uploads/<?php echo $getEvents[$i]["image"][0]["path"]; ?>">
					    <div class="card-body">
						    <p class="card-text"><?php echo substr($getEvents[$i]["content"], 0, 120); ?>.</p>
						    <div class="d-flex justify-content-between align-items-center">
							    <div class="btn-group">
								    <a type="button" class="btn btn-sm btn-outline-secondary mr-1" href="eventSingle.php?eventID=<?php echo $getEvents[$i]["id"]; ?>">View</a>
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