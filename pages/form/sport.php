<!DOCTYPE html>
<?PHP
$services = array(
    "sport" => array(
        array(
            "title" => "Badminton",
            "detail" => "Serve it, smash it, win it, love it",
            "image" => "ms_badminton.jpg"
        ),
        array(
            "title" => "Football",
            "detail" => "Football doesn’t build character, it eliminates the weak ones",
            "image" => "ms_football.jpg"
        ),
        array(
            "title" => "Swimming",
            "detail" => "The Swimmer Recipe — Just Add Water.",
            "image" => "ms_swimming.jpg"
        )
    ),
    "gym" => array(
        array(
            "id" => "ch_gym",
            "title" => "Gym",
            "detail" => "Gym Floor access with complementary  Steam Shower",
            "image" => "ms_gym_1.jpg"
        ),
        array(
            "id" => "ch_gym_gold",
            "title" => "Personal Training Gold",
            "detail" => "Gym membership with Personal Trainer",
            "image" => "ms_gym_gold_1.jpg"
        ),
        array(
            "id" => "ch_gym_diamond",
            "title" => "Personal Training Diamond",
            "detail" => "Personal Training with exclusive Sport-club events access",
            "image" => "ms_gym_diamond_1.jpg"
        )
    )
);
$service  = $_POST["mship_type"];
?>
<html lang="en">

<head>
    <title>Chooose Service | Sport Club</title>
    <link type="text/css" rel="stylesheet" href="../../style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Nova+Mono|Raleway|Roboto|Roboto+Condensed|Roboto+Mono" rel="stylesheet">
    <script type="text/javascript">
    </script>
</head>

<body>
    <header id="nav">
        <a id="logo" href="../../index.html">Sport Club</a>
        <div id="nav-options">
            <a class="nav-option" href="help.html?step=2">Help?</a>
        </div>
    </header>
    <div id="container" style="margin-top: -20px">
        <div class="membership-list">
            <form method="put" action="payment.html">
                
				<?PHP
					$list = $services[$service];
					if($service == "sport") {?>
				<div class="action top" >
                	<h2 class="title my-1">Choose Sport Membership</h2>
					<button id="next_btn" class="main fr hidden" type="submit" value="submit">Next</button>
            	</div>
				<?PHP for ($i = 0; $i < count($list); $i++) { ?>
                <fieldset class="ms_tile" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.01">
					<img class="thumbnail" <?php echo "src =\"../../img/".$list[$i]["image"]."\"" ?> alt="image">
					<div class="content">
						<h3 class="title"><?php echo $list[$i]["title"]; ?></h3>
						<p><strong class="title">Details:</strong> <?php echo $list[$i]["detail"]; ?></p>
						<div class="input-group">
							<label for="select_ms_badminton" class="title fl">Membership:</label>
							<select id="select_ms_badminton" class="field" name="ms_badminton">
								<option value="-" selected>No Membership</option>
								<option value="monthly">Monthly @ Rs.1000</option>
								<option value="quarterly">Quarterly @ Rs.2500</option>
								<option value="half">Semi-annual @ Rs.4800</option>
								<option value="yearly">Annual @ Rs.8000</option>
							</select>
						</div>
						<div class="input-group">
							<label for="select_bad_timing" class="title fl">Select timing:</label>
							<select id="select_bad_timing" class="field" name="ms_badminton">
								<option value="morning" >6 AM to 11:30 AM</option>
								<option value="evening" selected>4 PM to 8:30 PM</option>
							</select>
						</div>
					</div>
                </fieldset>
				<?PHP }
				} else if($service == "gym"){?>
				<div class="action top">
					<h2 class="title fl my-1">Select Yearly Package</h2>
					<button id="next_btn" class="main fr hidden" type="submit" value="submit">Next</button>
            	</div>
				<fieldset>
					<?PHP for ($i = 0; $i < count($list); $i++) { ?>
					<label for="mship_gym" <?PHP echo "onclick=\"select('".$list[$i]["id"]."')\""?>>
						<div class="ch" data-tilt data-tilt-perspective="3000" data-tilt-scale="1.01" <?php echo "style=\"background-image:url(../../img/".$list[$i]["image"].")\" id=\"".$list[$i]["id"]."\""?>>
							<div class="tile-background">
								<div class="text">
									<h2 class="title"><?php echo $list[$i]["title"]; ?></h2>
									<p><?php echo $list[$i]["detail"]; ?></p>
								</div>
							</div>
						</div>
               	 	</label>
				<?PHP }?>
				</fieldset>
				<?PHP }?>
			</form>
        </div>
        <div id="#cart" style="display: inline-block">

        </div>
    </div>

    <footer>
        Copyright | 2018
    </footer>
    <script src="../../js/master.js"></script>
    <script src="../../lib/jquery.min.js"></script>
    <script src="../../lib/tilt.jquery.js"></script>
</body>

</html>