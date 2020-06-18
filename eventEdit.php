<?php
namespace eventify;
require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
}
use eventify\Event;
use eventify\Image;
require  'class/Event.php';
require  'class/Image.php';
$event = new Event();
$image = new Image();
$getEvent = $event->getSingleEvent($_REQUEST["eventID"]);
$allImages = $image->selectAllimages();

if ($_SESSION["userId"] != $getEvent["f_kuenstler_id"]) {
	header("Location: index.php");
	exit();
}

?>

<html>
<?php require "inc/header.php" ?>
<body>
	<form class="container" method="post" action="eventEdit-action.php">
		<a type="button" class="btn btn-sm btn-outline-secondary mr-4" href="dashboard.php" >< All Events</a>
		<a type="button" class="btn btn-sm btn-outline-secondary mb-4 float-right" href="eventSingle.php?eventID=<?php echo $getEvent["id"]; ?>">Ansehen</a>
		<div class="form-group">
			<input type="text" class="form-control" id="name" aria-describedby="name" name="eventName" value="<?php echo $getEvent["name"];?>">
			<small id="name" class="form-text text-muted">Event Name</small>
		</div>
		<div class="form-group">
			<input type="date" class="form-control" id="date" aria-describedby="name" name="eventDate" value="<?php echo $getEvent["date"];?>">
			<small id="name" class="form-text text-muted">Event Date</small>
		</div>
		<div class="form-group">
			<textarea name="eventContent" id="content" style="width:100%" rows="10"><?php echo $getEvent["content"];?></textarea>
			<small id="name" class="form-text text-muted">Event Content</small>
		</div>
		<div class="row text-center text-lg-left mt-5">
			<?php
				$eventImages = $getEvent["image"];
				$eventImageCount = count($eventImages);
				$allImageCount = count($allImages);

				for ($i=0;$i<$allImageCount;$i++){
					$checked = "";
					for($y=0;$y<$eventImageCount;$y++){
						if(in_array($eventImages[$y]["id"], $allImages[$i])){
							$checked = "checked";
						}
					}
					?>
				<div class="col-lg-3 col-md-4 col-6 gallery_checkbox">
					<input type="checkbox" name="images[]" id="checkbox<?php echo $allImages[$i]["id"]; ?>" value="<?php echo $allImages[$i]["id"]; ?>" <?php echo $checked; ?>/>
					<label for="checkbox<?php echo $allImages[$i]["id"]; ?>"><img src="./uploads/<?php echo $allImages[$i]["path"]; ?>" /></label>
				</div>
			<?php }  ?>
		</div>
		<input type="hidden" name="eventID" value="<?php echo $_REQUEST["eventID"]; ?>">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</body>
</html>