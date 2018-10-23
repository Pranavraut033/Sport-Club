<?php
session_start();
if ( isset( $_SESSION[ "username" ] ) )
	header( "Location: profile.php" )and die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fitness Square | WT Project</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<link type="text/css" rel="stylesheet" href="style/lib/slider.css">
	<!-- FONTS BY GOOGLE(www.fonts.google.com) -->
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
</head>

<body>
	<?php include("includes/header.php") ?>
	<div id="container">
		<?php include("includes/lib/slider.html") ?>
		<div id="featured">
			<div class="thumbnail">
				<img src="img/thumb_sport.png" alt="Sports">
				<h3 class="title">Sports</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi reprehenderit dolor quibusdam recusandae suscipit, molestiae culpa iusto quas deleniti, illo aut perferendis omnis dolorum est repellat. Error autem similique amet!<br>
					<a href="about.php">Read more &gt;</a>
				</p>
			</div>
			<div class="thumbnail">
				<img src="img/thumb_award.png" alt="Sports">
				<h3 class="title">Achievements</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita nihil culpa, itaque iure. Voluptatum obcaecati adipisci laudantium minus itaque, labore, fugiat! Aliquid animi qui, pariatur cum soluta provident mollitia distinctio!
					<br>
					<a href="about.php">Read more &gt;</a>
				</p>
			</div>
			<div class="thumbnail">
				<img src="img/thumb_gym.png" alt="Sports">
				<h3 class="title">Gym</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eius aliquam quaerat rerum tempore aliquid velit doloremque quos ex consequuntur, amet nobis alias saepe enim maiores at minus atque perspiciatis.
					<br>
					<a href="about.php">Read more &gt;</a>
				</p>
			</div>
		</div>
		<div id="reviews">
			<h2 class="title">Follower reviews</h2>
			<div>
				<div class="review center">
					<p><em>“Great gym ! Going there now for 2 month and absolutely love the
					experience - especially the trainers there are helpful and keep on pushing
					you. I really liked the experience and comparatively at an economical
					price.”</em>
					</p>
					<h3 class="title fr">- Robert Smith</h3>
				</div>
				<div class="review center">
					<p>“Very much satisfied with gym as well as trainer... looking for best results :)”</p>
					<h3 class="title fr">- Jon Lark</h3>
				</div>
			</div>
		</div>
		<div>
			<h2 class="title">Find Us</h2>
			<div id="map" style="height:400px;"></div>
		</div>
	</div>
	<?php include("includes/footer.html") ?>
	<script src="js/lib/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
	<script src="js/map.js"></script>
	<script src="js/slider.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmmxWkufB08kD6TZx_PG7Rzi35B86og9k&callback=myMap"></script>
</body>

</html>