<?php
$connect = mysqli_connect('localhost:3308', 'root', '', 'fitness_square');

if (!$connect) {
	setcookie("error", "Error in Connection", time() + (30), "/");
	header("Location: index.php");
	die();
} else {
	unset($_COOKIE["error"]);
}
 