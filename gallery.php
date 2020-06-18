<?php
namespace eventify;
require "inc/sessionHeader.php";
if (empty($_SESSION["userId"])) {
	header("Location: index.php");
	exit();
}
use eventify\Image;
require  'class/Image.php';
$image = new Image();

?>
<html>
<?php require "inc/header.php" ?>

    <div class="container">
	    <h2>Gallerie <a class="badge badge-primary float-right" href="imageAdd.php" role="button">Fotos hinzufügen</a></h2>

	    <div class="row text-center text-lg-left mt-5">
		    <?php
		    $getImages = $image->selectAllimages();
		    $imageCount = count($getImages);
		    for ($i=0;$i<$imageCount;$i++){
			    echo '<div class="col-lg-3 col-md-4 col-6">
						<a href="./uploads/'.$getImages[$i]["path"].'" class="d-block mb-4 h-100 mb-1 justify-content-center">
				            <img class="img-fluid img-thumbnail" src="./uploads/'.$getImages[$i]["path"].'">
				        </a>
					  </div>';
		    }
		    ?>
	    </div>
    </div>

</body>
</html>