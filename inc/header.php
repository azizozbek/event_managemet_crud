<head>
	<title>Eventify</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light mb-5">
	<div class="container">
	<a class="navbar-brand" href="index.php#">Eventify</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">

			<?php
			if(!empty($_SESSION["userId"])) {
			?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="dashboard.php">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="eventAdd.php">Add Event</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="gallery.php">Gallerie</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="userSingle.php?id=<?php echo $_SESSION["userId"];?>">Profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="userEdit-form.php">Edit Profil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
			<?php }else{ ?>
		<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="register-form.php">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login-form.php">Login</a>
				</li>
		</ul>
			<?php } ?>

	</div>
	</div>
</nav>
<?php
	if(isset($_SESSION["message"])){
	$message = $_SESSION["message"];
	?>
		<div class="container">
			<div class="alert alert-<?php echo $message["type"];?> alert-dismissible fade show" role="alert">
				<?php echo $message["text"];?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
		<?php
		unset($_SESSION["message"]);
	}
?>

