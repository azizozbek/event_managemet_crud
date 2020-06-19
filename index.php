<?php
include_once 'inc/autoloader.php';
require "inc/sessionHeader.php";


$event = new \klassen\Event();

?>
<html>
<?php require "inc/header.php" ?>
<script>
    function myFunction() {
        var input, filter, cards, cardContainer, h5, title, i;
        input = document.getElementById("filter");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("events");
        cards = cardContainer.getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-body h5.card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>
<div class="container">
	<h2 class="mb-4">Alle Events</h2>
	<div class="row">
		<div class="col-sm-12 mb-3">
			<input type="text" id="filter" class="form-control" onkeyup="myFunction()" placeholder="Suche nach Events..">
		</div>
	</div>
	<div class="row" id="events">
		<?php
			$getEvents = $event->getAllEvents();
			$evensCount = count($getEvents);
			for ($i=0;$i<$evensCount;$i++){
		?>
		<div class="col-md-4">
			<div class="card mb-4 box-shadow">
				<img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="./uploads/<?php echo $getEvents[$i]["image"][0]["path"]; ?>">
				<div class="card-body">
					<h5 class="card-title"><?php echo $getEvents[$i]["name"];?></h5>
					<p class="card-text"><?php echo substr($getEvents[$i]["content"], 0, 120); ?>.</p>
					<a type="button" class="btn btn-sm btn-outline-secondary " href="eventSingle.php?eventID=<?php echo $getEvents[$i]["id"]; ?>">View</a>
					<small class="text-muted float-right">Künstler: <a href="userSingle.php?id=<?php echo $getEvents[$i]["f_kuenstler_id"]; ?>"><?php echo $getEvents[$i]["fullname"]; ?></a></small>
				</div>
			</div>
		</div>
	      <?php } ?>
	</div>
</div>
</html>
