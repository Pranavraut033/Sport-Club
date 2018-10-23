<?php
session_start();
if ( !isset( $_SESSION[ "username" ] ) ) {
	setcookie( "error", "Login First", time() + 5, "/" );
	header( "Location: login.php" );
	die();
}
if ( !isset( $_POST[ "mship_type" ] ) ) {
	setcookie( "error", "Select Service type", time() + 5, "/" );
	header( "Location: step_2.php" );
	die();
}
$service = $_POST[ "mship_type" ];
if ( $service == "all" ) {
	include( "includes/connection.php" );

	setcookie( "amount", "40000", time() + 5, "/" );
	header( "Location: payment.php" );

	die();
}
$services = array(
	"sport" => array(
		array(
			"id" => "badminton",
			"title" => "Badminton",
			"detail" => "Serve it, smash it, win it, love it",
			"image" => "ms_sp_badminton.jpg"
		),
		array(
			"id" => "football",
			"title" => "Football",
			"detail" => "Football doesn’t build character, it eliminates the weak ones",
			"image" => "ms_sp_football.jpg"
		),
		array(
			"id" => "swimming",
			"title" => "Swimming",
			"detail" => "The Swimmer Recipe — Just Add Water.",
			"image" => "ms_sp_swimming.jpg"
		)
	),
	"gym" => array(
		array(
			"id" => "regular",
			"title" => "Gym",
			"detail" => "Gym Floor access with complementary  Steam Shower",
			"image" => "ms_gym.jpg"
		),
		array(
			"id" => "gold",
			"title" => "Personal Training Gold",
			"detail" => "Gym membership with Personal Trainer",
			"image" => "ms_gym_gold.jpg"
		),
		array(
			"id" => "diamond",
			"title" => "Personal Training Diamond",
			"detail" => "Personal Training with exclusive Sport-club events access",
			"image" => "ms_gym_diamond.jpg"
		)
	)
);
$service = $_POST[ "mship_type" ];
if ( $service == "all" ) {
	include( "includes/connection.php" );

	setcookie( "amount", "8000", time() + 5, "/" );
	header( "Location: payment.php" );

	die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Chooose Service | Registration @ Fitness Square</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
	<script type="text/javascript">
	</script>
</head>

<body>
	<?php include("includes/header.php") ?>
	<div id="container" style="margin-top: -20px">
		<div class="membership-list">
			<form method="post" action="payment.php">
				<?php
				echo( "<input type=\"text\" name=\"service\" hidden value=\"$service\">" );
				$list = $services[ $service ];
				if ( $service == "sport" ) {
					?>
				<div class="action top my-1 mb-4">
					<h2 class="title my-1">Choose Sport Membership</h2>
					<button id="next_btn" class="btn main fr mt-1" type="submit" value="submit">Next</button>
				</div>
				<?php for ($i = 0; $i < count($list); $i++) { ?>
				<fieldset class="ms_tile" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.02">
					<img class="thumbnail" <?php echo "src =\"img/".$list[$i][ "image"]. "\"" ?> alt="image">
					<div class="content">
						<h3 class="title">
							<?php echo $list[$i]["title"]; ?>
						</h3>
						<p>
							<strong class="title">Details:</strong>
							<?php echo $list[$i]["detail"]; ?>
						</p>
						<div class="input-group">
							<label <?php echo "for=\"in_".$list[$i]['id']."\"" ?> class="title fl">Membership:</label>
							<select <?php echo "id=\"in_".$list[$i]['id']."\" name=\"".$list[$i]['id']."\""?> class="field">
								<option value="none" selected>No Membership</option>
								<option value="monthly">Monthly @ Rs.1000</option>
								<option value="quarterly">Quarterly @ Rs.2500</option>
								<option value="semi-annual">Semi-annual @ Rs.4800</option>
								<option value="annual">Annual @ Rs.8000</option>
							</select>
						</div>
						<div class="input-group">
							<label <?php echo "for=\"in_tim".$list[$i]['id']."\"" ?> class="title fl">Select timing:</label>
							<select <?php echo "id=\"in_tim".$list[$i]['id']."\" name=\"tim_".$list[$i]['id']."\"" ?> class="field">
								<option value="morning">6 AM to 11:30 AM</option>
								<option value="evening" selected>4 PM to 8:30 PM</option>
							</select>
						</div>
					</div>
				</fieldset>
				<?php }
				} else if($service == "gym") { ?>
				<div class="action top my-1 mb-3">
					<h2 class="title fl my-1">Select Yearly Package of</h2>
					<button id="next_btn" class="btn main fr hidden mt-2" type="submit" value="submit">Next</button>
					<div class="input-group fr">
						<label class="fl title" for="duration">Select Duration</label>
						<select id="duration" class="field" name="duration">
							<option value="monthly">Monthly</option>
							<option value="quarterly">Quarterly </option>
							<option value="semi-annual">Semi-annual </option>
							<option value="annual">Annual</option>
						</select>
					</div>
				</div>
				<fieldset>
					<?php for ($i = 0; $i < count($list); $i++) { ?>
					<input type="radio" name="gym" <?php echo "id=\"in_".$list[$i][ "id"]. "\" value=\"".$list[$i][ "id"]. "\"" ?> hidden>
					<label <?php echo "onclick=\"select('".$list[$i]['id']."')\" for=\"in_".$list[$i]['id']. "\""?>  >
						<div class="ch" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.02" <?php echo "id=\"".$list[$i][ "id"]. "\" style=\"background-image:url(img/".$list[$i]["image"].")\""?>>
							<div class="tile-background">
								<div class="text">
									<h2 class="title"><?php echo $list[$i]["title"]; ?></h2>
									<p><?php echo $list[$i]["detail"]; ?></p>
								</div>
							</div>
						</div>
               	 	</label>
					<?php }?>
				</fieldset>
				<?php }?>
			</form>
		</div>
	</div>

	<?php include("includes/footer.html") ?>
	<script src="js/lib/jquery.min.js"></script>
	<script src="js/lib/tilt.jquery.js"></script>
</body>

</html>