<?php
namespace eventify;
require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}
use eventify\Image;
require "class/Image.php";
$images = new Image();
$getImages = $images->selectAllimages();
$imageCount = count($getImages);
?>
<html>
<?php require "inc/header.php" ?>
<body>
	<form class="container" method="post" action="eventAdd-action.php">
		<a class="btn btn-sm btn-outline-secondary mb-4 float-right"  href="dashboard.php">Meine Events</a>
		<h2>Create Event</h2>
		<div class="form-group">
			<input type="text" class="form-control" id="name" aria-describedby="name" name="eventName">
			<small id="name" class="form-text text-muted">Event Name</small>
		</div>
		<div class="form-group">
			<input type="date" class="form-control" id="date" aria-describedby="name" name="eventDate">
			<small id="name" class="form-text text-muted">Event Date</small>
		</div>
		<div class="form-group">
			<textarea name="eventContent" id="content" style="width:100%" rows="10"></textarea>
			<small id="name" class="form-text text-muted">Event Content</small>
		</div>
		<div class="row text-center text-lg-left mt-5">
			<?php for ($i=0;$i<$imageCount;$i++){ ?>
				<div class="col-lg-3 col-md-4 col-6 gallery_checkbox">
					<input type="checkbox" name="images[]" id="checkbox<?php echo $getImages[$i]["id"]; ?>" value="<?php echo $getImages[$i]["id"]; ?>" />
					<label for="checkbox<?php echo $getImages[$i]["id"]; ?>"><img src="./uploads/<?php echo $getImages[$i]["path"]; ?>" /></label>
				</div>
			<?php }  ?>
		</div>

		<input type="hidden" name="kuenstler" value="<?php echo $_SESSION["userId"]; ?>">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>