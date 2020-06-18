<?php
namespace eventify;
require "inc/sessionHeader.php";

use eventify\Event;
use eventify\Kuenstler;

require  'class/Kuenstler.php';
require  'class/Event.php';
$event = new Event();

?>
<html>
<?php require "inc/header.php" ?>

<div class="container">
	<h2>Alle Events</h2>
	<div class="row">
		<?php
			$getEvents = $event->getAllEvents();
			$evensCount = count($getEvents);
			for ($i=0;$i<$evensCount;$i++){
		?>
		<div class="col-md-4">
			<div class="card mb-4 box-shadow">
				<img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="./uploads/<?php echo $getEvents[$i]["image"][0]["path"]; ?>">
				<div class="card-body">
					<p class="card-text"><?php echo substr($getEvents[$i]["content"], 0, 120); ?>.</p>
					<a type="button" class="btn btn-sm btn-outline-secondary stretched-link" href="eventSingle.php?eventID=<?php echo $getEvents[$i]["id"]; ?>">View</a>
					<small class="float-right text-muted"><?php echo $getEvents[$i]["fullname"]; ?></small>
				</div>
			</div>
		</div>
	      <?php } ?>
	</div>
	<!--
   <ul class="list-group">
      <?php /*
      $getEvents = $event->getAllEvents();
      $evensCount = count($getEvents);
      for ($i=0;$i<$evensCount;$i++){
         echo '<a class="list-group-item list-group-item-action">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">'.$getEvents[$i]["name"].'</h5>
					      <small>'.$getEvents[$i]["date"].'</small>
					    </div>
					    <p class="mb-1">'.htmlentities($getEvents[$i]["content"]).'.</p>
					    <small>'.$getEvents[$i]["fullname"].'</small>
					  </a>';
      } */
      ?>
   </ul>-->

</div>

</html>
