<?php
session_start();
include( "includes/connection.php" );
if ( isset( $_POST[ "query" ] ) ) {
	$b = mysqli_query( $connect, $_POST[ "query" ] );
	if ( !$b ) {
		setcookie( "error", "Error: " . mysqli_error( $connect ), time() + ( 5 ), "/" );
		header( "Location: step_2.php" );
		die();
	} else {
		header( "Location: profile.php" );
		setcookie( "success", "Success!" . mysqli_error( $connect ), time() + ( 5 ), "/" );
		die();
	}
}
if ( !isset( $_SESSION[ "username" ] ) ) {
	setcookie( "error", "Login First", time() + ( 5 ), "/" );
	header( "Location: login.php" );
	die();
}
$d = getdate();
$date = $d[ "year" ] . "-" . $d[ "mon" ] . "-" . $d[ "mday" ];
if ( isset( $_COOKIE[ "amount" ] ) ) {
	$amount = $_COOKIE[ "amount" ];
	unset( $_COOKIE[ "amount" ] );

	$query = "INSERT INTO membership VALUES (null, '" . $_SESSION[ 'username' ]
		. "', 'all', 'anytime', null, 'annual', 'gold', '" . $date . "');";
} else if ( isset( $_POST[ "service" ] ) ) {
	$s = $_POST[ "service" ];
	if ( $s == "gym" ) {
		$type = $_POST[ "gym" ];
		$ar = array("regular" => 1000, "gold" => 2500,"diamond" => 4800);
		$ar1 = array("monthly" => 1, "quarterly" => 2.5,"semi-annual" => 4.2, "annual" => 10.5);
		$amount = $ar[$type] * $ar1[$_POST["duration"]];
		$query = "INSERT INTO membership VALUES (null, '" . $_SESSION[ 'username' ]
			. "', 'gym', 'anytime', null, '".$_POST["duration"]."', '$type', '" . $date . "');";
	} else {
		$query = "";
		$ar = array("monthly" => 1000, "quarterly" => 2500,"semi-annual" => 4800, "annual" => 8000);
		$amount = 0;
		if ($_POST["badminton"] != "none") {
			$query = $query."INSERT INTO membership VALUES (null, '" . $_SESSION[ 'username' ]. "', 'sport', '"
				.$_POST["tim_badminton"]."', 'badminton', '".$_POST["badminton"]."', null, '" . $date . "'); ";
			$amount += $ar[$_POST["badminton"]];
		}
		if ($_POST["football"] != "none") {
			$query = $query."INSERT INTO membership VALUES (null, '" . $_SESSION[ 'username' ]. "', 'sport', '"
				.$_POST["tim_football"]."', 'football', '".$_POST["football"]."', null, '" . $date . "'); ";
			$amount += $ar[$_POST["football"]];
		}
		if ($_POST["swimming"] != "none") {
			$query = $query."INSERT INTO membership VALUES (null, '" . $_SESSION[ 'username' ]. "', 'sport', '"
				.$_POST["tim_swimming"]."', 'swimming', '".$_POST["swimming"]."', null, '" . $date . "');";
			$amount += $ar[$_POST["swimming"]];
		}
	}
} else {
	setcookie( "error", "Select Service", time() + ( 5 ), "/" );
	header( "Location: step_2.php" );
	die();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Payment | BayTM</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<link type="text/css" rel="stylesheet" href="style/baytm-style.css">
	<!-- FONTS BY GOOGLE(www.fonts.google.com) -->
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
</head>

<body>
	<header id="nav" class="cl">
		<a id="logo" href="#">BayTM.com</a>
	</header>
	<div id="container">
		<form action="payment.php" method="post" style="width: fit-content;">
			<input type="hidden" name="query" <?php echo "value=\"$query\"" ?> >
			<h1 class="title">Payment information</h1>
			<fieldset style="color: wheat">
				<div>
					<h2><strong class="title">Pay For: </strong> <?php echo($amount);?> /-</h2>
				</div>
				<div class="w-60 input-group fn">
					<label for="card" class="title">Card Number</label> <input class="field" id="card" pattern="^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$" placeholder="0000-0000-0000-0000" required="" type="text">
				</div>
				<div class="w-30 input-group my-4">
					<input class="field" placeholder="Expiry Date" required="" type="date">
				</div>
				<div class="w-30 input-group my-4">
					<input class="field" pattern="^[0-9]{3}$" placeholder="cvv" required="" title="3 Integer characters only" type="password">
				</div><br>
				<br>
				<hr class="w-60">
				<div class="w-60 input-group fn">
					<label for="name" class="title">Name on Card</label> <input class="field" id="name" placeholder="abc xyz" required="" type="text">
				</div>
				<div class="action">
					<button class="btn" name="submit" type="submit" value="submit">Pay</button>
				</div>
			</fieldset>
		</form>
	</div>
</body>

</html>