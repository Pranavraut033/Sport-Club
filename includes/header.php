<header id="nav" class="cl">
	<a id="logo" href="index.php">Fitness Square</a>
	<div id="nav-options">

		<?php if(!isset($_SESSION["username"])) { ?>
		<a class="nav-option" href="login.php">Login</a>
		<a class="nav-option" href="step_1.php">Register</a>
		<?php } else { ?>
		<a class="nav-option" href="profile.php">
			<?php echo $_SESSION["username"]?>
		</a>
		<a class="nav-option" href="logout.php">Logout</a>
		<?php } ?>

		<a class="nav-option" href="help.php">Help?</a>
	</div>
</header>