<?php
namespace eventify;
require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}
$hashedID = password_hash($_SESSION["userId"], PASSWORD_DEFAULT);
?>
<html>
<?php require "inc/header.php" ?>
<body>
	<form class="container" method="post" action="imageAdd-action.php" enctype="multipart/form-data">
		<a type="button" class="btn btn-sm btn-outline-secondary mb-4" href="dashboard.php" >< All Events</a>
		<h2>Fotos Hochladen</h2>
		<div class="form-group">
			<input type="file" name="image[]" accept="image/*" multiple />
			<small id="name" class="form-text text-muted">JPG, PNG erlaubt</small>
		</div>
		<input type="hidden" name="token" value="<?php echo $hashedID; ?>">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>