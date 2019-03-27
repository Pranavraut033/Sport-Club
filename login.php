<?php
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	include("includes/connection.php");
	$result = mysqli_query($connect, "SELECT password FROM registration where username = '$username';");
	if ($row = mysqli_fetch_assoc($result)) {
		echo $password . "-";
		print_r($row);
		if ($password == $row["password"]) {
			$_SESSION["username"] = $username;
			header("Location: profile.php");
			die();
		} else {
			setcookie("error", "Invalid password!", time() + (5), "/");
			header("Location: login.php");
			die();
		}
	} else {
		setcookie("error", "NO User Found with username '$username'", time() + (5), "/");
		header("Location: login.php");
		die();
	}

	mysqli_close($connect);
}
?>
<!doctype html>
<html>

<head>
	<title>Login | Fitness Square</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<!-- FONTS BY GOOGLE(www.fonts.google.com) -->
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
</head>

<body>
	<?php include("includes/header.php") ?>
	<div id="container">
		<form action="login.php" method="post">
			<?php
			if (isset($_COOKIE["error"])) {
				?>
			<div class="errorblock">
				<?php 
				echo ($_COOKIE["error"]);
				unset($_COOKIE["error"]);
				?>
			</div>
			<?php 
		} ?>
			<h2 class="title">Login Here</h2>
			<fieldset class="w-60 py-0" style="border: 3px solid rgba(51,19,125,.8); padding-bottom: 25px;">
				<div class="input-group w-50 fn">
					<label class="title" for="username">Username</label>
					<input id="username" class="field" type="text" name="username" required>
				</div>
				<div class="input-group w-50 fn">
					<label class="title" for="password">Password</label>
					<input id="password" class="field" type="password" name="password" required>
				</div>
			</fieldset>
			<div class="action w-60">
				<button class="btn main fr" type="submit" value="submit" name="submit">Login</button>
				<a class="fr" href="step_1.php">Don't have an account? &emsp;</a>
			</div>
		</form>
	</div>
	<?php include("includes/footer.html") ?>
</body>

</html> 