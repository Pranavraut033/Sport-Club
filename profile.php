<?php
session_start();
include("includes/connection.php");

if (!isset($_SESSION["username"])) {
	setcookie("error", "Login First", time() + (5), "/");
	header("Location: login.php");
	die();
}

$username = $_SESSION["username"];
$mquery = "SELECT * FROM `membership` WHERE `username` = '$username';";
$pquery = "SELECT * FROM `registration` WHERE `username` = '$username';";

$mresult = mysqli_query($connect, $mquery) or die(mysqli_error($connect));
$profile = mysqli_fetch_assoc(mysqli_query($connect, $pquery));

if (!$profile) {
	header("Location: index.php");
	unset($_SESSION["username"]);
	die();
}
?>

<!doctype html>
<html>

<head>
	<title>
		<?php echo $username ?> | Fitness Square
	</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<!-- FONTS BY GOOGLE(www.fonts.google.com) -->
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
</head>

<body>
	<?php include("includes/header.php") ?>
	<div id="container">
		<?php if (isset($_COOKIE["success"])) { ?>
		<div class="errorblock mb-2 success">
			<?php 
			echo ($_COOKIE["success"]);
			unset($_COOKIE["succcess"]);
			?>
		</div>
		<?php 
	} ?>
		<div id="info">
			<div class="px-4 py-1 inline">
				<div>
					<strong class="title infolbl">Name: </strong>
					<div class="text">
						<?php echo $profile['first_name'] . " " . $profile["last_name"]; ?>
					</div>
				</div>
				<div>
					<strong class="title infolbl">Phone: </strong>
					<div class="text">
						<?php echo $profile['phone_number'] ?>
					</div>
					<strong class="title infolbl">Email: </strong>
					<div class="text">
						<?php echo $profile['email'] ?>
					</div>
				</div>
			</div>
			<div class="action inline">
				<button class="btn small editbtn" onClick="window.location.href='edit.php'">Edit</button>
			</div>
			<hr>
			<div id="memberships" style="margin: auto; width: 98%">
				<h3 class="title mb-1">Memberships</h3>
				<?php 
				$membership = mysqli_fetch_assoc($mresult);
				if (!$membership) { ?>
				<div class="center">
					<h4 class="errorblock title inline">You don't have any membership available!</h4>
					<p class="mb-4 pb-4"><a href="step_2.php">Continue</a> with registeration</p>
				</div>
				<?php 
			} else {
				include("includes/print.php");
				while ($membership = mysqli_fetch_assoc($mresult)) {
					include("includes/print.php");
				}
				?>
				<div class="center">
					<p class="title">
						<a href="step_2.php" class="title">Click Here</a> To add More
					</p>
				</div>
				<?php 
			} ?>
			</div>
		</div>
	</div>
	<?php include("includes/footer.html") ?>
</body>

</html> 