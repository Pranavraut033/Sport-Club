<?php
$m = $membership;
$d = new Datetime($m["start_date"]);

switch ($m["duration"]) {
	case "annual":
		$d->modify("+ 1 year");
		break;
	case "semi-annual":
		$d->modify("+ 6 month");
		break;
	case "quarterly":
		$d->modify("+ 3 months");
		break;
	case "monthly":
		$d->modify("+ 1 month");
		break;
}
switch ($m["membership_type"]) {
	case "all":
		$url = "img/ch_sport_gym.png";
		$title = "Ultimate Fitness";
		break;
	case "gym":
		switch ($m["gym_type"]) {
			case "regular":
				$title = "Regular Gym";
				$url = "img/ms_gym.jpg";
				break;
			case "gold":
				$title = "Personal Training";
				$url = "img/ms_gym_gold.jpg";
				break;
			case "diamond":
				$title = "Exclusive Gym Member";
				$url = "img/ms_gym_diamond.jpg";
				break;
		}
		break;
	case "sport":
		switch ($m["sport_name"]) {
			case "badminton":
				$title = "Batmintion - " . ucfirst($m["batch"]);
				$url = "img/ms_sp_badminton.jpg";
				break;
			case "football":
				$title = "Football - " . ucfirst($m["batch"]);
				$url = "img/ms_sp_football.jpg";
				break;
			case "swimming":
				$title = "Swimming - " . ucfirst($m["batch"]);
				$url = "img/ms_sp_swimming.jpg";
				break;
		}
	default:
}
?>

<div class="mship">
	<div class="banner" <?php echo "style=\"background-image: url('$url')\"" ?>></div>
	<div class="mx-2 my-0 action top">
		<h4 class="title my-1 inline">
			<?php echo $title ?>
		</h4>
		<small class="inline mt-2 fr">Expires on : <?php echo $d->format("d-M-Y") ?></small>
	</div>
</div> 