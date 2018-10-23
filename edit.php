<?php
setcookie( "update", "true", time() + 360, "/" );
header( "Location: step_1.php" )and die();
?>