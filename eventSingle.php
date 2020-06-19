<?php
include_once 'inc/autoloader.php';
require "inc/sessionHeader.php";

$event = new \klassen\Event();
$getEvents = $event->getSingleEvent($_REQUEST["eventID"]);

?>

<html>
<?php require "inc/header.php" ?>
<body>
<div class="container">
	<div class="row">
		<div class="col-12 box-shadow">
			<a type="button" class="btn btn-sm btn-outline-secondary mb-4" href="dashboard.php" >< All Events</a>
			<?php if(isset($_SESSION["userId"])){
				if($getEvents["f_kuenstler_id"] == $_SESSION["userId"]){
					$hashedID = password_hash($_SESSION["userId"], PASSWORD_DEFAULT);
					?>
					<div class="btn-group mb-3 float-right">
						<a type="button" class="btn btn-sm btn-outline-primary mr-1" href="eventEdit.php?eventID=<?php echo $getEvents["id"];?>" >Edit Event</a>
						<a type="button" class="btn btn-sm btn-outline-danger mr-1" href="eventDelete.php?eventID=<?php echo $getEvents["id"]?>&p=<?php echo $hashedID ?>" onclick="return confirm('Sind Sie sicher?')">Delete</a>
					</div>

			<?php } } ?>
			<img class="img-fluid" style="max-height: 400px; width: 100%; display: block;" src="./uploads/<?php echo $getEvents["image"][0]["path"]; ?>">
			<div class="body mt-3">
				<h2><?php echo $getEvents["name"]; ?></h2>
				<p class="text"><?php echo substr($getEvents["content"], 0, 120); ?>.</p>
				<div class="d-flex justify-content-between align-items-center">
					<small class="text-muted float-left">Künstler: <?php echo $getEvents["fullname"]; ?></small>
					<small class="text-muted float-right"> <?php echo $getEvents["date"]; ?></small>
				</div>
				<h3 class="mt-5">Event Fotos</h3>
				<div class="row text-center text-lg-left mt-5">
					<?php
					$imageCount = count($getEvents["image"]);
					for ($i=0;$i<$imageCount;$i++){
						echo '<div class="col-lg-3 col-md-4 col-6">
						<a href="./uploads/'.$getEvents["image"][$i]["path"].'" class="d-block mb-4 h-100 mb-1 justify-content-center">
				            <img class="img-fluid img-thumbnail" src="./uploads/'.$getEvents["image"][$i]["path"].'">
				        </a>
					  </div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>