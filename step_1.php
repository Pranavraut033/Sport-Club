<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Basic Information | Registration @ Fitness Square</title>
	<link type="text/css" rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
</head>

<body>
	<?php include("includes/header.php"); ?>
	<div id="container">
		<form id="form" action="step_2.php" method="post">
			<?php 
				if ( isset( $_COOKIE[ "error" ] ) ) {
			?>
			<div class="errorblock mb-2">
				<?php 
					echo( $_COOKIE[ "error" ] );
					unset($_COOKIE[ "error" ]);
				?>
			</div>
			<?php } ?>
			<h1 class="title">Basic Information</h1>
			<fieldset class="mb-0 pb-0">
				<div class="w-40 input-group">
					<label for="username" hidden>Username</label>
					<input id="username" class="field" type="text" name="uname" placeholder="Username">
				</div>
				<div class="w-60 input-group">
					<label for="password" hidden>Password</label>
					<input id="password" class="field" type="password" name="password" placeholder="Choose Password">
				</div>

				<div class="w-50 input-group">
					<label for="fname" hidden>First Name</label>
					<input id="fname" class="field" type="text" name="fname" placeholder="First Name">
				</div>
				<div class="w-50 input-group">
					<label for="lname" hidden>last Name</label>
					<input id="lname" class="field" type="text" name="lname" placeholder="Last Name">
				</div>

				<div class="w-60 input-group">
					<label for="email" hidden>Email</label>
					<input id="email" class="field" type="text" name="email" placeholder="Email">
				</div>
				<div class="w-40 input-group">
					<label for="phone" hidden>phone</label>
					<input id="phone" class="field" type="number" name="phone" placeholder="Phone Number">
				</div>

				<div class="w-50 input-group">
					<h4 class="title fl">Gender:</h4>
					<input id="radi_male" type="radio" name="gender" value="male">
					<label for="radi_male">Male</label>
					<input id="radi_female" type="radio" name="gender" value="female">
					<label for="radi_female">Female</label>
					<input id="radi_others" type="radio" name="gender" value="other" selected>
					<label for="radi_others">Other</label>
				</div>
				<div class="w-50 input-group">
					<label for="dob" hidden>Date of birth</label>
					<input id="dob" class="field" type="date" name="dob" title="Date of birth">
				</div>
				<!--<div class="w-100 input-group">
					<label class="title" for="id">ID Proof</label>
					<input id="id" class="field" type="file" name="id" accept="image/*">
				</div>-->
			</fieldset>
			<fieldset>
				<h2 class="title"><label for="s_address">Address</label></h2>
				<div class="w-70 input-group">
					<label for="s_address" hidden></label>
					<textarea id="s_address" class="field" name="description" rows="4" placeholder="Stress Address"></textarea>
				</div>
				<div class="w-30 input-group">
					<label for="pin_code" hidden>Pin Code</label>
					<input id="pin_code" class="field" type="number" name="pin_code" placeholder="Pin Code">
				</div>
				<div class="w-30 input-group">
					<label for="city" hidden>city</label>
					<input id="city" class="field" type="text" name="city" placeholder="City">
				</div>
			</fieldset>
			<div class="action">
				<input id="tnc" class="field" type="checkbox" name="tnc" value="true">
				<label for="tnc" class="title">Agree with <a href="tnc.php">Terms and conditions</a></label>
				<button class="btn fl" type="reset" value="reset">
                    <img src="img/ic_cross.png" alt="Clear"> Clear
                </button>
			
				<button class="btn main" type="submit" value="submit" onClick="return validate()">Next</button>
			</div>
		</form>
	</div>
	<?php include("includes/footer.html") ?>
	<script src="js/validation.js"></script>
</body>

</html>