<!DOCTYPE html>
<?php
session_start();
if (isset($_POST['tnc'])) {
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$address = $_POST['description'];
	$pincode = $_POST['pin_code'];
	$city = $_POST['city'];

	include("includes/connection.php");
	$result = mysqli_query(
		$connect,
		"SELECT password FROM registration where username = '$uname';"
	);


	if (
		isset($_COOKIE["update"]) &&
		isset($_SESSION["username"])
	) {
		unset($_COOKIE["update"]);
		if ($uname != $_SESSION["username"] && $row = mysqli_fetch_assoc($result)) {
			header("Location: step_1.php");
			setcookie("error", "Username already exists!", time() + (5), "/");
			die();
		}

		$query = "UPDATE `registration` SET 
					`username` = '$uname', 
					`password` = '$password', 
					`first_name` = '$fname', 
					`last_name` = '$lname', 
					`email` = '$email', 
					`phone_number` =  $phone, 
					`gender` =  '$gender', 
					`dob` =  '$dob', 
					`address` = '$address', 
					`pincode` =  $pincode, 
					`city` = '$city' 
				 WHERE username = '" . $_SESSION["username"] . "'";
		$b = mysqli_query($connect, $query) or die(mysqli_error($connect));
		mysqli_close($connect);
		if (!$b) {
			header("Location: step_1.php");
			setcookie("error", "Error in creation new user", time() + (5), "/");
		} else {
			header("Location: profile.php");
			$_SESSION["username"] = $uname;
		}
		die();
	}

	if ($row = mysqli_fetch_assoc($result)) {
		header("Location: step_1.php");
		setcookie("error", "Username already exists!", time() + (5), "/");
		die();
	}
	$query =
		"INSERT INTO `registration` VALUES (
			'$uname',
			'$password', 
			'$fname', 
			'$lname', 
			'$email', 
			$phone, 
			'$gender',
			'$dob',
			'$address',
			$pincode, 
			'$city'
		)";
	$b = mysqli_query($connect, $query) or die(mysqli_error($connect));
	mysqli_close($connect);
	if (!$b) {
		header("Location: step_1.php");
		setcookie("error", "Error in creation new user", time() + (5), "/");
		die();
	} else
		$_SESSION["username"] = $uname;
} else if (!isset($_SESSION["username"])) {
	header("Location: step_1.php");
	setcookie("error", "Need To Accept Term and Condition", time() + (5), "/");
	die();
}
?>

<html lang="en">

<head>
	<title>Chooose Service | Registration @ Fitness Square</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
</head>

<body>
	<?php include("includes/header.php") ?>
	<div id="container" style="margin-top: -20px">
		<form method="post" action="step_3.php">
			<?php 
			if (isset($_COOKIE["error"])) {
				?>
			<div class="errorblock mb-2">
				<?php 
				echo ($_COOKIE["error"]);
				unset($_COOKIE["error"]);
				?>
			</div>
			<?php 
		} ?>
			<input id="mship_sport" type="radio" name="mship_type" hidden value="sport">
			<input id="mship_gym" type="radio" name="mship_type" hidden value="gym">
			<input id="mship_all" type="radio" name="mship_type" hidden value="all">

			<div class="action top">
				<h2 class="title my-1">You are interested in ?</h2>
				<button id="next_btn" class="btn main fr hidden" type="submit" value="submit">Next</button>
			</div>
			<fieldset>
				<label for="mship_sport" onclick="select('ch_sport')">
					<div id="ch_sport" class="ch" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.02">
						<div class="tile-background">
							<div class="text">
								<h2 class="title">Sports</h2>
								<p>Nothing is better than sports</p>
							</div>
						</div>
					</div>
				</label>
				<label for="mship_gym" onclick="select('ch_gym')">
					<div id="ch_gym" class="ch" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.02">
						<div class="tile-background">
							<div class="text">
								<h2 class="title">Gym</h2>
								<p>Turn Fat into FIT!</p>
							</div>
						</div>
					</div>
				</label>
				<label for="mship_all" onclick="select('ch_all')">
					<div id="ch_all" class="ch" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.02">
						<div class="tile-background">
							<div class="text">
								<h2 class="title">All in One yearly package</h2>
								<p>Ultimate solution to fitness</p>
							</div>
						</div>
					</div>
				</label>
			</fieldset>
		</form>
	</div>
	<?php include("includes/footer.html") ?>
	<script src="js/lib/jquery.min.js"></script>
	<script src="js/lib/tilt.jquery.js"></script>
</body>

</html> 